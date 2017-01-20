<?php
	session_start();
	session_register(session_login);
	session_register(ID);
	session_register(Password);
	session_register(Email);
	if(isset($_POST["new_article"]) || isset($_POST["del_article"])) {
		header("Location: forum#a1");
	}
?>

<!DOCTYPE html>

<?php
	$result = "";
	$error = "";
	$db = @mysql_connect('localhost', 'root', 'A12345678');
	if (!$db) {
		echo "SQL connect failed!<br>";
	}
	mysql_query("SET NAMES utf8");
	if (!mysql_select_db('Project')) {
		die("failed!<br>");
	}

	$sql = "SELECT * FROM article";
	$rows = mysql_query($sql);
	$num = mysql_num_rows($rows);

	$sql_1 = "SELECT * FROM article";
	$rows_1 = mysql_query($sql_1);
	$num_1 = mysql_num_rows($rows_1);


	#發表新文章
	if (isset($_POST["new_article"])) {
		$Title = $_POST["Title"];
		$Contain = $_POST["Contain"];
		$Author_ID = $_SESSION[ID];
		$Date = date('Y-m-d');
		if(empty($Title) || empty($Contain)){
			$error = "<font style='color:red;'>所有欄位皆為必填</font><br>";
		}
		else{
			$sql = "INSERT INTO article (title, author_ID, date) VALUES ('$Title', '$Author_ID', '$Date')";
			if(!mysql_query($sql)){
				$result = "<font style='color:red;'>新增失敗！</font><br>".mysql_error($db);
			}
			else{
				$sql_2 = "SELECT * FROM article ORDER BY article_ID DESC LIMIT 1";
				$rows_2 = mysql_query($sql_2);
				$row = mysql_fetch_row($rows_2);
				$article_ID = $row[0];
				$file = "article/".$article_ID.".txt";
				$fp = fopen($file, "w");
				$result = "<font style='color:red;'>新增成功！</font><br>";
				if (fwrite($fp, $Contain) == -1) {
					$result = "<font style='color:red;'>建檔失敗！</font>";
				}
			}
		}
	}

	#編輯文章
	if (isset($_POST['edit'])) {

		$article_ID = $_POST["ID"];
		$Title = $_POST["Title"];
		$Contain = $_POST["Contain"];
		if(empty($article_ID) || empty($Title) || empty($Contain)){
			$error = "<font style='color:red;'>所有欄位皆為必填</font><br>";
		}
		else{
			$file = "article/".$article_ID.".txt";
			$fp = fopen($file, "w");
			$date = date("Y-m-d");
			$sql = "UPDATE article SET title ='$Title', date='$date' WHERE article_id='".$article_ID."'";
			if(!mysql_query($sql)){
				$result = "<font style='color:red;'>更新失敗！</font><br>".mysql_error($db);
			}
			else{
				$result = "<font style='color:red;'>更新成功！</font>";
				if (fwrite($fp, $Contain) == -1) {
					$result = "<font style='color:red;'>寫檔失敗！</font>";
				}
			}
			fclose($fp);
		}
	}

	#刪除文章
	if (isset($_POST["del_article"])) {
		$article_ID = $_POST["ID"];
		$sql = "DELETE FROM article WHERE article_ID='".$article_ID."'";
		if(!mysql_query($sql)){
			$result = "<font style='color:red;'>刪除失敗！</font><br>".mysql_error($db);
		}
		else{
			$result = "<font style='color:red;'>刪除成功！</font><br>";
			unlink("article/".$article_ID.".txt");
		}
	}
	
	mysql_close($db);
?>

<html>
<head>
	<title>Minecraft資料站</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<style>
		.contain table{
			margin-left: 25vw;
    		border-collapse: collapse;
		}
		.contain th, td {
			border: 0;
		    border-bottom: 1px solid #808080;
		}
		.contain tr:hover {
			background-color: #b3b3b3;
		}
	</style>

</head>
<body>
	
	<?php include("Header.php"); ?>
	<main>
		<section id="a1">
			<div class="contain">
				<h1>討論區文章列表</h1>
				<?php
					if ($_SESSION[session_login]) {
						echo "<a href='#new'>發表新文章</a>";
					}
					else {
						echo "<a href='member#login'>登入會員</a><br>";
					}
				?>
				<table>
					<tr>
						<th>標題</th>
						<th>作者</th>
						<th>日期</th>
					</tr>
					<?php
						for ($i=0; $i < $num; $i++) { 
							$row = mysql_fetch_row($rows);
							echo "<tr><td><a href='#".$row[0]."'>".$row[1]."</a></td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
						}
					?>
				</table>
			</div>
		</section>
		<?php
			for ($i=0; $i < $num_1; $i++) {
				$row = mysql_fetch_row($rows_1);
				echo "<section id='".$row[0]."'><div class='contain'><h1>".$row[1]."</h1><br><h3>作者：".$row[2]."</h3><br>";
				$file = $row[0].".txt";
				$data = file("article/".$file);
				foreach ($data as $line) {
					echo "<p>".$line."</p>";
				}
				echo $error."<br>".$result."<br><a href='#a1'>←返回文章列表</a><br>";
				#有登入
				if($_SESSION[session_login]) {
					#是作者
					if ($_SESSION[ID] == $row[2]) {
						echo "<form method='POST' action='#edit'>".
						"<input type='hidden' name='ID' value='".$row[0]."'>".
						"<input type='hidden' name='Title' value='".$row[1]."'>".
						"<button type='submit'>編輯文章</button>".
						"</form>";
						echo "<form method='POST' action='#a1'>".
						"<input type='hidden' name='ID' value='".$row[0]."'>".
						"<button type='submit' name='del_article'>刪除文章</button>".
						"</form>";
					}
					#未收藏
					if(True) {
						echo "<a href='#article'>加入收藏</a><br>";
					}
					#已收藏
					else {
						echo "<a href='#article'>取消收藏</a><br>";
					}
				}
				#沒登入
				else {
					echo "<a href='member#login'>登入會員</a><br>";
				}
				echo "</div></section>";
			}
		?>
			</div>
		</section>
		<section id="new">
			<div class="contain">
				<h1>發表新文章</h1>
				<?php echo $result."<br><a href='forum#a1'>回到文章列表</a>"; ?>
				<form method="POST">
					標題：<input type="text" name="Title" value="請在此輸入標題"><br>
					內容：<br>
					<textarea name="Contain" cols="50" rows="10">請在此輸入內容</textarea><br>
					<button type="submit" name="new_article">發表文章</button>
				</form>
			</div>
		</section>
		<section id="edit">
			<div class="contain">
				<h1>編輯文章</h1>
				<?php
				echo "<form method='POST' action='#".$_POST[ID]."'>".
					"<input type='hidden' name='ID' value='".$_POST[ID]."'>".
					"標題：<input type='text' name='Title' value='".$_POST[Title]."'><br>".
					"內文：<br>".
					"<textarea name='Contain' cols='50' rows='10'>";
					$file = $_POST[ID].".txt";
					$data = file("article/".$file);
					foreach ($data as $line) {
						echo $line;
					}
					echo "</textarea><br>".
					"<button type='submit' name='edit'>修改</button>".
				"</form>";
				?>
			</div>
		</section>
	</main>
	
</body>
</html>

<?php
	mysql_free_result($rows_1);
	mysql_free_result($rows);
?>
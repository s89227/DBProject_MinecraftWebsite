<?php
	session_start();
	session_register(session_login);
	session_register(ID);
	session_register(Password);
	session_register(Email);
?>

<!DOCTYPE html>

<?php

	$error = "";
	$result = "";
	$db = mysql_connect("localhost", "root", "A12345678");
	mysql_select_db("Project");

	#註冊新會員
	if (isset($_POST["send"])) {
		$ID = $_POST["ID"];
		$Password = $_POST["Password"];
		$Email = $_POST["Email"];
		if(empty($ID) || empty($Password) || empty($Email)){
			$error = "<font style='color:red;'>所有欄位皆為必填</font><br>";
		}
		else{
			$sql = "INSERT INTO member (member_ID, password, email) VALUES ('$ID', '$Password', '$Email')";
			if(!mysql_query($sql)){
				$result = "<font style='color:red;'>新增失敗！</font><br>".mysql_error($db);
			}
			else{
				$result = "<font style='color:red;'>新增成功！</font><br>";
			}
		}
	}

	#登入會員
	if (isset($_POST["login"])) {
		$ID = $_POST["ID"];
		$Password = $_POST["Password"];
		if(empty($ID) || empty($Password)){
			$error = "<font style='color:red;'>所有欄位皆為必填</font><br>";
		}
		else{
			$sql = "SELECT * FROM `member` WHERE `member_ID` = '".$ID."' AND `password` = '".$Password."'";
			$output = mysql_query($sql);
			$data = mysql_fetch_row($output);
			if(!$data){
				$result = "<font style='color:red;'>無此帳號或密碼錯誤</font><br>";
			}
			else{
				$result = "<font style='color:red;'>登入成功</font><br>";
				$_SESSION[session_login] = True;
				$_SESSION[ID] = $ID;
				$_SESSION[Password] = $Password;
				$_SESSION[Email] = $data[2];
			}
		}
	}

	#登出會員
	if (isset($_POST["logout"])) {
		$_SESSION[session_login] = False;
		$_SESSION[ID] = "";
		$_SESSION[Password] = "";
		$_SESSION[Email] = "";
		$ID = "";
		$Password = "";
		$Email = "";
		$result = "";
		$error = "";
	}

	#編輯資料
	if (isset($_POST['edit'])) {

		$ID = $_POST["ID"];
		$Password = $_POST["Password"];
		$Email = $_POST["Email"];
		if(empty($ID) || empty($Password) || empty($Email)){
			$error = "<font style='color:red;'>所有欄位皆為必填</font><br>";
		}
		else{
			$sql = "UPDATE member SET password='$Password', email='$Email' WHERE member_id='".$ID."'";
			if(!mysql_query($sql)){
				$result = "<font style='color:red;'>更新失敗！</font><br>".mysql_error($db);
			}
			else{
				$result = "<font style='color:red;'>更新成功！</font>";
			}
		}

		$_SESSION[session_login] = True;
		$_SESSION[ID] = $ID;
		$_SESSION[Password] = $Password;
		$_SESSION[Email] = $Email;
	}

	#刪除帳號
	if (isset($_POST["del"])) {
		$ID = $_POST["ID"];
		$sql = "DELETE FROM member WHERE member_ID='".$ID."'";
		if(!mysql_query($sql)){
			$result = "<font style='color:red;'>刪除失敗！</font><br>".mysql_error($db);
		}
		else{
			$result = "<font style='color:red;'>刪除成功！</font><br>";
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
</head>
<body>
	
	<?php include("Header.php"); ?>
	<main>
		<section id="a1">
			<div class="contain">
				<h1>會員資料</h1>
				<?php echo "<p>".$result."</p>"; ?>
				帳號：<?php echo $_SESSION[ID]; ?><br>
				密碼：<?php echo $_SESSION[Password]; ?><br>
				信箱：<?php echo $_SESSION[Email]; ?><br>
				<?php
					if ($_SESSION[session_login]) {
						echo "<form method='POST'>
						<button type='submit' name='logout'>登出</button>
						<a href='#edit'>編輯資料</a>
						<input type='hidden' name='ID' value='".$_SESSION[ID]."'>
						<input type='hidden' name='Password' value='".$_SESSION[Password]."'>
						<input type='hidden' name='Email' value='".$_SESSION[Email]."'>
						<button type='submit' name='del'>刪除帳號</button>
						</form>";
					}
					else {
						echo "<br><a href='#login'>登入會員</a>";
					}
				?>
			</div>
		</section>
		<section id="a2">
			<div class="contain">
				<h1>發表的文章</h1>
				<table>
					<tr>
						<th>標題</th>
						<th>作者</th>
						<th>日期</th>
					</tr>
					<tr>
						<td>ja;o3eijaewfawefa</td>
						<td>a;oeij</td>
						<td>123253</td>
					</tr>
					<?php
					?>
				</table>
			</div>
		</section>
		<section id="a3">
			<div class="contain">
				<h1>收藏的文章</h1>
				<table>
					<tr>
						<th>標題</th>
						<th>作者</th>
						<th>日期</th>
					</tr>
					<tr>
						<td>ja;o3eijaewfawefa</td>
						<td>a;oeij</td>
						<td>123253</td>
					</tr>
					<?php
					?>
				</table>
			</div>
		</section>
		<section id="login">
			<div class="contain">
				<h1>登入</h1>
				<?php
					echo "<p>".$error."</p>";
				?>
				<form method="POST" action="#a1">
					帳號：<input type="text" name="ID"><br>
					密碼：<input type="password" name="Password"><br>
					<a href="#singup">註冊會員</a>
					<button type="submit" name="login">登入</button>
				</form>
				<?php
					echo "<p>".$result."</p>";
				?>
			</div>
		</section>
		<section id="singup">
			<div class="contain">
				<h1>註冊新會員</h1>
				<?php
					echo "<p style='color: red;'>".$error."</p>";
				?>
				<form method="POST" action="#login">
					帳號：<input type="text" name="ID"><br>
					密碼：<input type="password" name="Password"><br>
					信箱：<input type="email" name="Email"><br>
					<button type="submit" name="send">註冊</button>
				</form>
				<?php
					echo "<p>".$result."</p>";
				?>
			</div>
		</section>
		<section id="edit">
			<div class="contain">
				<h1>修改會員資料</h1>
				<?php
					echo "<p style='color: red;'>".$error."</p>".
				"<form method='POST' action='#a1'>".
					"帳號：".$_SESSION[ID]."<br>".
					"<input type='hidden' name='ID' value='".$_SESSION[ID]."'>".
					"密碼：<input type='password' name='Password' value='".$_SESSION[Password]."''><br>".
					"信箱：<input type='email' name='Email' value='".$_SESSION[Email]."''><br>".
					"<button type='submit' name='edit'>確定</button>".
				"</form>".
					"<p>".$result."</p>";
				?>
			</div>
		</section>
	</main>
	
</body>
</html>
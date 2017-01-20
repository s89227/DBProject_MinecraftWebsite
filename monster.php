<!DOCTYPE html>

<?php
	$db = @mysql_connect('localhost', 'root', 'A12345678');
	if (!$db) {
		echo "SQL connect failed!<br>";
	}
	mysql_query("SET NAMES utf8");
	if (!mysql_select_db('Project')) {
		die("failed!<br>");
	}

	$sql = "SELECT * FROM `monster`";
	$rows = mysql_query($sql);
	$num = mysql_num_rows($rows);

	$sql = "SELECT * FROM `monster` WHERE `monster_type` = '被動型'";
	$rows_1 = mysql_query($sql);
	$num_1 = mysql_num_rows($rows_1);

	$sql = "SELECT * FROM `monster` WHERE `monster_type` = '中立型'";
	$rows_2 = mysql_query($sql);
	$num_2 = mysql_num_rows($rows_2);

	$sql = "SELECT * FROM `monster` WHERE `monster_type` = '可馴服'";
	$rows_3 = mysql_query($sql);
	$num_3 = mysql_num_rows($rows_3);
	
	$sql = "SELECT * FROM `monster` WHERE `monster_type` = '攻擊型'";
	$rows_4 = mysql_query($sql);
	$num_4 = mysql_num_rows($rows_3);

	$sql = "SELECT * FROM `monster` WHERE `monster_type` = '效用型'";
	$rows_5 = mysql_query($sql);
	$num_5 = mysql_num_rows($rows_3);

	$sql = "SELECT * FROM `monster` WHERE `monster_type` = '魔王型'";
	$rows_6 = mysql_query($sql);
	$num_6 = mysql_num_rows($rows_3);

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
				<h1>被動型</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_1; $i++) { 
						$row = mysql_fetch_row($rows_1);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<section id="a2">
			<div class="contain">
				<h1>中立型</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_1; $i++) { 
						$row = mysql_fetch_row($rows_2);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<section id="a3">
			<div class="contain">
				<h1>可訓服</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_1; $i++) { 
						$row = mysql_fetch_row($rows_3);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<section id="a4">
			<div class="contain">
				<h1>攻擊型</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_1; $i++) { 
						$row = mysql_fetch_row($rows_4);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<section id="a5">
			<div class="contain">
				<h1>效用型</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_1; $i++) { 
						$row = mysql_fetch_row($rows_5);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<section id="a6">
			<div class="contain">
				<h1>Boss</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_1; $i++) { 
						$row = mysql_fetch_row($rows_6);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		
	<?php
			for ($i=0; $i < $num; $i++) {
				$row = mysql_fetch_row($rows);
				echo "<section id='".$row[0]."'>".
					"<div class='contain'>".
						"<h1>".$row[1]."</h1>".
						"<img src='img/".str_ireplace("m","Mimage",$row[0]).".png' style='max-width: 200px;'>".
						"<table><tr><td>種類</td><td>".$row[2]."</td></tr>".
						"<tr><td>攻擊</td><td>".$row[3]."</td></tr>".
						"<tr><td>防禦</td><td>".$row[4]."</td></tr>".
						"<tr><td>hp</td><td>".$row[5]."</td></tr>".
						"<tr><td>簡介</td><td>";
						$file = str_ireplace("m","Minfo",$row[0]).".txt";
						$data = file("info/".$file);
						foreach ($data as $line) {
							echo "<p>".$line."</p>";
						}
						echo "</td></tr></table></div></section>";
			}
		?>

	</main>
	
</body>
</html>

<?php
	mysql_free_result($rows_1);
	mysql_free_result($rows_2);
	mysql_free_result($rows_3);
	mysql_free_result($rows_4);
	mysql_free_result($rows_5);
	mysql_free_result($rows_6);
	mysql_free_result($rows);
?>
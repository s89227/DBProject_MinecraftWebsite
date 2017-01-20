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

	$sql = "SELECT * FROM `cube`";
	$rows = mysql_query($sql);
	$num = mysql_num_rows($rows);

	$sql = "SELECT * FROM `cube` WHERE `Cube_type` = '方塊'";
	$rows_1 = mysql_query($sql);
	$num_1 = mysql_num_rows($rows_1);

	$sql = "SELECT * FROM `cube` WHERE `Cube_type` = '固體方塊'";
	$rows_2 = mysql_query($sql);
	$num_2 = mysql_num_rows($rows_2);

	$sql = "SELECT * FROM `cube` WHERE `Cube_type` = '流體'";
	$rows_3 = mysql_query($sql);
	$num_3 = mysql_num_rows($rows_3);
	
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
				<h1>方塊</h1>
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
				<h1>固體方塊</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_2; $i++) { 
						$row = mysql_fetch_row($rows_2);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<section id="a3">
			<div class="contain">
				<h1>流體方塊</h1>
				<ul>
				<?php
					for ($i=0; $i < $num_3; $i++) { 
						$row = mysql_fetch_row($rows_3);
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
						"<img src='img/".str_ireplace("c","Cimage",$row[0]).".png' style='max-width: 200px;'>".
						"<table><tr><td>種類</td><td>".$row[2]."</td></tr>".
						"<tr><td>生成方式</td><td>".$row[3]."</td></tr>".
						"<tr><td>功能</td><td>".$row[4]."</td></tr>".
						"<tr><td>簡介</td><td>";
						$file = str_ireplace("c","Cinfo",$row[0]).".txt";
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
	mysql_free_result($rows);
?>
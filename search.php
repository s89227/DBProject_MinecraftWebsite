<!DOCTYPE html>
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
				<h1>搜尋</h1>
				<form method="GET" action="#result">
					材料：<input type="text" name="Keyword"><button type="submit">搜尋</button>
				</form>
			</div>
		</section>
		<section id="result">
			<div class="contain">
				<h1>查詢結果</h1>
				<?php
					echo "<p>材料 <strong><u>".$Keyword."</u></strong> 的搜尋結果如下：</p>";

					$db = @mysql_connect('localhost', 'root', 'A12345678');
					if (!$db) {
						echo "SQL connect failed!<br>";
					}
					mysql_query("SET NAMES utf8");
					if (!mysql_select_db('Project')) {
						die("failed!<br>");
					}

					$sql = "SELECT cube_id, cube_name, item_id, item_name
							FROM cube INNER JOIN item ON cube.cube_id = item.pos1_cube
							OR cube.cube_id = item.pos2_cube
							OR cube.cube_id = item.pos3_cube
							OR cube.cube_id = item.pos4_cube
							OR cube.cube_id = item.pos5_cube
							OR cube.cube_id = item.pos6_cube
							OR cube.cube_id = item.pos7_cube
							OR cube.cube_id = item.pos8_cube
							OR cube.cube_id = item.pos9_cube
							WHERE cube_name = '".$Keyword."'";
					$rows = mysql_query($sql);
					$num = mysql_num_rows($rows);
					if ($num) {
						for ($i=0; $i < $num; $i++) { 
							$row = mysql_fetch_row($rows);
							if ($i == 0) {
								echo "<li><a href='cube#".$row[0]."'>".$row[1]."</a></li>";
							}
							echo "<li><a href='formula#".$row[2]."'>".$row[3]."</a></li>";
						}
					}
					else {
						echo "查無結果！<br>";
					}
					
					mysql_free_result($rows);
					mysql_close($db);
				?>
			</div>
		</section>
	</main>
	
</body>
</html>
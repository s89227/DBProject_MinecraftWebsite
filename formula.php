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

	$sql = "SELECT * FROM item";
	$rows = mysql_query($sql);
	$num = mysql_num_rows($rows);

	$sql_1 = "SELECT * FROM item";
	$rows_1 = mysql_query($sql_1);
	$num_1 = mysql_num_rows($rows_1);
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
				<h1>合成公式</h1>
				<ul>
				<?php
					for ($i=0; $i < $num; $i++) { 
						$row = mysql_fetch_row($rows);
						echo "<li><a href='#".$row[0]."'>".$row[1]."</a></li>";
					}
				?>
				</ul>
			</div>
		</section>
		<?php
			for ($i=0; $i < $num_1; $i++) {
				$row = mysql_fetch_row($rows_1);
				echo "<section id='".$row[0]."'>".
					"<div class='contain'>".
						"<h1>".$row[1]."</h1>".
						"<img src='img/".str_ireplace("c","Cimage",$row[11]).".png' style='max-width: 200px;'>".
						"<p>合成公式：</p>".
						"<table style='margin-left: 28vw;'>".
							"<tr>";
							for ($i=2; $i < 5; $i++) { 
								echo "<td><a href='cube#".$row[$i]."'>";
								$sql = "SELECT cube_name FROM cube WHERE cube_id = '".$row[$i]."'";
								$a = mysql_query($sql);
								$data = mysql_fetch_row($a);
								echo $data[0]."</a></td>";
								mysql_free_result($a);
							}
							echo "</tr>";
							echo "<tr>";
							for ($i=5; $i < 8; $i++) { 
								echo "<td><a href='cube#".$row[$i]."'>";
								$sql = "SELECT cube_name FROM cube WHERE cube_id = '".$row[$i]."'";
								$a = mysql_query($sql);
								$data = mysql_fetch_row($a);
								echo $data[0]."</a></td>";
								mysql_free_result($a);
							}
							echo "</tr>";
							echo "<tr>";
							for ($i=8; $i < 11; $i++) { 
								echo "<td><a href='cube#".$row[$i]."'>";
								$sql = "SELECT cube_name FROM cube WHERE cube_id = '".$row[$i]."'";
								$a = mysql_query($sql);
								$data = mysql_fetch_row($a);
								echo $data[0]."</a></td>";
								mysql_free_result($a);
							}
							echo "</tr>".
						"</table>".
					"</div></section>";
			}
		?>
	</main>
	
</body>
</html>

<?php
	mysql_free_result($rows_1);
	mysql_free_result($rows);
	mysql_close($db);
?>
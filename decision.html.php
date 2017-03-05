<!DOCTYPE=html>
<html>
<title></title>
<head>
		<meta http-equiv="refresh" content=0; url="http://localhost/index.html.php" />
		<p><a href="http://localhost/index.html.php">Redirect</a></p>
</head>
<body>
	<?php
			$fileName = "newMusicTest.txt";
			$file = fopen($fileName, "w");
			$count = 0;

			while(!feof($file))
			{
    			$data = fgets($file);
    			$count++;

    			echo $data."<br /br>";
			}
    		fclose($file);
    		?>
</body>
</html>
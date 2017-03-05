<!DOCTYPE=html>
<html>
<title></title>
<head>
		<p><a href="http://localhost/index.html.php">Click Me</a></p>
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
<footer class="footer">
  <p>Posted by: <a href="vladimirbeauge.github.io">Vladimir Beauge</a>, <a href="mailto:gibsonp200@potsdam.edu">Steven Gibson</a>, and <a href="mailto:mattheli198@potsdam.edu">Ian Matthews</a>
  </p>
</footer>
</html>
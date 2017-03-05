
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>DJ Queue</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="2 Column CSS Demo - Equal Height Columns with Cross-Browser CSS" />
	<meta name="keywords" content="2 Column CSS Demo - Equal Height Columns with Cross-Browser CSS" />
	<meta name="robots" content="index, follow" />
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<style media="screen" type="text/css">
/* <!-- */
body {
list-style: 
	margin:0;
	padding:0;
}
#header h1,
#header h2,
#header p {
	margin-left:2%;
	padding-right:2%;
}
#active2 #tab2,
#active3 #tab3,
#active4 #tab4,
#active5 #tab5 {
	font-weight:bold;
	text-decoration:none;
	color:#000;
}
#footer {
	clear:both;
	float:left;
	width:100%;
}
#footer p {
	margin-left:2%;
	padding-right:2%;
}

/**background-image: url(""); */

/* Start of Column CSS */
#container2 {
	clear:left;
	float:left;
	width:100%;
	overflow:hidden;
}
#container1 {
	float:left;
	width:100%;
	position:relative;
	right:50%;
}
#col1 {
	float:left;
	width:46%;
	position:relative;
	left:52%;
	overflow:hidden;
}
#col2 {
	float:left;
	width:46%;
	position:relative;
	left:56%;
	overflow:hidden;
}
/* --> */
    </style>
</head>
<body id="active2">

<div id="header">
	<h1><center>Currently Playing: 
			<?php
			$fileName = "musicTest.txt";
			$file = fopen($fileName, "r");
			$count = 0;

			while(!feof($file) and $count<1)
			{
    			$data = fgets($file);
    			$count++;

    			echo $data;
			}
    		fclose($file);
    		?>
		</center></h1>
<div id="container2">
	<div id="container1">
		<div id="col1">
			<!-- Column one start -->
			<h2>Request a Song</h2>
			<!-- PHP Start -->
			<?php
			// define variables and set to empty values
			$titleErr = "";
			$title = $artist = $genre = $name = "";
			  
			//title		
			  if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["title"])) {
			    $titleErr = "Title is required";
			  } else {
			    $title = test_input($_POST["title"]);
			    // check if name only contains letters and whitespace
			     
			    }
			  }
  

			//artist
				if (empty($_POST["artist"])) {
			    $artist = "";
			  } else {
			    $artist = test_input($_POST["artist"]);
			    }
			  

			  //genre
				if (empty($_POST["genre"])) {
			    $genre = "";
			  } else {
			    $genre = test_input($_POST["genre"]);
			    }
			   
			  
			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			?>

			<p><span class="error">* required field.</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			  Title: <input type="text" name="title" value="<?php echo $title;?>">
			  <span class="error">* <?php echo $titleErr;?></span>
			  <br><br>
			  Artist: <input type="text" name="artist" value="<?php echo $artist;?>">
			  <br><br>
			  Genre: <input type="text" name="genre" value="<?php echo $genre;?>">
			  <br><br>
			  <input type="submit" name="submit" value="Submit">  
			</form>

			<?php

			
			$file = fopen("musicTest.txt", "a");
			echo fwrite($file,$title." : ".$artist." : ".$genre."\r\n");
			fclose($file);

			echo "<h2>Your Input:</h2>";
			echo $title;
			echo " ";
			echo $artist;
			echo " ";
			echo $genre;
			echo " ";
			?>

			<!-- PHP End -->
			<!-- Column one end -->
		</div>
		<div id="col2">
			<!-- Column two start -->
			<h2>View Queue</h2>
			<?php
			$fileName = "musicTest.txt";
			$file = fopen($fileName, "r");

			while(!feof($file))
			{
    			$data = fgets($file);
    			echo $data."<br /br>";
			}
    		fclose($file);
    		?>
			<!-- Column two end -->
		</div>
	</div>
</div>
</body>
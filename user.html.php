
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
	</head>

	<style media="screen" type="text/css">
		.body {
		list-style: 
			margin:0;
			padding:0;
		}

		.back-color
		{
			background-color: white;
		}
		.main
		{
			background-color:#e9ecf4;
		    font: Monospace;
		    font-size:20px;
		    background-image: url("https://static.pexels.com/photos/164732/pexels-photo-164732.jpeg");  }
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
		.img{
				width: 100%;
				height: auto;
			}
		.boxed {
		  border: 1px solid white ;
		  background-color: white;
		}
		/* --> */
	</style>

	<body id="active2" class="main">
		<nav class="navbar navbar-default nav-colo">
		  <div class="container-fluid">
		    <div class="navbar-header"><a class="navbar-brand" href="http://localhost/index.html.php">DJ Queue</a></div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="http://localhost/index.html.php">Home</a></li>
		      <li><a href="http://localhost/user.html.php">User Interface</a></li>
		      <li><a href="http://localhost/dj.html.php">DJ Interface</a></li></ul>
		  </div>
		</nav>
			<div class="boxed">
			<h1><font size="8"><center><bold>DJ-Queue</bold></center></font></h1>
			<div><font size="6">
				<p><center><a href="http://localhost/user.html.php" target="_blank">User Interface</a></p></center>
				<p><center><a href="http://localhost/dj.html.php" target="_blank">DJ Interface</a></p></center>
			</div></p></div>
		<div id="header">
			<h1><center class="back-color">Currently Playing: 
					<!-- Extract Current Song -->
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

				</center></h1></div>
		<div id="container2">
			<div id="container1">
				<div id="col1">
					<!-- Column one start -->
					<h2 class="back-color">Request a Song</h2>
					<?php //validating input before submission
						$bool = true;
						$titleErr = $title = $artist = $genre = "";
					  
						//title		
					 	if($_SERVER["REQUEST_METHOD"] == "POST") 
					  	{
					  		if(empty($_POST["title"])) 
					  		{
					    		$titleErr = "Title is required";
					    		$bool = false;
					  		}	 
					  		else
					    		$title = test_input($_POST["title"]);   
					    }
		  

						//artist
						if (empty($_POST["artist"]))
					    	$artist = "";
					  	else
					    $artist = test_input($_POST["artist"]);

						//genre
						if (empty($_POST["genre"]))
					    	$genre = "";
					  	else 
					    	$genre = test_input($_POST["genre"]);
					    
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}
					?>

					<div class="boxed">
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
					</div>

					<?php //Adding Input to file
						if($bool and $title != ":  :")
						{
							$file = fopen("musicTest.txt", "a");
							echo fwrite($file,"\r\n".$title." : ".$artist." : ".$genre);
							fclose($file);

						}
					?>
					<!-- Column one end -->
				</div>
				<div id="col2" class="boxed">
					<!-- Column two start -->
					<h2 class="back-color">View Queue</h2>
					<?php //print out files from file
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
</html>
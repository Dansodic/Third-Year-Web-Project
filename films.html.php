<!DOCTYPE HTML>
<!--
	Daniel Kenny
	C00231168

	Web style is an altered version of Monochromed by TEMPLATED
  templated.co @templatedco
  Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Films</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a style="color:rgb(255, 255, 255);" href="#">The Films</a></h1>
						<span style="color:rgb(255, 255, 255);">Info for all!</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">Homepage</a></li>
							<li class="active"><a href="films.html.php">Films</a></li>
							<li><a href="people.html.php">Characters</a></li>
							<li><a href="planets.html.php">Planets</a></li>
							<li><a href="species.html.php">Species</a></li>
              <li><a href="starships.html.php">Starships</a></li>
              <li><a href="vehicles.html.php">Vehicles</a></li>
              <li><a href="sources.html">Sources</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->
			
	<!-- Main -->
	<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
						<div id="content" class="12u skel-cell-important">
							<section>
								<header>
									<h2>FILMS</h2>
									<span class="byline">A long time ago in an API far, far away.</span>
								</header>
								<!--<p><a href="#" class="image full"><img src="images/pics02.jpg" alt=""></a></p> -->
								<p>Welcome to the Star Wars film page. Below you will find various options to choose from. Each will give you information about each film related to the criteria specified by your choice.</p>
					
					<p>
          <form action = "films.html.php" method = "post" name = "reportForm">
					<input type = "hidden" name = "choice">
					</form>

<h3>(Click a button to see specific information about each film.)</h3>

<input type = 'button' class = "button" id = "releaseDate" value = 'Show Film Release Dates' 
onclick = 'filmDates()' title = 'Click here to see the release dates of each film.'> 
<input type = 'button' class = "button" id = "director" value = 'Show Film Director' 
onclick = 'directors()' title = 'Click here to see each film title with the director.'>
<input type = 'button' class = "button" id = "producer" value = 'Show Film Producers' 
onclick = 'producers()' title = 'Click here to see each film title with the producers.'>
<input type = 'button' class = "button" id = "crawl" value = 'Show Opening Crawl' 
onclick = 'crawl()' title = 'Click here to see the opening crawl for each film.'>


<!--################## After clicking a button set choice and submit form ###################### -->

<script>
function filmDates() 
{
	document.reportForm.choice.value = "dates";
	document.reportForm.submit();
}
function directors() 
{
	document.reportForm.choice.value = "director";
	document.reportForm.submit();
}
function producers() 
{
	document.reportForm.choice.value = "producers";
	document.reportForm.submit();
}
function crawl() 
{
	document.reportForm.choice.value = "crawl";
	document.reportForm.submit();
}
</script>

<!--################## Check choice then disable the clicked button ###################### -->
<?php
$choice = ""; //on first load, the choice is not yet picked.
    
if(ISSET($_POST['choice']))
{
    $choice = $_POST['choice'];
}
if($choice =="dates")
{
?>
    <script>
	document.getElementById("releaseDate").disabled = true;
	document.getElementById("director").disabled = false;	
	document.getElementById("producers").disabled = false;
	document.getElementById("crawl").disabled = false;
	</script>
<?php 
    releaseDates();
}
if($choice =="producers")
{
?>
    <script>
	document.getElementById("producer").disabled = true;
	document.getElementById("director").disabled = false;	
	document.getElementById("releaseDate").disabled = false;
	document.getElementById("crawl").disabled = false;	
	</script>
<?php 
    producers();
}
if($choice =="crawl")
{
?>
    <script>
	document.getElementById("crawl").disabled = true;
	document.getElementById("director").disabled = false;
	document.getElementById("releaseDate").disabled = false;
	document.getElementById("producers").disabled = false;
	</script>
<?php 
    crawl();
}
if ($choice =="director")
{
?>
    <script>
	document.getElementById("director").disabled = true;
	document.getElementById("crawl").disabled = false;
	document.getElementById("releaseDate").disabled = false;
	document.getElementById("producers").disabled = false;	
	</script>
<?php
    directors();
};
?>
<!--################## Functions to carry out the sql query to the database ###################### -->
<?php

function releaseDates()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT episode_id, title,release_date FROM films ORDER BY release_date";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Episode</th><th>Title</th><th>Release Date</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['episode_id'] . "</td>
       <td>" . $row['title'] . "</td>
       <td>" . $row['release_date'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function directors()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT episode_id,title,director FROM films ORDER BY episode_id";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Episode</th><th>Title</th><th>Director</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {   
      echo "<td>" . $row['episode_id'] . "</td>
			 <td>" . $row['title'] . "</td>
			 <td>" . $row['director'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function producers()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT episode_id,title,producer FROM films ORDER BY episode_id";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Episode</th><th>Title</th><th>Producer</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['episode_id'] . "</td>
			 <td>" . $row['title'] . "</td>
			 <td>" . $row['producer'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function crawl()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT episode_id,title,opening_crawl FROM films ORDER BY episode_id";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Episode</th><th>Title</th><th>Opening Crawl</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {      
      echo "<td>" . $row['episode_id'] . "</td>
			 <td>" . $row['title'] . "</td>
			 <td>" . $row['opening_crawl'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}
?>
   </p>
							</section>
						</div>
					<!-- /Content -->
						
				</div>
			
			</div>
		</div>
	<!-- Main -->

	<!-- Footer -->
		<div id="footer">
			<div class="container">
				<div class="row">
					
					<div class="6u">
						<section>
							<header>
								<h2>About</h2>
							</header>
              <p>The Star Wars fan site is developed and maintained by Dan Kenny, a computer science student of IT Carlow. This app was developed as part of a year 3 project in Web and App Development.</p>
              <p>This app is developed using the Star Wars API (SWAPI) which is freely available to use as it is open data.</p>
              
              <h3>For more information on open data and the Star Wars API, please use the links below.</h3>
							<ul class="default">
								<li><a href="https://swapi.co/">The Star Wars API</a></li>
								<li><a href="sources.html">Open Data.</a></li>
							</ul>
						</section>				
					</div>
					<div class="6u">
						<section>
							<header>
								<h2>Contact</h2>
							</header>
              <p>If you have any questions related to the app or suggestions to further improve upon it, please feel free to contact me using the details provided below.</p>
              <h3>Contact Info</h3>
							<ul class="default">
								<li><a href="mailto:c00231168@itcarlow.ie?Subject=StarWarsFanSite" target="_top">c00231168@itcarlow.ie</a></li>
								<li>Phone: 0871234567</li>
							</ul>
						</section>
					</div>
				</div>
			</div>
		</div>
	<!-- Footer -->

	<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				Developed By: <a href="http://www.dankennygamedesign.com/">Dan Kenny</a> API: <a href="https://swapi.co/">SWAPI</a>
			</div>
		</div>

	</body>
</html>
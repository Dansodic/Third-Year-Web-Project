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
		<title>Characters</title>
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
						<h1><a style="color:rgb(255, 255, 255);" href="#">The Characters</a></h1>
						<span style="color:rgb(255, 255, 255);">Info for all!</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">Homepage</a></li>
							<li><a href="films.html.php">Films</a></li>
							<li class="active"><a href="people.html.php">Characters</a></li>
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
									<h2>Characters</h2>
									<span class="byline">A long time ago in an API far, far away.</span>
								</header>
								<!--<p><a href="#" class="image full"><img src="images/pics02.jpg" alt=""></a></p> -->
								<p>Welcome to the Star Wars characters page. Below you will find various options to choose from. Each will give you information about each character related to the criteria specified by your choice.</p>
					
					<p>
          <form action = "people.html.php" method = "post" name = "reportForm">
					<input type = "hidden" name = "choice">
					</form>

<h3>(Click a button to see specific information about each character.)</h3>

<input type = 'button' class = "button" id = "gender" value = 'Show Genders' 
onclick = 'gender()' title = 'Click here to see the gender of each person.'> 

<input type = 'button' class = "button" id = "height" value = 'Height & Mass' 
onclick = 'heightMass()' title = 'Click here to see the height and mass of each character.'>

<input type = 'button' class = "button" id = "colour" value = 'Show Traits' 
onclick = 'charColour()' title = 'Click here to display the hair, skin and eye colour of each character.'>

<input type = 'button' class = "button" id = "birth" value = 'Show Birth Year' 
onclick = 'birth()' title = 'Click here to see the birth year for each character.'>


<!--################## After clicking a button set choice and submit form ###################### -->

<script>
function gender() 
{
	document.reportForm.choice.value = "gender";
	document.reportForm.submit();
}
function heightMass() 
{
	document.reportForm.choice.value = "height";
	document.reportForm.submit();
}
function charColour() 
{
	document.reportForm.choice.value = "colour";
	document.reportForm.submit();
}
function birth() 
{
	document.reportForm.choice.value = "birth";
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
if($choice =="gender")
{
?>
    <script>
	document.getElementById("gender").disabled = true;
	document.getElementById("height").disabled = false;	
	document.getElementById("colour").disabled = false;
	document.getElementById("birth").disabled = false;
	</script>
<?php 
    genders();
}
if($choice =="colour")
{
?>
    <script>
	document.getElementById("colour").disabled = true;
	document.getElementById("gender").disabled = false;	
	document.getElementById("height").disabled = false;
	document.getElementById("birth").disabled = false;	
	</script>
<?php 
    charTraits();
}
if($choice =="birth")
{
?>
    <script>
	document.getElementById("birth").disabled = true;
	document.getElementById("height").disabled = false;	
	document.getElementById("colour").disabled = false;
	document.getElementById("gender").disabled = false;
	</script>
<?php 
    birthyear();
}
if ($choice =="height")
{
?>
    <script>
	document.getElementById("height").disabled = true;
	document.getElementById("gender").disabled = false;	
	document.getElementById("colour").disabled = false;
	document.getElementById("birth").disabled = false;	
	</script>
<?php
    height();
};
?>
<!--################## Functions to carry out the sql query to the database ###################### -->
<?php

function genders()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name, gender FROM people ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Gender</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['name'] . "</td>
       <td>" . $row['gender'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function height()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,height,mass FROM people ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Height(Inches)</th><th>Mass(Kg)</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {   
      echo "<td>" . $row['name'] . "</td>
			 <td>" . $row['height'] . "</td>
			 <td>" . $row['mass'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function charTraits()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,hair_color,eye_color,skin_color FROM people ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Hair Colour</th><th>Eye Colour</th><th>Skin Colour</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['name'] . "</td>
			 <td>" . $row['hair_color'] . "</td>
			 <td>" . $row['eye_color'] . "</td>
			 <td>" . $row['skin_color'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function birthyear()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,birth_year FROM people ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Birth Year</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {      
      echo "<td>" . $row['name'] . "</td>
			 <td>" . $row['birth_year'] . "</td>
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
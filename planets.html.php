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
		<title>Planets</title>
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
						<h1><a style="color:rgb(255, 255, 255);" href="#">The Planets</a></h1>
						<span style="color:rgb(255, 255, 255);">Info for all!</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">Homepage</a></li>
							<li><a href="films.html.php">Films</a></li>
							<li><a href="people.html.php">Characters</a></li>
							<li class="active"><a href="planets.html.php">Planets</a></li>
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
									<h2>PLANETS</h2>
									<span class="byline">A long time ago in an API far, far away.</span>
								</header>
								<!--<p><a href="#" class="image full"><img src="images/pics02.jpg" alt=""></a></p> -->
								<p>Welcome to the Star Wars planets page. Below you will find various options to choose from. Each will give you information about each planet related to the criteria specified by your choice.</p>
					
					<p>
          <form action = "planets.html.php" method = "post" name = "reportForm">
					<input type = "hidden" name = "choice">
					</form>

<h3>(Click a button to see specific information about each character.)</h3>

<input type = 'button' class = "button" id = "population" value = 'Show Population' 
onclick = 'pop()' title = 'Click here to see the population of each palnet.'> 

<input type = 'button' class = "button" id = "orbit" value = 'Orbital Data' 
onclick = 'orbit()' title = 'Click here to see the orbital data of each planet.'>

<input type = 'button' class = "button" id = "climate" value = 'Climate Data' 
onclick = 'climate()' title = 'Click here to display the climate of each planet.'>


<!--################## After clicking a button set choice and submit form ###################### -->

<script>
function pop() 
{
	document.reportForm.choice.value = "population";
	document.reportForm.submit();
}
function orbit() 
{
	document.reportForm.choice.value = "orbit";
	document.reportForm.submit();
}
function climate() 
{
	document.reportForm.choice.value = "climate";
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
if($choice =="population")
{
?>
    <script>
	document.getElementById("population").disabled = true;
	document.getElementById("climate").disabled = false;	
	document.getElementById("orbit").disabled = false;
	</script>
<?php 
    planetPop();
}
if($choice =="climate")
{
?>
    <script>
	document.getElementById("climate").disabled = true;
	document.getElementById("population").disabled = false;	
	document.getElementById("orbit").disabled = false;	
	</script>
<?php 
    climatedata();
}
if ($choice =="orbit")
{
?>
    <script>
	document.getElementById("orbit").disabled = true;
	document.getElementById("population").disabled = false;	
	document.getElementById("climate").disabled = false;	
	</script>
<?php
    orbitdata();
};
?>
<!--################## Functions to carry out the sql query to the database ###################### -->
<?php

function planetPop()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name, population FROM planets ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Population</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['name'] . "</td>
       <td>" . $row['population'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function orbitdata()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,rotation_period,orbital_period,diameter,gravity FROM planets ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Rotation Period</th><th>Orbital Period</th><th>Diameter</th><th>Gravity</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {   
      echo "<td>" . $row['name'] . "</td>
			 <td>" . $row['rotation_period'] . "</td>
			 <td>" . $row['orbital_period'] . "</td>
			 <td>" . $row['diameter'] . "</td>
			 <td>" . $row['gravity'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function climatedata()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,climate,terrain,surface_water FROM planets ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Climate</th><th>Terrain</th><th>Surface Water (%)</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['name'] . "</td>
			 <td>" . $row['climate'] . "</td>
			 <td>" . $row['terrain'] . "</td>
			 <td>" . $row['surface_water'] . "</td>
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
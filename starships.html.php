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
		<title>Starships</title>
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
						<h1><a style="color:rgb(255, 255, 255);" href="#">The Starships</a></h1>
						<span style="color:rgb(255, 255, 255);">Info for all!</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">Homepage</a></li>
							<li><a href="films.html.php">Films</a></li>
							<li><a href="people.html.php">Characters</a></li>
							<li><a href="planets.html.php">Planets</a></li>
							<li><a href="species.html.php">Species</a></li>
              <li class="active"><a href="starships.html.php">Starships</a></li>
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
									<h2>Starships</h2>
									<span class="byline">A long time ago in an API far, far away.</span>
								</header>
								<!--<p><a href="#" class="image full"><img src="images/pics02.jpg" alt=""></a></p> -->
								<p>Welcome to the Star Wars Starships page. Below you will find various options to choose from. Each will give you information about each Starship related to the criteria specified by your choice.</p>
					
					<p>
          <form action = "starships.html.php" method = "post" name = "reportForm">
					<input type = "hidden" name = "choice">
					</form>

<h3>(Click a button to see specific information about each Starship.)</h3>

<input type = 'button' class = "button" id = "model" value = 'Model & Manufacturer' 
onclick = 'model()' title = 'Click here to see the Model & Manufacturer of each Starship.'> 

<input type = 'button' class = "button" id = "cost" value = 'Cost & Class' 
onclick = 'cost()' title = 'Click here to see the cost and class of each Starship.'>

<input type = 'button' class = "button" id = "Storage" value = 'Storage Details' 
onclick = 'Storage()' title = 'Click here to display the storage details of each Starship.'>

<input type = 'button' class = "button" id = "flight" value = 'Flight Tech Details' 
onclick = 'flight()' title = 'Click here to see the technical flight details of each Starship.'>


<!--################## After clicking a button set choice and submit form ###################### -->

<script>
function model() 
{
	document.reportForm.choice.value = "model";
	document.reportForm.submit();
}
function cost() 
{
	document.reportForm.choice.value = "cost";
	document.reportForm.submit();
}
function Storage() 
{
	document.reportForm.choice.value = "Storage";
	document.reportForm.submit();
}
function flight() 
{
	document.reportForm.choice.value = "flight";
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
if($choice =="model")
{
?>
    <script>
	document.getElementById("model").disabled = true;
	document.getElementById("Storage").disabled = false;	
	document.getElementById("flight").disabled = false;
	document.getElementById("cost").disabled = false;
	</script>
<?php 
    modeldata();
}
if($choice =="Storage")
{
?>
    <script>
	document.getElementById("Storage").disabled = true;
	document.getElementById("model").disabled = false;	
	document.getElementById("flight").disabled = false;
	document.getElementById("cost").disabled = false;	
	</script>
<?php 
    Storagedata();
}
if($choice =="flight")
{
?>
    <script>
	document.getElementById("flight").disabled = true;
	document.getElementById("model").disabled = false;	
	document.getElementById("Storage").disabled = false;
	document.getElementById("cost").disabled = false;		
	</script>
<?php 
    flightdata();
}
if ($choice =="cost")
{
?>
    <script>
	document.getElementById("cost").disabled = true;
	document.getElementById("model").disabled = false;	
	document.getElementById("Storage").disabled = false;
	document.getElementById("flight").disabled = false;			
	</script>
<?php
    costdata();
};
?>
<!--################## Functions to carry out the sql query to the database ###################### -->
<?php

function modeldata()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name, model,manufacturer FROM starships ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Model</th><th>Manufacturer</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['name'] . "</td>
       <td>" . $row['model'] . "</td>
       <td>" . $row['manufacturer'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function costdata()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,cost_in_credits,starship_class FROM starships ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Starship Class</th><th>Cost in Credits</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {   
      echo "<td>" . $row['name'] . "</td>
       <td>" . $row['starship_class'] . "</td>
       <td>" . $row['cost_in_credits'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function Storagedata()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,cargo_capacity,crew,passengers,consumables,length FROM starships ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Cargo Capacity</th><th>Crew</th><th>Passengers</th><th>Consumables</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {
      echo "<td>" . $row['name'] . "</td>
       <td>" . $row['cargo_capacity'] . "</td>
       <td>" . $row['crew'] . "</td>
       <td>" . $row['passengers'] . "</td>
       <td>" . $row['consumables'] . "</td>
       </tr>";
  }
	echo "</table>";
	mysqli_close($connect); //Close connection to DB after returning data for better security
}

function flightdata()
{
  $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
  $sql = "SELECT name,max_atmosphering_speed,hyperdrive_rating,MGLT FROM starships ORDER BY name";
  $result = mysqli_query($connect, $sql);
      
  echo "<table id = 'customers'>
      <tr><th>Name</th><th>Max Atmosphering Speed</th><th>Hyperdrive Rating</th><th>MGLT</th></tr>";
  while ($row = mysqli_fetch_array($result))
  {      
      echo "<td>" . $row['name'] . "</td>
       <td>" . $row['max_atmosphering_speed'] . "</td>
       <td>" . $row['hyperdrive_rating'] . "</td>
       <td>" . $row['MGLT'] . "</td>
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
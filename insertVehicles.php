<?php
//Daniel Kenny
//C00231168
//Code used to get contents of JSON file and decode it to PHP Object. Then iterate through the object using a foreach loop in order to insert data to database.

          $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "SWAPI_Vehicles.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $object = json_decode($data, true); //Convert JSON String into PHP Object
          foreach($object as $row) //Extract the Object Values using Foreach Loop
          {
            // Make Multiple Inserts with the data specified
           $query .= "INSERT INTO vehicles(name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, vehicle_class) VALUES (
            '".$row["name"]."', 
           '".$row["model"]."', 
           '".$row["manufacturer"]."', 
           '".$row["cost_in_credits"]."', 
           '".$row["length"]."', 
           '".$row["max_atmosphering_speed"]."', 
           '".$row["crew"]."', 
           '".$row["passengers"]."', 
           '".$row["cargo_capacity"]."',
           '".$row["consumables"]."',
           '".$row["vehicle_class"]."'); ";
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     echo '<h3>JSON Data Added to Database!</h3><br />';
    }
    //else{
     // echo("Error description: " . $connect -> error);
    //}
  ?>
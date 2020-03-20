<?php
//Daniel Kenny
//C00231168
//Code used to get contents of JSON file and decode it to PHP Object. Then iterate through the object using a foreach loop in order to insert data to database.

          $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "SWAPI_Species.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $object = json_decode($data, true); //Convert JSON String into PHP Object
          foreach($object as $row) //Extract the Object Values using Foreach Loop
          {
            // Make Multiple Inserts with the data specified
           $query .= "INSERT INTO species(name, classification, designation, average_height, skin_colors, hair_colors, eye_colors, language, average_lifespan) VALUES (
            '".$row["name"]."', 
           '".$row["classification"]."', 
           '".$row["designation"]."', 
           '".$row["average_height"]."', 
           '".$row["skin_colors"]."', 
           '".$row["hair_colors"]."', 
           '".$row["eye_colors"]."', 
           '".$row["language"]."', 
           '".$row["average_lifespan"]."'); ";
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     echo '<h3>JSON Data Added to Database!</h3><br />';
    }
    //else{
     // echo("Error description: " . $connect -> error);
    //}
  ?>
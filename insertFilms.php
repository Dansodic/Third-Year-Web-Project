<?php
//Daniel Kenny
//C00231168
//Code used to get contents of JSON file and decode it to PHP Object. Then iterate through the object using a foreach loop in order to insert data to database.

          $connect = mysqli_connect("localhost", "root", "", "SWAPI"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "SWAPI_Films.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $object = json_decode($data, true); //Convert JSON String into PHP Object
          foreach($object as $row) //Extract the Object Values using Foreach Loop
          {
            // Make Multiple Inserts with the data specified
           $query .= "INSERT INTO films(title, episode_id, opening_crawl, director, producer, release_date) VALUES ('".$row["title"]."', '".$row["episode_id"]."', '".$row["opening_crawl"]."', '".$row["director"]."', '".$row["producer"]."', '".$row["release_date"]."'); ";
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     echo '<h3>JSON Data Added to Database!</h3><br />';
    }
    else{
      echo("Error description: " . $connect -> error);
    }
  ?>
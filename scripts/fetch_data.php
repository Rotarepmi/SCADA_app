<?php

  session_start();

  require_once "connect.php";

  // convert connection errors into exceptions
  mysqli_report(MYSQLI_REPORT_STRICT);

  // error handling with try-catch
  try{
    $connection = new mysqli($host, $db_user, $db_pass, $db_name);

    // throw exception if connection fails
    if($connection->connect_errno!=0){
      throw new Exception(mysqli_connect_errno());
    }
    else{
      // fetch data from db
      $result = $connection->query("SELECT * FROM scada ORDER BY id DESC LIMIT 5");

      if(!$result){
        throw new Exception($connection->error);
        $respone = ('error');
      }

      $db_data = array();

      while($row = $result->fetch_assoc()){
        // serialize each column from db into array
        $data = array(
          "id" => $row[id],
          "x1" => $row[x1],
          "x2" => $row[x2],
          "x3" => $row[x3],
          "x4" => $row[x4],
          "x5" => $row[x5],
          "x6" => $row[x6],
          "x7" => $row[x7],
          "x8" => $row[x8],
          "x9" => $row[x9],
          "date" => $row[datetime]
        );

        // insert each array into "global" array
        $db_data[] = $data;
      }

      // encode array as json object
      $response = json_encode($db_data);

      // send response to ajax
      echo $response;
      // close reports stream and connection
      mysqli_report(MYSQLI_REPORT_OFF);
      $result->close();
      $connection->close();
    }
  }
  // display exceptions
  catch(Exception $e){
    echo 'Błąd serwera.';
    echo '<br />info dev '.$e;
  }
?>

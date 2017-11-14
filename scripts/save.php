<?php

  session_start();

  // fetch stringified data from ajax and parse into object
  $post = $_POST['data'];
  parse_str($post, $data);

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
      // set data from ajax obj to variables
      $x1 = $data['x1'];
      $x2 = $data['x2'];
      $x3 = $data['x3'];
      $x4 = $data['x4'];
      $x5 = $data['x5'];
      $x6 = $data['x6'];
      $x7 = $data['x7'];
      $x8 = $data['x8'];
      $x9 = $data['x9'];

      // insert data to db, set response to "success"
      if($result=$connection->query("INSERT INTO scada VALUES (NULL, '$x1', '$x2', '$x3', '$x4', '$x5', '$x6', '$x7', '$x8', '$x9', now())")){
        $response = ('success');
      }
      // if writing into db fails - throw exception, set response to "error"
      else{
        $response = ('error');
        throw new Exception($connection->error);
      }

      // send rosponse to ajax
      echo $response;
      // close reports stream and connection
      mysqli_report(MYSQLI_REPORT_OFF);
      $connection->close();
    }
  }
  // display exceptions
  catch(Exception $e){
    echo 'Błąd serwera.';
    echo '<br />info dev '.$e;
  }
?>

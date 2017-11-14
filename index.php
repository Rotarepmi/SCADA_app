<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>

<!-- Include metatags -->
<?php require_once "../modules/meta.php"; ?>

<link rel="stylesheet" href="css/style.min.css">
<link rel="stylesheet" href="css/fonts/font-awesome/css/font-awesome.min.css">

</head>
<body>

  <?php include_once "../modules/nav.php"; ?>

  <div class="container-fluid">
    <div class="row text-center">
      <a class="mx-auto btn btn-outline-dark" href="dataform.php">Wpisz dane</a>
    </div>

    <!-- Building plan with icon wrappers -->
    <div class="row">
      <div class="col">
        <h2 class="text-center my-5">Plan budynku</h2>
        <div class="plan">
          <div class="icon temp1 icon-temp" id="temp1"></div>
          <div class="icon temp2 icon-temp" id="temp2"></div>
          <div class="icon temp3 icon-temp" id="temp3"></div>
          <div class="icon fan1 icon-fan" id="fan1"></div>
          <div class="icon fan2 icon-fan" id="fan2"></div>
          <div class="icon en1 icon-ele" id="en1"></div>
          <div class="icon en2 icon-ele" id="en2"></div>
          <div class="icon lock1 icon-lock" id="lock1"></div>
          <div class="icon lock2 icon-lock" id="lock2"></div>
        </div>
      </div>

      <!-- chart canvas -->
      <div class="col">
        <h2 class="text-center my-5">Wykres temperatur</h2>
        <canvas id="myChart"></canvas>
      </div>
    </div>

  </div>

  <!-- Include javasript plugins -->
  <?php require_once "../modules/plugins.php"; ?>

  <!-- Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
  <script src="./js/scripts.js"></script>

</body>
</html>

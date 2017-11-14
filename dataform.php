<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>

<!-- Include metatags -->
<?php require_once "../modules/meta.php"; ?>

<link rel="stylesheet" href="css/style.min.css">

</head>
<body>

  <?php include_once "../modules/nav.php"; ?>

  <div class="contianer-fluid">
    <div class="row text-center">
      <a class="mx-auto btn btn-outline-dark" href="index.php">Zobacz wizualizację</a>
    </div>

    <div class="row">
      <div class="mt-2 text-center col-md-5 mx-auto" id="form-alert">

      </div>
    </div>

    <form class="mt-2" id="dataform" method="POST">
      <div class="row">
        <div class="col-md-4 mx-auto">
          <div class="form-group row">
            <label class="col-sm-6" for="x1">Serwerownia temp. 1: </label>
            <div class="col">
              <input class="form-control" id="x1" name="x1" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x2">Serwerownia temp. 2: </label>
            <div class="col">
              <input class="form-control" id="x2" name="x2" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x3">Serwerownia temp. 3: </label>
            <div class="col">
              <input class="form-control" id="x3" name="x3" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x4">Biura went. 1: </label>
            <div class="col">
              <input class="form-control" id="x4" name="x4" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x5">Biura went. 2: </label>
            <div class="col">
              <input class="form-control" id="x5" name="x5" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x6">Zasilanie 1: </label>
            <div class="col">
              <input class="form-control" id="x6" name="x6" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x7">Zasilanie 2: </label>
            <div class="col">
              <input class="form-control" id="x7" name="x7" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x8">Ochrona 1: </label>
            <div class="col">
              <input class="form-control" id="x8" name="x8" type="number">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-6" for="x9">Ochrona 2: </label>
            <div class="col">
              <input class="form-control" id="x9" name="x9" type="number">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <button type="submit" id="submit" class="mt-3 mx-auto btn btn-success">Zapisz</button>
      </div>

    </form>
  </div>

  <!-- Include javasript plugins -->
  <?php require_once "../modules/plugins.php"; ?>

  <script type="text/javascript" src="./js/scripts.js"></script>

</body>
</html>

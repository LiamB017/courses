<?php require_once 'config.php'; ?>
<?php 
$courses = course::findAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courses</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <main role="main">
        <div>
          <h1>Our Courses</h1>
          <div class="row">
          <?php foreach ($courses as $course) { ?>
            <div class="col mb-4">
              <div class="card" style="width:15rem;">
                <img src="<?= APP_URL ?>/assets/img/science.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-name"><?= $course->name ?></h5>
                  
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Location: <?= $course->location ?></li>
                  <li class="list-group-item">Cao Points: <?= $course->cao_points ?></li>
                  <li class="list-group-item">Years: <?= $course->years ?></li>
                </ul>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

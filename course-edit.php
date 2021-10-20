<?php require_once 'config.php';

try {
  $rules = [
    'course_id' => 'present|integer|min:1'
  ];
  $request->validate($rules);
  if (!$request->is_valid()) {
    throw new Exception("Illegal request");
  }
  $course_id = $request->input('course_id');
  /*Retrieving a customer object*/
  $course = Course::findById($course_id);
  if ($course === null) {
    throw new Exception("Illegal request parameter");
  }
} catch (Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->redirect("/courses-index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit course</title>

  <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  <link href="<?= APP_URL ?>/assets/css/style.css" rel="stylesheet">
  <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">


</head>

<body>
  <div class="container-fluid p-0">
    <?php require 'include/navbar.php'; ?>
    <main role="main">
      <div>
        <div class="row d-flex justify-content-center">
          <h1 class="t-peta engie-head pt-5 pb-5">Edit Course</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <?php require "include/flash.php"; ?>
          </div>
        </div>

        <div class="row justify-content-center pt-4">
          <div class="col-lg-10">
            <form method="post" action="<?= APP_URL ?>/course-update.php" enctype="multipart/form-data">

              <!--This is how we pass the ID-->
              <input type="hidden" name=" course_id" value="<?= $course->id ?>" />


              <div class="form-group">
                <label class="labelHidden" for="ticketPrice">Name</label>
                <input placeholder="name" name="name" type="text" id="name" class="form-control" value="<?= old('name', $course->name) ?>" />
                <span class="error"><?= error("name") ?></span>
              </div>

              <!--textarea does not have a 'value' attribute, so in this case we have to put our php for filling in the old form data INSIDE the textarea tag.-->
              <div class="form-group">
                <label class="labelHidden" for="date">Years</label>
                <textarea placeholder="Years" name="years" rows="3" id="years" class="form-control"><?= old('years', $course->years) ?></textarea>
                <span class="error"><?= error("years") ?></span>
              </div>

              <div class="form-group">
                <label class="t-deci" for="location">Location</label>
                <select class="form-control" name="location" id="location">
                  <!--Check to see if the data in our form value was this location.-->
                  <option value="TCD" <?= chosen("location", "TCD", $course->location) ? "selected" : "" ?>>TCD</option>
                  <option value="UCD" <?= chosen("location", "UCD", $course->location) ? "selected" : "" ?>>UCD</option>
                  <option value="DCU" <?= chosen("location", "DCU", $course->location) ? "selected" : "" ?>>DCU</option>
                  <option value="IADT" <?= chosen("location", "IADT", $course->location) ? "selected" : "" ?>>IADT</option>
                </select>
                <span class="error"><?= error("location") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="startDate">Start Date</label>
                <input placeholder="Start Date" type="date" name="start_date" class="dateInput form-control" id="start_date" value="<?= old("start_date", $course->start_date) ?>" />
                <span class="error"><?= error("start_date") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="endDate">Cao Points</label>
                <input placeholder="CAO points" type="text" name="cao_points" class="dateInput form-control" id="cao_points" value="<?= old("cao_points", $course->cao_points) ?>" />
                <span class="error"><?= error("end_date") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="venueDescription">Course Code</label>
                <input placeholder="Course Code" type="text" name="course_code" id="course_code" class="form-control" value="<?= old("course_code", $course->course_code) ?>" />
                <span class="error"><?= error("course_code") ?></span>
              </div>
              <div class="form-group">
                <label>Profile image:</label>
                <?php
                $image = Image::findById($course->image_id);
                if ($image != null) {
                ?>
                  <img src="<?= APP_URL . "/" . $image->filename ?>" width="150px" />
                <?php
                }
                ?>
                <input type="file" name="profile" id="profile" />
                <span class="error"><?= error("profile") ?></span>
              </div>

              <div class="form-group">
                <a class="btn btn-default" href="<?= APP_URL ?>/courses-index.php">Cancel</a>
                <button type="submit" class="btn btn-primary">Store</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <?php require 'include/footer.php'; ?>
  </div>
  <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
  <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= APP_URL ?>/assets/js/festival.js"></script>

  <script src="https://kit.fontawesome.com/fca6ae4c3f.js" crossorigin="anonymous"></script>

</body>

</html>
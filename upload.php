<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">

<head>
  <?php
  if (isset($_SESSION['email'])) {
  } else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
  }
  ?>
  <title>Upload - GlowEdu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/css/style.css">
</head>

<body>
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
              <img src="images/main.png" width="40px">
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
    $reg = @$_POST['reg'];
    $course_topic = @$_POST['course_topic'];
    $course_category = @$_POST['course_category'];
    $course_data = @$_POST['course_data'];
    $course_color = @$_POST['course_color'];
    $hints = @$_POST['hints'];
    $answer = @$_POST['answer'];
    $couse_data_final = str_replace("'", "&#x27;", $course_data);
    $final_answer = str_replace("'", "&#x27;", $answer);
    $cat_id = @$_POST['cat_id'];
    if ($reg) {
      //Creating a connection
      //Inserting a record into the employee table
      $sql = "INSERT INTO courses(`id`, `course_topic`, `course_category`, `course_data`, `course_color`, `hints`, `answer`) VALUES (NULL, '$course_topic','$course_category','$couse_data_final', '$course_color','$hints','$final_answer')";
      mysqli_query($conn, $sql);
      //Insert ID
      $id = mysqli_insert_id($conn);
      print("Insert ID: " . $id . "\n");

      $sql2 = "INSERT INTO `sub_cat_match`(`id`, `cat_id`, `course_id`) VALUES (NULL, '$cat_id','$id')";
      mysqli_query($conn, $sql2);
      echo "<meta http-equiv=\"refresh\" content=\"0; url=# \">";
    }
    ?>
    <h2 class="mb-4">Insert Courses Form</h2>
    <form method="POST" action='upload.php' class="register-form" id="register-form">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example1" class="form-control" name="course_topic" />
            <label class="form-label" for="form6Example1">Course Topic</label>
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <select class="form-control" id="exampleFormControlSelect1" name="course_category">
              <option>Python</option>
            </select>
            <label class="form-label" for="form6Example2">Course Category</label>
          </div>
        </div>
      </div>

      <div class="form-outline mb-4">
        <textarea id="form6Example7" rows="4" name="course_data" class="editor form-control"><?php echo $course_data ?></textarea>
        <label class="form-label" for="form6Example7">Course Data</label>
      </div>

      <!-- Text input -->
      <div class="form-outline mb-4">
        <div class="form-outline">
          <select class="form-control" id="exampleFormControlSelect1" name="course_color">
            <option value="">White (normal card)</option>
            <option value="#3f37c9">Blue (Blue card)</option>
            <option value="green">Green (Green card)</option>
            <option value="#f48c06">Yellow (Yellow card)</option>
          </select>
          <label class="form-label" for="form6Example2">Course Color</label>
        </div>
      </div>
      <!-- Text input -->
      <div class="form-outline mb-4">
        <div class="form-outline">
          <select class="form-control" id="exampleFormControlSelect1" name="cat_id">
            <?php
            $query = "SELECT * from category";
            $result = mysqli_query($conn, $query);

            while ($rows = mysqli_fetch_assoc($result)) {
              $id = $rows['id'];
              $cat_name = $rows['cat_name'];
              $cat_type = $rows['cat_type'];
            ?>
              <option value="<?php echo $id; ?>"><?php echo '0' . $id, ' ' . $cat_name;
                                                } ?></option>
          </select>
          <label class="form-label" for="form6Example2">Course Category</label>
        </div>
      </div>
      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" id="form6Example4" class="form-control" name="hints" />
        <label class="form-label" for="form6Example4">hints</label>
      </div>

      <!-- Message input -->
      <div class="form-outline mb-4">
        <textarea id="form6Example7" rows="4" name="answer" class="editor2 form-control"></textarea>
        <label class="form-label" for="form6Example7">Answer</label>
      </div>


      <!-- Submit button -->
      <input type="submit" name="reg" id="signup" class="form-submit" value="Submit" style="width: 100%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;">
    </form>



    <br><br>
    <?php
    $suvb = @$_POST['suvb'];
    $cat_name = @$_POST['cat_name'];
    $cat_type = @$_POST['cat_type'];
    if ($suvb) {
      $sql2 = "INSERT INTO `category`(`id`, `cat_name`, `cat_type`) VALUES (NULL, '$cat_name','$cat_type')";
      $rt2 = mysqli_query($conn, $sql2);
      if ($rt2) {
        echo "Done!";
        echo "<meta http-equiv=\"refresh\" content=\"0; url=# \">";
      } else {
        echo "<h1> ERROR!</h1> " . $sql2;
      }
    }
    ?>
    <h2 class="mb-4">Create Category</h2>
    <form method="POST" action='upload.php' class="register-form" id="register-form">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example1" class="form-control" name="cat_name" />
            <label class="form-label" for="form6Example1">Sub-Category Name</label>
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <select class="form-control" id="exampleFormControlSelect1" name="cat_type">
              <option value="python">Python</option>
            </select>
            <label class="form-label" for="form6Example2">Sub-Category Language</label>
          </div>
        </div>
      </div>
      <!-- Submit button -->
      <input type="submit" name="suvb" id="signup" class="form-submit" value="Submit" style="width: 100%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;">
    </form>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/build/ckeditor.js"></script>
    <script>
      ClassicEditor
        .create(document.querySelector('.editor'), {

          toolbar: {
            items: [
              'heading',
              '|',
              'bold',
              'italic',
              'link',
              'bulletedList',
              'numberedList',
              '|',
              'outdent',
              'indent',
              '|',
              'imageUpload',
              'blockQuote',
              'insertTable',
              'mediaEmbed',
              'undo',
              'redo'
            ]
          },
          language: 'en',
          image: {
            toolbar: [
              'imageTextAlternative',
              'imageStyle:inline',
              'imageStyle:block',
              'imageStyle:side'
            ]
          },
          table: {
            contentToolbar: [
              'tableColumn',
              'tableRow',
              'mergeTableCells'
            ]
          },
          licenseKey: '',



        })
        .then(editor => {
          window.editor = editor;




        })
        .catch(error => {
          console.error('Oops, something went wrong!');
          console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
          console.warn('Build id: fgydboej4r6a-nohdljl880ze');
          console.error(error);
        });
      ClassicEditor
        .create(document.querySelector('.editor2'), {

          toolbar: {
            items: [
              'heading',
              '|',
              'bold',
              'italic',
              'link',
              'bulletedList',
              'numberedList',
              '|',
              'outdent',
              'indent',
              '|',
              'imageUpload',
              'blockQuote',
              'insertTable',
              'mediaEmbed',
              'undo',
              'redo'
            ]
          },
          language: 'en',
          image: {
            toolbar: [
              'imageTextAlternative',
              'imageStyle:inline',
              'imageStyle:block',
              'imageStyle:side'
            ]
          },
          table: {
            contentToolbar: [
              'tableColumn',
              'tableRow',
              'mergeTableCells'
            ]
          },
          licenseKey: '',



        })
        .then(editor => {
          window.editor = editor;




        })
        .catch(error => {
          console.error('Oops, something went wrong!');
          console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
          console.warn('Build id: fgydboej4r6a-nohdljl880ze');
          console.error(error);
        });
    </script>
</body>

</html>
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
<?php
        $moduleid = $_GET['id'];
        ?>
  	<title>Update - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style/css/css/style.css">
        <?php
        $id = $_GET['id'];
        $query = "SELECT * from courses WHERE id=$id";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $course_topic = $rows['course_topic'];
        $course_category = $rows['course_category'];
        $course_data = $rows['course_data'];
        $course_color = $rows['course_color'];
        $hints = $rows['hints'];
        $answer = $rows['answer'];
        $couse_data_final = str_replace("'","&#x27;",$course_data);
        $final_answer = str_replace("'","&#x27;",$answer);
        }
    ?>
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
      <img src="images/main.png" width ="40px">
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
        <li class="nav-item">
        <div class="input-group">
  <div class="form-outline">
    <form action="search.php" method="GET">
    <input type="search" id="form1" name="find" class="form-control" placeholder="Search" /></div>
  <button type="submit" class="btn btn-primary">Search
    <i class="fa fa-search"></i>
  </button></form>
</div>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>
<?php
  $reg = @$_POST['update'];
  if ($reg) {
    $course_topic = @$_POST['course_topic'];
    $course_category = @$_POST['course_category'];
    $course_data = @$_POST['course_data'];
    $course_color = @$_POST['course_color'];
    $hints = @$_POST['hints'];
    $answer = @$_POST['answer'];
    $cat_id = @$_POST['cat_id'];
    $couse_data_final = str_replace("'","&#x27;",$course_data);
    $final_answer = str_replace("'","&#x27;",$answer);
  
    $sql = "UPDATE `courses` SET `course_topic`='$course_topic', `course_category`='$course_category', `course_data`='$couse_data_final',
    `course_color`='$course_color', `hints`='$hints', `answer`='$final_answer' , `cat_id`='$cat_id' Where id=$id";
  $rt = mysqli_query($conn, $sql);
  if($rt) {
   echo "Done!";
   echo "<meta http-equiv=\"refresh\" content=\"0; url=# \">";
  } else{
   echo "<h1> ERROR!</h1> ". $sql;
  }
}
?>
<h2 class="mb-4">Update Courses Form</h2>
<form method="POST" action='module.php?id=<?php echo $id;?>' class="register-form" id="register-form">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" name="course_topic" class="form-control" value="<?php echo $course_topic ;?>"/>
        <label class="form-label" for="form6Example1">Course Topic</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
      <select class="form-control" id="exampleFormControlSelect1" name="course_category">
      <option><?php echo $course_category; ?></option>
      <option value="python">Python</option>
      <option value="javascript">Javascript</option>
      <option value="c++">C++</option>
      <option value="c">C</option>
    </select>
        <label class="form-label" for="form6Example2">Course Category</label>
      </div>
    </div>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea id="form6Example7" rows="4" class="editor form-control" name="course_data" ><?php echo $course_data ?></textarea>
    <label class="form-label" for="form6Example7">Course Data</label>
  </div>
  
  <!-- Text input -->
  <div class="form-outline mb-4">
  <div class="form-outline">
      <select class="form-control" id="exampleFormControlSelect1" name="course_color">
      <option value="<?php echo $course_color ?>"><?php echo $course_color ?></option>
      <option value="">White (normal card)</option>
      <option value="blue">Blue (Blue card)</option>
      <option value="green">Green (Green card)</option>
      <option value="yellow">Yellow (Yellow card)</option>
    </select>
        <label class="form-label" for="form6Example2">Course Color</label>
      </div>
  </div>
  <!-- Text input -->
  <div class="form-outline mb-4">
  <div class="form-outline">
      <select class="form-control" id="exampleFormControlSelect1" name="cat_id">
      <?php
        $query3 = "SELECT cat_id from courses WHERE id=$id";
        $result3 = mysqli_query($conn, $query3);

        while($rows = mysqli_fetch_assoc($result3))
        {
        $cat_id = $rows['cat_id'];

        $query3 = "SELECT * from category where id=$cat_id";
        $result3 = mysqli_query($conn, $query3);
        while($rows = mysqli_fetch_assoc($result3))
        {
        $categoryid = $rows['id'];
        $cat_name = $rows['cat_name'];
        $cat_type = $rows['cat_type'];
    ?>
      <option value="<?php echo $categoryid;?>"><?php echo $cat_name; }}?></option>
      <?php
        $query3 = "SELECT cat_id from courses WHERE id=$id";
        $result3 = mysqli_query($conn, $query3);

        while($rows = mysqli_fetch_assoc($result3))
        {
        $cat_id = $rows['cat_id'];

        $query3 = "SELECT * from category";
        $result3 = mysqli_query($conn, $query3);
        while($rows = mysqli_fetch_assoc($result3))
        {
        $categoryid = $rows['id'];
        $cat_name = $rows['cat_name'];
        $cat_type = $rows['cat_type'];
    ?>
    <option value="<?php echo $categoryid;?>"><?php echo $cat_name; }}?></option>
    </select>
        <label class="form-label" for="form6Example2">Course Category</label>
      </div>
  </div>
  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example4" class="form-control" value="<?Php echo $hints; ?>" name="hints">
    <label class="form-label" for="form6Example4">hints</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea id="form6Example7" rows="4" class="editor2 form-control" name="answer"><?php echo $answer ?></textarea>
    <label class="form-label" for="form6Example7">Answer</label>
  </div>

  <!-- Submit button -->
  <div style="padding: 15px;">
  <input type="submit" name="update" id="signup" class="form-update" value="Update" style="float: left; width: 40%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;">
  <br><a href="delmod.php?id=<?php echo $moduleid;?>"><button style='width:40%; float: right; padding: 10px; font-weight: 600; color: #fff;' type='button' class='btn btn-danger'>Delete</button></a>
  </div>
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
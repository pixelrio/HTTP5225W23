<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include('reusables/nav.php') ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-5 mt-3 mb-5">
          Student catalog
        </h1>
      </div>
    </div>
    <?php 
      $connect = mysqli_connect('localhost', 'root', 'root', 'HTTP5225');
      $query = 'SELECT * FROM students';

      $students = mysqli_query($connect, $query);
      // echo '<pre>';
      // echo print_r($students);
      // echo '</pre>';
    ?>
    <div class="row">
      <?php
        foreach($students as $student){

          if($student['marks'] < 50){
            $bgClass = 'bg-danger';
          }else{
            $bgClass = 'bg-success';
          }

          echo '<div class="col-md-4 mt-2 mb-2">
            <div class="card ' . $bgClass . '">
              <img src="' . $student['imageURL'] . '" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">' . $student['fname'] . ' ' . $student['lname'] . '</h5>
                <p class="card-text">Marks: ' . $student['marks'] . '</p>
              </div>
              <div class="card-footer">
                <form method="GET" action="update.php">
                  <input type="hidden" name="id" value="' . $student['id'] . '">
                  <button type="submit" name="edit" class="btn btn-sm btn-info">Edit</button>
                </form>
                <form method="GET" action="includes/deleteStudent.php">
                  <input type="hidden" name="id" value="' . $student['id'] . '">
                  <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>';  
        }
      ?>
    </div>

  </div>
</body>
</html>
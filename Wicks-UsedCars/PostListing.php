<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="CSS/main.css", rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <title>Post Listing</title>
  </head>
  <body onload="greeting()">

    <div class="header">
      <?php
      include 'includes\header.php';
      ?>
    </div>


<div class="container">
  <?php
      if (isset($_GET['msg']) && $_GET['msg'] == 'thankyou') {
        if (isset($_GET['last_id']) && !empty($_GET['last_id'])) {
            include 'dbconnect.php';
            $id = $_GET['last_id'];
            $query = "SELECT * FROM listing WHERE 
                      id = '$id'";
            $result = mysqli_query($conn, $query);
            echo "Your listing has been posted.\n";

        }
      } else {

      include 'dbconnect.php';
    
    
    ?>
      <h1>Post New Listing</h1>
      <p id="demo_greeting"></p>
      <p>Be sure to include contact information as well as pictures of the vehicle you wish to sell.</p>

      <form name="NewsletterForm" action="processListing.php" method="POST">

      <div class="form-group">
        <label for="Make">Car Make</label>
        <input type="text" class="form-control" name="make" placeholder="(e.g Acura, Audi, etc)"></input>
      </div>

      <div class="form-group">
        <label for="Model">Car Model</label>
        <input type="text" class="form-control" name="model" placeholder="(e.g T, TTS, etc)"></input>
      </div>

      <div class="form-group">
        <label for="Year">Car Year</label>
        <input type="text" class="form-control" name="year" placeholder="Year of Car"></input>
      </div>

      <div class="form-group">
        <label for="Mileage">Mileage</label>
        <input type="text" class="form-control" name="mileage" placeholder="Mileage of Car"></input>
      </div>

      <div class="form-group">
        <label for="Price">Desired Price</label>
        <input type="text" class="form-control" name="price" placeholder="Price of Car"></input>
      </div>
      
     <div class="form-group">
          <label for="Email">Email</label>
        <input pattern"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" class="form-control" name="email" placeholder="Enter your email" aria-descrubedby="emailHelp"></input>
      </div>

      <div class="form-group">
        <label for="Picture">Picture of Car</label>
        <input type="text" class="form-control" name="image" placeholder=""></input>
      </div>


      <br />

      <div class="form-group">
        <input type="hidden" name="session_id" value="<?php echo $_COOKIE['PHPSESSID'] ?>">
        <button type="reset" value="Clear Form" class="btn btn-primary">Clear Form</button>
        <button type="submit" value="Submit" name="Submit" class="btn btn-primary">Submit</button>
      </div>

      </form>
    <?php
    }
    ?>
    </div><!-- ./container -->






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!--<div class="footer">
      <?php
      include 'includes\footer.php';

      ?>


    </div>
   -->




<script src="js/scripts.js"></script>

  </body>
</html>
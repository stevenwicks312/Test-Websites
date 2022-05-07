<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="CSS/main.css", rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <title>Used Cars | Review</title>
  </head>
  <body>

  <?php
     if (isset($_POST['submit'])) {
          $CarMake = stripslashes($_POST['make']); //Gets rid of quotes
          $CarModel = stripslashes($_POST['model']);
          $CarYear = stripslashes($_POST['year']);
          $CarMileage = stripslashes($_POST['mileage']);
          $DesiredPrice = stripslashes($_POST['price']); 
          $Contact = stripslashes($_POST['contact']);           


          $CarMake = str_replace("~", "-", $CarMake);
          $CarModel = str_replace("~", "-", $CarModel);
          $CarYear = stripslashes($_POST['year']);
          $CarMileage = stripslashes($_POST['mileage']);
          $DesiredPrice = stripslashes($_POST['price']);
          $Contact = stripslashes($_POST['contact']);
          $ExistingSubjects = array();
          if (file_exists("reviews.txt") && filesize("reviews.txt") > 0) {
               $ListingArray = file("reviews.txt");

               }
          if (empty($CarMake) || empty($CarModel) || empty($CarYear)) { //If a key variable is missing, give error
          echo "<div class='container'><p> Make sure all fields are filled<br />\n";
          } else {
               $ListingRecord = "$CarMake~$CarModel~$CarYear~$CarMileage~$DesiredPrice~$Contact~$Date\n";
               $ListingFile = fopen("reviews.txt", "ab");
               if ($ListingFile === FALSE)
                    echo "<div class='container'><p> Listing Already Exists<br />\n</div>";
               else {
                    fwrite($ListingFile, $ListingRecord);
                    fclose($ListingFile);
                    echo "Review Posted.\n";
                    $CarMake = "";  // Empty variables after use
                    $CarYear = "";
                    $CarModel = "";
                    $CarMileage = "";
                    $DesiredPrice = ""; 
                    $Contact = "";
                    $Date = date("Y/m/d");
               }
            }

         } else {
          $CarMake = "";
          $CarModel = "";
          $CarYear = "";
          $CarMileage = "";
          $DesiredPrice = "";
          $Contact = "";
          $Date = "";
         }
?>
    <div class="header">
      <?php
      include 'C:\xampp\htdocs\WicksProject\includes\header.php';

      ?>s
    </div>

    <div class="container">
    <h1>Post Review</h1>

    <hr />
    <hr />
     <form action="postReview.php" method="POST"> <!-- create inputs for variables -->
          <span style="font-weight:bold">Car Make:</span><br />
          <input type="text" name="make" value="<?php echo $CarMake; ?>" />
          <br />
          <span style="font-weight:bold">Car Model:</span><br />
          <input type="text" name="model" value="<?php echo $CarModel; ?>" /><br />
          <span style="font-weight:bold">Car Year:</span><br />
          <input type="text" name="year" value="<?php echo $CarYear; ?>" /><br />
          <span style="font-weight:bold">Mileage:</span><br />
          <input type="text" name="mileage" value="<?php echo $CarMileage; ?>" /><br />
          <span style="font-weight:bold">Price Paid (Optional):</span><br />
          <input type="text" name="price" value="<?php echo $DesiredPrice; ?>" /><br />   
          <span style="font-weight:bold">Comments:</span><br />       
          <textarea type="text" name="contact" value="<?php echo $Contact; ?>">
           </textarea><br />
            
          </textarea><br />
          <input type="submit" name="submit" value="Submit" />
          <input type="reset" name="reset" value="Reset Form" />
     </form>
     <hr />
     <p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="footer">
      <?php
      include 'C:\xampp\htdocs\WicksProject\includes\footer.php';

      ?>
    </div>

  </body>
</html>
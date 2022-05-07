<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="CSS/main.css", rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <title>New Listings</title>
  </head>
  <body>
    <div class="header">
      <?php
      include 'includes\header.php';

      ?>


    </div>
   

    <div class="container">
      <h1>New Listings</h1>
      <p><span id="demo_greeting"></span>Cars that have just arrived to the lot.</p>

      
      <div class="row">
        <div class="col" style="margin: auto; max-width:30%;">
        </div>
      </div>
      <br />
    <?php
    	include 'dbconnect.php';
 
         $query = "SELECT *
                   FROM listing";
         $result = mysqli_query($conn,$query);
        // Get values from the query
        while($row = mysqli_fetch_assoc($result)){
            $make = $row['Make'];
            $model = $row['Model'];
			$year = $row['Year'];
			$mileage = $row['Mileage'];
			$price = $row['Price'];
			$email = $row['Contact'];
			$image = $row['image'];
            echo "<div class='row'>";
            echo "<div class='col-sm'>";
                echo "<img src=./assets/images/New-Listings/" . $image . " width='300' height='auto' />";
            echo "</div>";
            echo "<div class='col-sm'>";
            echo "<div class='make'>";
                echo "<h3> " . $make . "</h3>";
                echo "<p class='model'> " . $model . "</p>";
                echo "<p class='year'> " . $year . "</p>";
                echo "<p class='mileage'> " . $mileage . " Miles</p>";
                echo "<p class='contact'> " . $email . "</p>";
                echo "<p class='price'> $" . $price . "</p>";
            echo "</div></div></div>";
        }
    mysqli_close($conn);
    ?>

    </div><!-- ./container -->













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
<div class="footer">
      <?php
      include 'includes/footer.php';

      ?>


    </div>
   




<script src="js/scripts.js"></script> 


  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="CSS/main.css", rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <title>Used Cars | New Listings</title>
  </head>
  <body>
    <div class="header">
      <?php
      include 'C:\xampp\htdocs\WicksProject\includes\header.php';

      ?>


    </div>
  
    <div class="container">
    <h1>Hear from our Satisfied Customers</h1>

    <div class="row">
    <p> Or post your own review!</p>
        <div class ="col-sm-1">
            <a class = "button2" href=PostReview.php>Create Post</a>
      </div>
      <?php
      if (isset($_GET['action'])) {
          if ((file_exists("reviews.txt")) && (filesize("reviews.txt") != 0)) {
               $ListingArray = file("reviews.txt");
               switch ($_GET['action']) {
                    case 'Delete First':
                         array_shift($ListingArray);
                         break;
                    case 'Delete Last':
                         array_pop($ListingArray);
                         break;
                    case 'Delete Message':
                         if (isset($_GET['message'])) {
                              $Index = $_GET['message'];
                              unset($ListingArray[$Index]);
                              $ListingArray =array_values($ListingArray);
                         }
                         break;
                    case 'Remove Duplicates':
                         $ListingArray = array_unique($ListingArray);
                         $ListingArray = array_values($ListingArray);
                         break;
                    case 'Sort Ascending':
                         sort($ListingArray);
                         break;
                    case 'Sort Descending':
                         rsort($ListingArray);
                         break;
               } // End of the switch statement
          if (count($ListingArray)>0) {
                    $NewListing = implode($ListingArray);
                    $StoreListing = fopen("reviews.txt","wb");
                    if ($StoreListing === false)
                         echo "There was an error updating the message file\n";
                    else {
                         fwrite($StoreListing, $NewListing);
                         fclose($StoreListing);
                    }
               } else
                    unlink("reviews.txt");
          }
     }
     if ((!file_exists("reviews.txt")) || (filesize("reviews.txt") == 0))
          echo "<p>There are no Reviews posted.</p>\n";
     else { 
          $ListingArray = file("reviews.txt");
          echo "<table
               style=\"background-color:white\"
               border=\"1\" width=\"100%\">\n";
          $count = count($ListingArray);
          foreach ($ListingArray as $Listing) {
               $CurrentList = explode("~", $Listing);
               $KeyListArr[] = $CurrentList;
          }
          for ($i = 0; $i < $count; ++$i) {
               echo "<tr>\n";
               echo "<td width=\"5%\"
                    style=\"text-align:center;
                    font-weight:bold\">" .
                    ($i + 1) . "</td>\n";
               echo "<td width=\"85%\"><span
                    style=\"font-weight:bold\">
                    Make:</span> " .
                    htmlentities(
                         $KeyListArr[$i][0]) .
                    "<br />";
               echo "<span style=\"font-weight:bold\">
                    Model:</span> " . htmlentities(
                         $KeyListArr[$i][1]) .
                    "<br />";
              echo "<span style=\"font-weight:bold\">
                    Year:</span> " .
                    htmlentities(
                         $KeyListArr[$i][2]) .
                    "<br />";
               echo "<span style=\"font-weight:bold\">
                    Original Mileage:</span> " . htmlentities(
                         $KeyListArr[$i][3]) .
                    "<br />";
                echo "<span style=\"font-weight:bold\">
                    Price Paid:</span> " . htmlentities(
                         $KeyListArr[$i][4]) .
                    "<br />";
                echo "<span style=\"font-weight:bold\">
                    Comments</span> " . htmlentities(
                         $KeyListArr[$i][5]) .
                    "<br />";
                echo "<span style=\"font-weight:bold\">
                    Date Posted</span> " . date("Y/m/d") .
                    "<br />";
                    "</td>\n";
               echo "<td width=\"10%\"
                    style=\"text-align:center\"><a
                    href='reviews.php?" .
                    "action=Delete%20Message&" .
                    "message=$i'>Delete This
                    Message</a></td>\n";
               echo "</tr>\n";
          }
          echo "</table>\n";
     }
  ?>
    </div><!-- ./container -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="footer">
      <?php
      include 'C:\xampp\htdocs\WicksProject\includes\footer.php';

      ?>

    </div>

  </body>
</html>
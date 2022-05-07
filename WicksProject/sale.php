<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="http://localhost/WicksProject/CSS/main.css", rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Used Cars | For Sale Page</title>
</head>
<body>

	<div class="header">
		<?php
		include 'C:\xampp\htdocs\WicksProject\includes\header.php';

		?>
	</div>
	<!-- First Listing -->


	<?php 

  $randomN = rand();
  setcookie("page", "dynamic");
  setcookie("token", $randomN,time()+3600,"/"); //temp

  if(isset($_GET['page'])){
      $page= $_GET['page'];
      $display=$page.'.php';
      include($display);
  }else{
     include("saleDynamicHome.php");
  }



 ?>
    <div class="container">
      <div class="row">
        <div class ="col-sm-1">
          	<a class = "button" href=sale.php?page=saleDynamicHome>Page 1</a>
        </div>
        <div class ="col-sm-1">
          	<a class = "button" href=sale.php?page=saleDynamic1>Page 2</a>
        </div>
        <div class ="col-sm-1">
			<a class="button" href=sale.php?page=saleDynamic2>Page 3</a>
        </div>

    </div>
</div>

	<div class="footer">
      <?php
      include 'C:\xampp\htdocs\WicksProject\includes\footer.php';

      ?>

 </body>
</html>
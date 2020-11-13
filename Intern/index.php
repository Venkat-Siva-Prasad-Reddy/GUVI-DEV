<?php include("users.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b4bccc0b37.js" crossorigin="anonymous"></script>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&family=Monoton&family=Pacifico&display=swap" rel="stylesheet">
    <!-- CUstume Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Welcome</title>
</head>

<body>
<?php include("header.php"); ?>

<div class="page-wrapper">
   
    <div class="post-slider">
        <h1 class="slider-title">Welcome</h1>
        <h3 class="slider-title">Please Update your Profile.</h3>
        

        <p>HERE --> <a href="<?php echo '/intern/details.php' ?>">Details</a></p>
        </div>
    </div>
</div>
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!--Slick Carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>
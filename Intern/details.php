<?php include("users.php")
?>
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
    
    <title>Details</title>
</head>
<body>
    <div class="auth-content">
        <form action="details.php" method="post">
            <h2 class="form-title">Update Details</h2>
            
            <?php include("formErrors.php"); ?>

            <div>
                <label>First Name</label>
                <input type="text" name="First_Name" placeholder="Enter First Name" value="<?php echo $firstname; ?>" class="text-input">
            </div>
            <div>
                <label>Last Name</label>
                <input type="text" name="Last_Name" placeholder="Enter Last Name" value="<?php echo $lastname; ?>" class="text-input">
            </div>
            <div>
                <label>DOB</label>
                <input type="date" name="DOB" value="<?php echo $DOB; ?>" class="text-input">
            </div>
            <div>
                <label>Gender</label><br>
                <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other
            <div>
                <label>Age</label>
                <input type="number" name="Age" value="<?php echo $Age; ?>" class="text-input">
            </div>
            
            <div>
                <label>Contact</label>
                <input type="tel" name="Contact" value="<?php echo $Contact; ?>" class="text-input">
            </div>
            <div>
                <button type="submit" name="details-btn" class="btn btn-prim btn-big">Update</button>
            </div>
        </form>
    </div>
    
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>
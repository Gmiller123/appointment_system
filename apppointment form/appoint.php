<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking</title>
    <link rel="stylesheet" href="appoint.css">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script defer src="script.js"></script>
</head>
<body>
    <div class="container">


    <div class="container-time">
        <h2 class="heading">Time Open</h2>
        <h3 class="heading-days">Monday-Friday</h3>

        <p>7am - 11am </p>
        <p>11am - 10pm </p>

         <h3 class="heading-days">Saturday and sunday</h3>
        <p>9am - 1am </p>
        <p>1am - 10pm </p>

        <hr>

        <h4 class="heading-phone">Call Us: (+977) 98XXXXXXX</h4>
    </div>


<div class="container-form">
        <form action="app_form_connect.php" method="post" onsubmit=" return validateForm()" name="myForm">
            <h2 class="heading">Reservation Online</h2>

                <div class="form-field" id="full_name">
                     <input type="text" placeholder="Full name" name="fullname" pattern="[a-zA-Z'-'\s]*" title="**Name should be aphabet required "/> <b><span class="formerror"></span></b>
                </div>
               

                 <div class="form-field" id="number">
                    <input type="tel" placeholder="Phone number" name="phone" required pattern="98[0-9]{8}" title="**must be 10 numeric starting with 98**" required /> <b><span class="formerror"></span> </b>
                 </div>

                <div class="form-field">       
                    <input type="date" name="date" id="demo">
                </div>

                <div class="form-field">     
                    <input type="time" name="time">
                </div>

                <button type="submit" value="submit" id="btn">Submit</button>

                </div>

                <?php
                if(isset($_SESSION['status']))
                {
                ?>
                <div id="success" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="dis"><?php echo $_SESSION['status'];?></span> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <?php
                    
                    unset($_SESSION['status']); 
                }
                ?>
        </form>
    



    </div>

    
    <form method="POST">
    <div class="btn-home">
        
    <button  class="btn-1" name="out"></span>Go Back</button>

    <?php if (isset($_POST['out'])) {
      			  session_destroy();
        		  header('location: http://localhost:8080/project/UI/main.php');
    			} ?>
    </div>
    </form>
    

              
 
    </body>
    </html>
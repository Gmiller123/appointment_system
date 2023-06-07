
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" href="sup.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
            <header> Support staff Form</header>
            <form method="POST">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" required placeholder="Username" name="staff_name">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" required placeholder="Password" name="staff_pass">
                  <span class="show">SHOW</span>
               </div>
               
               <br>

               <div class="field">
                  <input type="submit" value="LOGIN" name="loginn">
               </div>
            </form>
           
           
           
         </div>
      </div>



      <script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
          }
         });
      </script>




<?php 
 $con = mysqli_connect("localhost", "root", "", "registration_form");

      if(isset($_POST['loginn']))
      {
         $query = "SELECT * FROM `supporting_staff` WHERE `staffname` = '$_POST[staff_name]' AND `password` = '$_POST[staff_pass]'";
         $result = mysqli_query($con, $query);
         if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['StaffLoginId'] = $_POST['staff_name'];
            header("location: staff_dashboard.php");
         }
         else{
            echo "<script>alert('incorret');</script>";
         }

         }
      
         

?>
   </body>
</html>
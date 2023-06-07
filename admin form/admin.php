<?php 
   require("admin_db.php");
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Transparent Login Form HTML CSS</title>
      <link rel="stylesheet" href="admin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
            <header>Admin Form</header>


            <form method="post">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" required placeholder="Admin name" name="admin_name">
               </div>


               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" required placeholder="Password" name="admin_password">
                  <span class="show">SHOW</span>
               </div>
               
               <br>

               <div class="field">
                  <input type="submit" value="LOGIN" name="login">
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
      if(isset($_POST['login']))
      {
         $query = "SELECT * FROM `admin` WHERE `adminname` = '$_POST[admin_name]' AND `password` = '$_POST[admin_password]'";
         $result = mysqli_query($con, $query);
         if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['AdminLoginId'] = $_POST['admin_name'];
            header("location: ../admin dashboard/admin_dashboard.php");
         }
         else{
            echo "<script>alert('incorret');</script>";
         }

         }
      
         

?>
   </body>
</html>
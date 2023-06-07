<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User Login</title>
      <link rel="stylesheet" href="user.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
            <header>User Form</header>
            <form action="../user_dashboard/user_dashboard.php" method="POST">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" required placeholder="Username" name="uname">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" required placeholder="Password" name="pass">
                  <span class="show">SHOW</span>
               </div>
               
               <br>
               <?php
               if(isset($_GET['err'])){ ?>
                  <span class="" style='color:red;,margin:4px 0 8px 0;display:block;float:left;'><?php echo $_GET['err']; ?></span>
               <?php
               } ?>
               <div class="field">
                  <input type="submit" name="userlogin" value="LOGIN">
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
   </body>
</html>
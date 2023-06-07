<?php 
      if(isset($_POST['userlogin']))
      {
        $conn = mysqli_connect("localhost", "root", "", "registration_form"); 
         $query = "SELECT * FROM `user_db` WHERE `phone` = '$_POST[uname]' AND `fullname` = '$_POST[pass]'";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result)==1){
            session_start();
           $_SESSION['userlogin'] = $_POST['uname'];
            header("location: ../user_dashboard/user_dashboard.php");
         }
         else{
            echo "<script>alert('incorret');</script>";
            echo "error";
         }


         }
         

?>
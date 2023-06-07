<?php

//deny delete code
             $conn = mysqli_connect("localhost", "root", "", "registration_form");
				 $delrec = $_GET['phone'];
				 $del_query = "Delete from user_db where phone='$delrec'";
				 $del_exe = mysqli_query($conn,$del_query);

                 if($del_exe==true){
                    header("location:admin_dashboard.php");
                 }
?>
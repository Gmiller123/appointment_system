<?php
    $conn = mysqli_connect("localhost", "root", "", "registration_form");
    $review = $_POST['review'];
    $phone = $_POST['phone'];
    
    
  
    $user_query = "UPDATE user_db set review='$review' where phone='$phone'";
    $user_execute = mysqli_query($conn,$user_query).mysqli_error($conn);
    print_r($user_execute); die;
    return;

     ?>
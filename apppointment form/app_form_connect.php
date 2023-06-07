<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "registration_form");
          
        
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }  
        $fullname =  $_POST['fullname'];
        $phone = $_POST['phone'];
        $date =  $_POST['date'];
        $time = $_POST['time'];
        
       
        $sql = "INSERT INTO user_db(fullname, phone, date, time, status) VALUES ('$fullname', 
            '$phone','$date','$time',0)";
        
        if(mysqli_query($conn, $sql)){
            
           $_SESSION['status'] = "Appointment booked successfully!!";
            header('location: appoint.php');

        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>



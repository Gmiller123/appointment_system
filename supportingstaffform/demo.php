

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        button{
            border-radius: 20px;   
            background-color: white;
            cursor: pointer;
            font-size: 15px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            padding: 3px 5px;
            font-weight: bold;
            border: none;
            
        }
        button:hover{
            background-color: black;
            color: white;
            transition: 0.5s;
            
        }
    </style>


</head>
<body>

         <?php

                $phone = $_GET['phone'];
                $name = $_GET['name'];


                //Inserting values into database
                $conn = mysqli_connect("localhost", "root", "", "registration_form");
                $approve_query = "UPDATE user_db set status=1 where phone= '$phone'";
                $approve_execute = mysqli_query($conn,$approve_query).mysqli_error($conn);

                $query_user="INSERT into user_login values ('$phone','$name') ";
                $query_user_execute = mysqli_query($conn,$query_user);

                $view_data = "INSERT into view_data values('','$name','$phone','$date','$time')";
                $view_execute = mysqli_query($conn,$view_data);

        
				$delete_query = "Delete from appointment_form where phone='$phone'";
				$del_execute = mysqli_query($conn,$delete_query);
               
                header("location: ../admin dashboard/admin_dashboard.php");
         ?> 
</body>
</html>
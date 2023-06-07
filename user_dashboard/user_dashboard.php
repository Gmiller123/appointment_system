<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	<link rel="stylesheet" href="user.css">

	<title>User Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">		
			<span class="text" style="color: #ff7200; margin: 40px 0 0 50px;">User Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>

				</a>


				<form class="sidebar-btn" method="POST">
					<button class="logout-btn" name="logout">Logout</button>
				</form>
			</li>
			
			<br>		
				


				<?php if (isset($_POST['logout'])) {
      			  session_destroy();
        		  header('location: http://localhost:8080/project/UI/main.php');
    			} ?>
				
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">

					<h1>
				
					
					<?php
					
					 $conn = mysqli_connect('localhost', 'root', '', 'registration_form');
					 if ($conn) {
						$uname = $_POST['uname'];
						$pass = $_POST['pass'];
						$display_query = "SELECT * from user_db where phone='$uname' and fullname='$pass'";
						$display_execute = mysqli_query($conn,$display_query);
						if($display_execute){
							 while ($row = mysqli_fetch_assoc($display_execute)) {
								$fullname = $row['fullname'];
						
								 echo "<p> Welcome, $fullname</p>";
								

							 }
							 
						 }
					 }
					 ?>	
					</h1>
					
				</div>		
			</div>

						<div class="table-data">
				<div class="order">
					<div class="head">
						<h3 style="font-size: 30px;">Your details</h3>
					
					</div>
					<table>
						<thead>
							<tr>
								<th style="font-size: 20px;">User</th>						
								<th style="font-size: 20px;">number</th>
								<th style="font-size: 20px;">date</th>
								<th style="font-size: 20px;">time</th>
								<th style="font-size: 20px;">review</th>

                              
							</tr>
						</thead>
						<tbody>
							
								
								
	<?php
		
         $conn = mysqli_connect('localhost', 'root', '', 'registration_form');
        //  if ($conn) {
		if(isset($_POST['userlogin'])){
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
            $display_query = "SELECT * from user_db where phone='$uname' and fullname='$pass'";
            $display_execute = mysqli_query($conn,$display_query);
            if(mysqli_num_rows($display_execute)>0){
                 while ($row = mysqli_fetch_assoc($display_execute)) {
					$fullname = $row['fullname'];
					$phone = $row['phone'];
					$date = $row['date'];
					$time = $row['time'];
					$review = $row['review'];


                    echo '<tr>';
                    echo '<td>';
                    echo "<p>$fullname</p>";
                    echo '</td>';
    ?>

													
                    <?php
                    echo '<td>';
                    echo "<p>$phone</p>";
                    echo '</td>';

                    echo '<td>';
                    echo "<p>$date</p>";
                    echo '</td>';

                    echo '<td>';
                    echo "<p>$time</p>";
                    echo '</td>';

                    echo '<td class="td_review">';
                    echo "<p>$review</p>";
                    echo '</td>';
                    ?>
                                                            
                    <?php
                    echo '</td>';
                    echo '</tr>';

                 }
				 
             }
			 else{
				header("Location: ../user form/user_form.php?err='User Login Failed'");
			 }
         }
         ?>
		 
								
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="user.js"></script>
</body>
</html>
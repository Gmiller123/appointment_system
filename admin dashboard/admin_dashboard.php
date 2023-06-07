<?php
session_start();
	
if (!isset($_SESSION['AdminLoginId'])){
    header('location: ../admin form/admin.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	<link rel="stylesheet" href="dashboard.css">

	<title>AdminHub</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">		
			<span class="text" style="color: #ff7200; margin: 40px 0 0 80px;">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
				<a href="review.php?type=review&report=appointment">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Appointment Review</span>
				</a>

				<form class="sidebar-btn" method="POST">
					<button class="logout-btn" name="logout">Logout</button>
				</form>
			</li>
			
			<br>		
				


				<?php if (isset($_POST['logout'])) {
      			  session_destroy();
        		  header('location: ../UI/main.php');
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
					<h1>Dashboard</h1>

					
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Reports</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						
						<p>Total Appointment</p>
						<?php 
							$conn = mysqli_connect("localhost", "root", "", "registration_form");
							$query = "SELECT fullname from user_db ORDER BY fullname";
							$query_run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($query_run);
							echo '<h3>'.$row.'</h3>';
						?>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>25</h3>
						<p>Total Visitors</p>
					</span>
				</li>
				
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Appointment</h3>
					
					</div>


					<table>
						<thead>
							<tr>
								<th>User</th>				
								<th>Aproval</th>
								<th>Denied</th>
								<th>number</th>
								<th>date</th>
								<th>time</th>
								
							</tr>
						</thead>
						<tbody>
							
								
								
				<?php
					$conn = mysqli_connect('localhost', 'root', '', 'registration_form');
					if ($conn) {
						$dis_query ='Select fullname, phone, date, time from user_db where status=0';
						$dis_execute = mysqli_query($conn, $dis_query);
					if ($dis_execute) {
					while ($row = mysqli_fetch_assoc($dis_execute)) {
						$fname = $row['fullname'];
						$phone = $row['phone'];
						$date = $row['date'];
						$time = $row['time'];
							echo "<form method='post'>";
							echo '<tr>';
							echo '<td>';
											
							echo "<p>$fname</p>";
							echo '</td>';
				?>

				<?php
					echo '<td>';
																					
					
				    echo "<a class='accept_button' name='app' href='http://localhost:8080/project/supportingstaffform/demo.php?name=$row[fullname]&phone=$row[phone]'>Approved</a>";
			     	echo "</td>";
													
														
			        echo "<td>";
		   			echo "<a class='deny_button' href='deleteoperation.php?phone=$row[phone]'>Deny</a>";
					echo "</td>";

				?>
									
				</form>																															
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
					?>
																				
					<?php
					   echo '</td>';
					   echo '</tr>';

							}
											
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
	

	<script src="script.js"></script>
</body>
</html>
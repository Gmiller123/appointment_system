<?php
session_start();
	
if (!isset($_SESSION['StaffLoginId'])){
    header('location: ../supportingstafform/stafflogin.php');
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

	<title>Staff Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">		
			<span class="text" style="color: #ff7200; margin: 40px 0 0 50px;">Staff Dashboard</span>
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
					<h1>Dashboard</h1>
					
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						
						<p>Total User</p>
						<?php 
							$conn = mysqli_connect("localhost", "root", "", "registration_form");
							$query = "SELECT fullname from user_db where status =1 ORDER BY fullname";
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
						<h3>Total Users</h3>
					
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>						
								<th>number</th>
								<th>date</th>
								<th>time</th>
                                <th>Status</th>
                                <th>Update status</th>
							</tr>
						</thead>
						<tbody>
							
								
								
	<?php
         $conn = mysqli_connect('localhost', 'root', '', 'registration_form');
         if ($conn) {
            
	
					$display_query = "SELECT * from user_db where review = '' and status=1 ";
            		$display_execute = mysqli_query($conn,$display_query);

					if($display_execute){
						while ($row = mysqli_fetch_assoc($display_execute)) {
							   $fullname = $row['fullname'];
							   $phone = $row['phone'];
							   $date = $row['date'];
							   $time = $row['time'];
	   
						   ?>
						  
	   
						   <tr>
							   <td>
								<?php echo $fullname; ?>
							   </td>
							   
							   <td>
								  <?php  echo $phone; ?>
							   </td>
							   
							   <td>
								  <?php echo $date; ?>
							   </td>
							   
							   <td>
								   <?php echo $time; ?>
							   </td>
							   
							   <td>
								   <textarea  name="review"  class="abc"></textarea>
							   </td>
							   <td>
								   <button type="submit" data-name="<?php echo $fullname; ?>" name="update"  data-phone="<?php  echo $phone; ?>"  data-date="<?php  echo $date; ?>"  data-time="<?php  echo $time; ?>"    class="update">Update</button>
							   </td>
						   </tr>
					   <?php     
			   
							   
						   
															   
					}
				}
			   }
				
			
            
         ?>
				<!-- </form> -->
								
						</tbody>
					</table>
				</div>
				
			</div>
		</main
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="ajax.js"></script>
		<script>
			var update = document.querySelectorAll('.update');
			update.forEach(data => {
				data.addEventListener('click', (e) => {
					e.preventDefault()
					const fullname = data.getAttribute('data-name');
					const phone = data.getAttribute('data-phone');
					const date = data.getAttribute('data-date');
					const time = data.getAttribute('data-time');
					const review =$(data).closest('tr').find('.abc').val()
				
			
			$.ajax({
				url:'http://localhost:8080/project/supportingstaffform/a.php',
				type:'POST',
				data:{review, fullname, phone, date, time},
				success: function(res){

					// alert(1)
					location.href=""
				},
				error: function(err){
					console.log(err)
				}
			})
		})
	})
		</script>
</body>
</html>
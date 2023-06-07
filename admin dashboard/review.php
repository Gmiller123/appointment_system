<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .update{
        padding: 12px 100px;
        font-size: 16px;
        text-align: center;
        cursor: pointer;
        outline: none;
        border: none;
        border-radius: 5px;
        box-shadow: 0 5px #999;
        margin: 50px 0 0 650px;
}

.update:active {
    background-color: #009879;
    color: #fff;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}

h1{
    text-align: center;
}
#report{
    
    margin: 50px 0 0 480px;
}
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
</style>
<body>
<script src="printjs.js"></script>

    <h1>Review</h1>
    <?php
if(isset($_GET['type']))
{
    if($_GET['report'] == 'appointment')
    {
		$conn = mysqli_connect('localhost', 'root', '', 'registration_form');

        $sel = "SELECT * from user_db where review != '' ";
        $result = mysqli_query($conn, $sel);
        ?>
        <table class="styled-table" id="report">
            <thead>
              
                <tr>
                    <td>SN</td>
                    <td>Full Name</td>
                    <td>Phone</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Review</td>

                </tr>
            </thead>
            <tbody>
                
                <?php
                $sn=0;
                while($item = mysqli_fetch_array($result))
                {
                    $sn = $sn+1;
                    ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $item['fullname']; ?></td>
                        <td><?php echo $item['phone']; ?></td>
                        <td><?php echo $item['date']; ?></td>
                        <td><?php echo $item['time']; ?></td>
                        <td><?php echo $item['review']; ?></td>


                    </tr>
                    <?php
                }
            
            }
            else{
                echo 0;
            }
                ?>
            </tbody>
        </table>
    <button class="update" onclick="printJS({ printable: 'report', type: 'html' })">Print</button>

      <?php  
}
?>

</body>
</html>
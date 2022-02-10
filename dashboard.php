<?php
    require('db.php');
    include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
    table, th, td {
        border: 1px solid black;
        border-bottom: 1px solid #ddd;
    }
    table {
        width: 120%;
    }
    th {
        background-color: #44ab9d;
        color: white;
        font-size: 20px;
    }
    td{
        color: black;
        font-size: 20px;
    }
</style>
<meta charset="utf-8">
  <title>DiNiJo - Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/main.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
<!-- +++++++ Groene balk +++++++ -->

<div id="footerdeadzone">
        PANPAN - Dashboard of <?php echo $_SESSION['username']; ?>
</div>
  <span class=registerQ><a href="logout.php">Logout</a></span>


<!-- +++++++ Logo +++++++ -->

<a href="index.php"><img src="img/Logo.png" class="logoindex"></a><span class="logotekst">PANPAN Parcel Service</span><br />
    <h1 id="center">Dashboard<h1>

<!-- +++++++ Upper +++++++ -->


 <div style="overflow-x:auto;">
<!--    <div id="header1">  -->
    <table class="">
    <tr>
        <th>Parcel Name</th>
        <th>Parcel Describe</th>
        <th>Parcel Receiver Address</th>
        <th>Weight of Parcel</th>
        <th>Size of Parcel</th>
        <th>Cold/Hot Sensitive</th>
        <th>Parcel fragile</th>
        <th>Pick up Between</th>
        <th>Delivery Between</th>
        <th>Parcel Pickup Priority</th>
        <th>Price (in ETH)</th>
        <th>Date_Create</th>
    </tr>
    <?php
    include "db.php"; // Using database connection file here
    $records = mysqli_query($con,"select * from parcels"); // fetch data from database
    $check_fk = 'select user_id from parcels';
    while($data = mysqli_fetch_array($records) and $_SESSION['user_id'] = $check_fk)
        {
    ?>
    <tr>
        <td><?php echo $data['parcel_name']; ?></td>
        <td><?php echo $data['parcel_desc']; ?></td>
        <td><?php echo $data['parcel_receiver_address']; ?></td>
        <td><?php echo $data['parcel_weight']; ?></td>
        <td><?php echo $data['parcel_size']; ?></td>
        <td><?php echo $data['parcel_coldhot']; ?></td>
        <td><?php echo $data['parcel_fragile']; ?></td>
        <td><?php echo $data['parcel_pickup_date_start']." - ".$data['parcel_pickup_date_end']; ?></td>
        <td><?php echo $data['parcel_delivery_date_start']." - ".$data['parcel_delivery_date_end']; ?></td>
        <td><?php echo $data['parcel_prio']; ?></td>
        <td><?php echo $data['parcel_price']; ?></td>
        <td><?php echo $data['trn_date']; ?></td>
    </tr>	
    <?php
    }
    ?>
    </table>
    <?php mysqli_close($con); // Close connection ?>
</div>


</body>
</html>
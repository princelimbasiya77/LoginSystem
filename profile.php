<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<style>
body {
    background-color: rgb(86 86 86 / 42%) !important;
    font-family: Arial;
    overflow: hidden;
}

.main {
    height: 100vh;
    width: 100%;

}

.card-body {
    margin-left: 29%;
    font-size: 28px;
    padding: 0 10px;
    width: 55%;
    height: 440px;
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;

}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: 600px;
    padding: 20px 0 20px 50px;


}
img{
    border-radius: 50%;
}
td {
    padding: 10px;
}
</style>

<body>

    <?php

$con = mysqli_connect("localhost","root","","login_system");

session_start();

if(!isset($_SESSION['loginUser']))
{
    header("location:logindata.php");
}

$userId = $_SESSION['loginUser'];

$qry = "SELECT * FROM `logindata` WHERE `id`='$userId'";

$res = mysqli_query($con , $qry);

$row = mysqli_fetch_assoc($res);


?>

    <div class="sidebar" id="sidebar">
        <div class="title">
            Login System
        </div>
        <ul class="links">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="dashboard.php"><i class="fa fa-qrcode"></i>Dashboard</a></li>
            <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
            <li><a href="friend.php"><i class="fa-solid fa-user-group"></i>Profile Friends</a></li>
            <li><a href="addfriends.php"><i class="fa-regular fa-address-card"></i>Add Friend</a></li>
            <li><a href="viewfriends.php"><i class="fa-solid fa-users-viewfinder"></i>View Friend</a></li>
            <li><a href="request.php"><i class="fa-regular fa-heart"></i>Requested</a></li>
            <li><a href="visited.php"><i class="fa-regular fa-eye"></i>Profile Visited</a></li>
            <li><a href="accept.php"><i class="fa-regular fa-eye"></i>Request Accept</a></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
        </ul>
    </div>

    <div class="title">
        <div class="title-main">
            <h2>Profile</h2>
        </div>
    </div>
    <div class="main">
        <div class="card-body">
            <div class="card">
                <table>
                    <tr>
                        
                        <td><img src="profileimg/<?php echo $row['proimg'] ?>" alt="" width="150px" height="150px"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?php echo $row['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $row['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?php echo $row['password'] ?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td><?php echo $row['dob'] ?></td>
                    </tr>
                    <tr>
                        <td>Hobbies</td>
                        <td>:</td>
                        <td><?php echo $row['hobbies'] ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td><?php echo $row['gender'] ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td><?php echo $row['city'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</body>

</html>
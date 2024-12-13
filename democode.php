
<style>
.w-100 {
    width: 100%;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;

}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>


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
            <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
        </ul>
    </div>

</body>

</html>


<?php
session_start();
$connect = mysqli_connect("localhost","root","","login_system");
    $qry = "SELECT * FROM `request`";
    $userId = $_SESSION['loginUser'];
    $res = mysqli_query($connect , $qry);
   
    if(@$_GET['delete'])
    {
        $delete_id = $_GET['delete'];
        $qry = "DELETE FROM `request` WHERE `id` = $delete_id ";
        mysqli_query($connect , $qry);
        header("location:request.php");
    }
    
    $query = "SELECT * FROM `logindata`";
    
    $ress = mysqli_query($connect , $query);


?>
<div class="w-100">
    <table border="1">
        <tr>
            <td>Sender id</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Delete</td>
        </tr>
        <?php

while($row = mysqli_fetch_assoc($res))
{
    if ($userId == $row['receiver']) {
         while($rows = mysqli_fetch_assoc($ress))
        {
            if ($rows['id'] == $row['sender']) {
    ?>
    <tr>
        <td><?php echo $row['sender']; ?></td>
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['gender']; ?></td>
        <td><button><a href="request.php?delete=<?php echo $row['id'];?>">Delete</a></button></td>
    </tr>
    <?php  
    }
        } 
            }
                 } 
?>


    </table>
</div>






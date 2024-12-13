<style>
.w-100 {
    width: 100%;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;
}
    *{
    list-style: none;
    text-decoration: none;
}

table {
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    width: 100%;
    table-layout: fixed;
    margin-left: 20%;
    margin-right: 5%;
}

table caption {
    font-size: 1.5em;
    margin: .5em 0 .75em;
}

table tr {
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    padding: .35em;
}

table th,
table td {
    padding: .625em;
    text-align: center;
}

table th {
    font-size: .85em;
    letter-spacing: .1em;
    text-transform: uppercase;
}

.two {
    background: #fff !important;
    padding: 10px;
    border: 2px solid black;
    transition: background 400ms ease-out,
        color 400ms ease-out,
        border 400ms ease-out;

}

a {
    color: black;
}

.two:hover {
    background: black !important;
    color: #fff !important;
    border: none;
}

.two:hover a {
    color: #fff !important;
}

body {
    font-family: "Open Sans", sans-serif;
    line-height: 1.25;
}
img{
    border-radius: 50%;
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
            <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
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

</body>

</html>


<?php
session_start();
$connect = mysqli_connect("localhost","root","","login_system");
    $qry = "SELECT * FROM `accepted`";
    $userId = $_SESSION['loginUser'];
    $res = mysqli_query($connect , $qry);


?>
<div class="w-100">
    <table border="1">
        <tr>
            <!-- <th>id</th>
            <th>Requester id</th> -->
            <th>Profile Photo</th>
            <th>Name</th>
            <th>Gender</th>
            <th>City</th>
        </tr>
        <?php

    while($row = mysqli_fetch_assoc($res))
    {
        $accept = $row['accepted_id'];
        $query = "SELECT * FROM `logindata` WHERE `id`='$accept'";
        // echo $accept ;
        $ress = mysqli_query($connect,$query);
        $rows = mysqli_fetch_assoc($ress);
        if ($userId == $row['accepter_id']) {
           
        ?>
        <tr>
        <!-- <td><?php echo $userId ?></td> -->
        <!-- <td><?php echo $row['accepted_id'] ?></td> -->
        <td><img src="profileimg/<?php echo $rows['proimg'] ?>" alt="" width="50px" height="50px"></td>
        <td><?php echo $rows['name'] ?></td>
        <?php 
            if ($rows['gender'] == 'Male') {
        ?>
                      <td><img src="genderimg/male.png" alt="" width="50px" height="50px"></td>
            <?php  } else {  ?>
                <td><img src="genderimg/female.jpeg" alt="" width="50px" height="50px"></td>
            <?php }

            ?>
        <td><?php echo $rows['city'] ?></td>
        </tr>
        <?php   
                }
                     } 
?>

    </table>
</div>
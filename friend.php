<style>
.w-100 {
    width: 100%;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;

}

* {
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
    width: 100px;
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
    border: #fff;
}

.two:hover a {

    color: #fff !important;

}

body {
    font-family: "Open Sans", sans-serif;
    line-height: 1.25;
}

.img {
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
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="dashboard.php"><i class="fa fa-qrcode"></i>Dashboard</a></li>
            <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
            <li><a href="friend.php"><i class="fa-solid fa-user-group"></i>Profile Friends</a></li>
            <li><a href="addfriends.php"><i class="fa-regular fa-address-card"></i>Add Friend</a></li>
            <li><a href="viewfriends.php"><i class="fa-solid fa-users-viewfinder"></i>View Friend</a></li>
            <li><a href="request.php"><i class="fa-regular fa-heart"></i>Requested</a></li>
            <li><a href="visited.php"><i class="fa-regular fa-eye"></i>Profile Visited</a></li>
            <li><a href="accept.php"><i class="fa-regular fa-eye"></i>Request Accepted</a></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
        </ul>
    </div>



</body>

</html>


<?php
session_start();

$userId = $_SESSION['loginUser'];

$connect = mysqli_connect("localhost","root","","login_system");

    $qry = "SELECT * FROM `logindata`";

    $res = mysqli_query($connect , $qry);
    if(@$_GET['request'])
    {
        $receiver = $_GET['request'];
        $query = "UPDATE `logindata` SET `status`='1' WHERE `id`= $receiver";
        mysqli_query($connect , $query);
        $qry = "INSERT INTO `request` (`sender`,`receiver`) VALUES ('$userId','$receiver')";
        mysqli_query($connect , $qry);
        header("location:friend.php");
    }
    if(@$_GET['visited'])
    {
        
        $receiver_id = $_GET['visited'];
        $query = "UPDATE `logindata` SET `viewstatus`='1' WHERE `id`= $receiver_id";
        mysqli_query($connect , $query);
        $qry = "INSERT INTO `visited` (`visited_id`,`receiver_id`) VALUES ('$userId','$receiver_id')";
        mysqli_query($connect , $qry);
        $_SESSION['visitUser'] = $receiver_id;
        header("location:profilevisit.php");
    }
   
    
?>
<div class="w-100">
    <table>

        <tr>
            <th scope="col">Profile Photo</th>
            <th scope="col">Username</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Hobbies</th>
            <th scope="col">City</th>
            <th scope="col">Request</th>
            <th scope="col">View Profile</th>
        </tr>


        <?php

    while($row = mysqli_fetch_assoc($res))
    {
        if ($userId != $row['id']) {
        ?>
        <!--  -->
        <tr>
            <td><img class="img" src="profileimg/<?php echo $row['proimg'] ?>" alt="" width="50px" height="50px"></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <?php 
            if ($row['gender'] == 'Male') {
        ?>
                      <td><img src="genderimg/male.png" alt="" width="50px" height="50px"></td>
            <?php  } else {  ?>
                <td><img src="genderimg/female.jpeg" alt="" width="50px" height="50px"></td>
            <?php }

            ?>
            <td><?php echo $row['hobbies']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <?php  
    if ($row['status'] == 0) {
        ?>
            <td><button class="two"><a href="friend.php?request=<?php echo $row['id'];?>">Request</a></button></td>
            <?php
    }
    else
    {
        ?>
            <td><button class="two"><a href="friend.php?request=<?php echo $row['id'];?>">Requested</a></button></td>
            <?php
    }
      
    if ($row['viewstatus'] == 0) {
        ?>
            <td><button class="two"><a href="friend.php?visited=<?php echo $row['id'];?>">View Profile</a></button></td>
            <?php
    }
    else
    {
        ?>
            <td><button class="two"><a href="friend.php?visited=<?php echo $row['id'];?>">Viewed</a></button></td>
            <?php
    }
    ?>
        </tr>
        <?php    } 
 }
?>

    </table>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
body {
    background-color: #e8f5ff;
    font-family: Arial;
    overflow: hidden;
}

.main {
    font-size: 28px;
    padding: 0 10px;
    width: 100%;
    height: 500px;
    display: flex;
    justify-content: center;
    align-content: center;
}

.main {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    padding: 20px 0 20px 50px;

}

.main .card table {
    border: none;
    font-size: 20px;
    height: 350px;
    width: 550px;
}

.back {
    text-decoration: none;
    color: black;
    display: flex;
    width: 500px;
    justify-content: end;
}
img{
    border-radius: 50%;
    margin-left:  50px;
    margin-bottom:  10px;
}
</style>

<?php

$connect = mysqli_connect("localhost","root","","login_system");
session_start();


$visitId = $_SESSION['visitUser'];

$query = "SELECT * FROM `logindata` WHERE `id`='$visitId'";

$res = mysqli_query($connect , $query);
$row = mysqli_fetch_assoc($res)

?>
<div class="main">
    <div class="card" style="margin-top: 50px;">
        <div class="card-body">
            <table>
                <tbody>

                    <a href="friend.php" class="back"><i class="fa-solid fa-arrow-left-long"></i></a>
                    <tr>
                        <td><img src="profileimg/<?php echo $row['proimg'] ?>" alt="" width="110px" height="110px"></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td><?php echo $row['name'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td><?php echo $row['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>:</td>
                        <td><?php echo $row['dob'] ?></td>
                    </tr>
                    <tr>
                        <th>Hobbies</th>
                        <td>:</td>
                        <td><?php echo $row['hobbies'] ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>:</td>
                        <td><?php echo $row['gender'] ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>:</td>
                        <td><?php echo $row['city'] ?></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

</div>
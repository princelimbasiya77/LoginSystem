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
            <li><a href="visited.php"><i class="fa-regular fa-eye"></i>Profile Visited</a></li>
            <li><a href="accept.php"><i class="fa-regular fa-eye"></i>Request Accepted</a></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
        </ul>
    </div>

</body>

</html>



<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
}
.w-100{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgb(86 86 86 / 42%);
}
form{
    padding: 20px;
    border-radius: 20px;
    background-color: #3e3e3e;
    color: rgb(255, 255, 255);
    box-shadow: 0 0 6px 2px rgb(130, 130, 130);
}
h3{
    padding: 15px 0 15px;
}
tr{
    padding: 15px 0;
    display: table;
    color: white !important;
}
.name{
    outline: none;
    border: 0;
    height: 20px;
    width: 250px;
    padding: 5px;
}
input{
    margin: 0 0 0 10px;
    border-radius: 3px;
    
}
.add{
    width: 100%;
    display: flex;
    justify-content: center;
}
.city{
    margin: 0 10px;
}
.add button{
    padding: 8px;
    transition: 0.5s;
    border: 2px solid rgba(0, 0, 0, 0.71);
    border-radius: 5px;
    color: rgba(0, 0, 0, 0.71);
    font-weight: bold;
}
.add button:hover{
    background-color: black;
    color: white;
}
</style>
<?php
    $connect = mysqli_connect("localhost","root","","login_system");
    session_start();
    $userId = $_SESSION['loginUser'];
    $years = date('Y');
    if(isset($_POST['handleSubmit']))
    {
        $name = $_POST['name'];
        $img = $_FILES['filename']['name'];
        @$gender = $_POST['gender'];
        @$hobbies = $_POST['hobbies'];
        $city = $_POST['city'];



if ($name == '') {
  echo "Enter the Name";
}
else if(!preg_match("/^[a-zA-Z]*$/",$name))
{
    echo "Invalid Name";
}
else if($gender == '') {
    echo "select gender";
}
else if($hobbies == '') {
    echo "select hobbies";
}
else if($city == '') {
    echo "select city";
}
else
{
    move_uploaded_file($_FILES['filename']['tmp_name'],"img/".$img);
    $qry = "INSERT INTO `friends` (`userid`,`name`,`proimg`,`gender`,`hobbies`,`city`) VALUES ('$userId','$name','$img','$gender','$hobbies','$city')";
    mysqli_query($connect , $qry);
}
}

?>
<div class="w-100">
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <h3>Add Friends</h3>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="" value=""  class="name"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="Male" <?php if(@$gender == 'Male') { echo "checked"; } ?>>
                        Male
                        <input type="radio" name="gender" value="Female"
                            <?php if(@$gender == 'Female') { echo "checked"; } ?>>
                        Female
                    </td>
                </tr>
                <tr>
                    <td>Hobbies</td>
                    <td>
                        <input type="checkbox" name="hobbies" value="Reading"
                            <?php if(@$hobbies == 'Reading') { echo "checked"; } ?>> Reading
                        <input type="checkbox" name="hobbies" value="Traveling"
                            <?php if(@$hobbies == 'Traveling') { echo "checked"; } ?>> Traveling
                        <input type="checkbox" name="hobbies" value="Gaming"
                            <?php if(@$hobbies == 'Gaming') { echo "checked"; } ?>>
                        Gaming
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <select name="city" class="city">
                            <option value="surat" <?php if(@$city == 'surat') { echo "selected"; } ?>>Surat</option>
                            <option value="rajkot" <?php if(@$city == 'rajkot') { echo "selected"; } ?>>Rajkot</option>
                            <option value="mumbai" <?php if(@$city == 'mumbai') { echo "selected"; } ?>>Mumbai</option>
                            <option value="delhi" <?php if(@$city == 'delhi') { echo "selected"; } ?>>Delhi</option>
                        </select>
                    </td>
    
                </tr>
                <tr>
                    <td>Profile Photo</td>
                    <td><input type="file" id="myFile" name="filename"></td>
                </tr>
                <tr class="add">
                    <td><button name="handleSubmit" class="sign">Add Friend</button></td>
                </tr>
            </table>
        </form>
    </div>



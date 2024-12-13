<?php
    $connect = mysqli_connect("localhost","root","","login_system");
    if(@$_GET['edit'])
    {
        $edit_id = $_GET['edit'];
        $qry = "SELECT * FROM `logindata` WHERE `id`='$edit_id'";
        $res = mysqli_query($connect , $qry);
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $hobbies = $row['hobbies'];
        $city = $row['city'];
    }


    if(isset($_POST['Submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];x
        @$gender = $_POST['gender'];
        @$hobbies = $_POST['hobbies'];
        $city = $_POST['city'];

if ($name == '') {
  echo "Enter the Name";
}
else if(!preg_match("/^[a-zA-Z]*$/",$name))
{
    echo "Invalid name";
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

    if(@$_GET['edit'])
    {
        $qry = "UPDATE `logindata` SET `name`='$name',`email`='$email', `gender`='$gender', `hobbies`='$hobbies', `city`='$city' WHERE `id`='$edit_id'";
    }
    else
    {

        $qry = "INSERT INTO `logindata` (`name`,`email`,`gender`,`hobbies`,`city`) VALUES ('$name','$email','$gender','$hobbies','$city')";
    }
    mysqli_query($connect , $qry);
}
}

?>
<form action="" method="POST">
    <table border="1">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" id="" value="<?php echo @$name; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="Email" name="email" id="" value="<?php echo @$email; ?>"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
            <input type="radio" name="gender" value="Male" <?php if(@$gender == 'Male') { echo "checked"; } ?>> Male
            <input type="radio" name="gender" value="Female" <?php if(@$gender == 'Female') { echo "checked"; } ?>>
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
            <input type="checkbox" name="hobbies" value="Gaming" <?php if(@$hobbies == 'Gaming') { echo "checked"; } ?>>
            Gaming
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
            <select name="city">
                <option value="surat"<?php if($city == 'surat') { echo "selected"; } ?>>Surat</option>
                <option value="rajkot"<?php if($city == 'rajkot') { echo "selected"; } ?>>Rajkot</option>
                <option value="mumbai"<?php if($city == 'mumbai') { echo "selected"; } ?>>Mumbai</option>
                <option value="delhi"<?php if($city == 'delhi') { echo "selected"; } ?>>Delhi</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Submit</td>
            <td><input type="submit" name="Submit" id=""></td>
        </tr>
    </table>
    <button><a href="friend.php">Back</a></button>
</form>
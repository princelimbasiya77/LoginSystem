<style>
    body {
    background-color: rgb(240, 240, 240);
}
.w-100 {
    width: 100%;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;

}
    form{
    height: 450px;
    width: 400px;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    box-shadow: 0px 0px 5px 2px rgb(173 170 170);
    border-radius: 5px;
    margin-right: 10px;
}
table{
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    
}
tr{
    width: 400px;
    height: 40px;
    margin: 10px !important;
   
}
.sign {
    margin-top: 20px;
    height: 40px;
    width: 90px;
    border: 0;
    border-radius: 5px;
    color: white;
    background-color: rgb(223, 58, 58);
    /* background-color: rgb(66, 185, 51); */
    box-shadow: 0px 0px 3px 1px rgb(166, 166, 166);
}
.login {
    margin-top: 20px;
    height: 40px;
    width: 90px;
    border: 0;
    border-radius: 5px;
    color: white;
    background-color: rgb(70, 192, 54);
    /* background-color: rgb(66, 185, 51); */
    box-shadow: 0px 0px 3px 1px rgb(166, 166, 166);
}
a {
    text-decoration: none;
    color: white;
}
</style>

<?php
    $connect = mysqli_connect("localhost","root","","login_system");
    if(@$_GET['edit'])
    {
        $edit_id = $_GET['edit'];
        $qry = "SELECT * FROM `friends` WHERE `id`='$edit_id'";
        $res = mysqli_query($connect , $qry);
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $proimg = $row['proimg'];
        $gender = $row['gender'];
        $hobbies = $row['hobbies'];
        $city = $row['city'];
    }


    if(isset($_POST['Submit']))
    {
        $name = $_POST['name'];
        $proimg = $_POST['filename'];
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
        $qry = "UPDATE `friends` SET `name`='$name',`proimg`='$proimg', `gender`='$gender', `hobbies`='$hobbies', `city`='$city' WHERE `id`='$edit_id'";
    }
    else
    {

        $qry = "INSERT INTO `friends` (`name`,`proimg`,`gender`,`hobbies`,`city`) VALUES ('$name','$proimg','$gender','$hobbies','$city')";
    }
    mysqli_query($connect , $qry);
}
}

?>
<div class="w-100">
<form action="" method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" id="" value="<?php echo @$name; ?>"></td>
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
        <tr>
                <td>Profile Photo</td>
                <td><input type="file" name="filename" value="<?php echo $proimg ?>"></td>
        </tr>
        <tr>
            <td>Submit</td>
        
            <td><button name="Submit" type="submit" class="sign">UPDATE</button></td>
        </tr>
    </table>
    <button class="sign" ><a href="viewfriends.php" >Back</a></button>
</form>
</div>
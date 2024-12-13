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

form {
    height: 500px;
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

table {
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}

tr {
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
    box-shadow: 0px 0px 3px 1px rgb(166, 166, 166);
}

a {
    text-decoration: none;
    color: white;
}
</style>
<?php
    $connect = mysqli_connect("localhost","root","","login_system");

    $years = date('Y');
    if(isset($_POST['handleSubmit']))
    {
        $img = $_FILES['image']['name'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        @$gender = $_POST['gender'];
        @$hobbies = $_POST['hobbies'];
        $city = $_POST['city'];
        $date = $_POST['dd'];
        $month = $_POST['mm'];
        $year = $_POST['yy'];
        $join_date = implode("-",array($year , $month , $date));
        $emails = $email;
        $emails = filter_var($emails, FILTER_SANITIZE_EMAIL);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

if ($name == '') {
  echo "Enter the Name";
}
else if(!preg_match("/^[a-zA-Z]*$/",$name))
{
    echo "Invalid Name";
}

else if($email == '') {
    echo "Enter Email";
}
else if(!filter_var($emails, FILTER_VALIDATE_EMAIL)) {
    echo "<br> not a valid Email address";
}
else if($password == '') {
    echo "Enter Password";
}
else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6 ||strlen($password) > 12) {
    echo 'Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.';
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
else if ($year == '' || $month == '' || $date == '') {
    echo "select date";
}
else
{
    move_uploaded_file($_FILES['image']['tmp_name'],"profileimg/".$img);
    $qry = "INSERT INTO `logindata` (`proimg`,`name`,`email`,`password`,`dob`,`gender`,`hobbies`,`city`) VALUES ('$img','$name','$email','$password','$join_date','$gender','$hobbies','$city')";
    mysqli_query($connect , $qry);
}
}

?>
<div class="w-100">
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <h3>Sign Up</h3>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" value="<?php echo @$name; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" value="<?php echo @$email; ?>">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" value="<?php echo @$password; ?>">
                </td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>
                    <select name="dd" id="">
                        <option value="">DD</option>
                        <?php
                for ($i=1; $i <=31 ; $i++) { 
                    ?>
                        <option value="<?php echo $i; ?>" <?php if(@$date == $i) { echo "selected"; } ?>>
                            <?php echo $i; ?></option>
                        <?php }

                    ?>
                    </select>
                    <select name="mm" id="">
                        <option value="">MM</option>
                        <?php
                for ($i=1; $i <=12 ; $i++) { 
                    ?>
                        <option value="<?php echo $i; ?>" <?php if(@$month == $i) { echo "selected"; } ?>>
                            <?php echo $i; ?></option>
                        <?php }

                    ?>
                    </select>
                    <select name="yy" id="">
                        <option value="">YY</option>
                        <?php
                for ($i=1950; $i <=$years ; $i++) { 
                    ?>
                        <option value="<?php echo $i; ?>" <?php if(@$year == $i) { echo "selected"; } ?>>
                            <?php echo $i; ?></option>
                        <?php }

                    ?>
                    </select>
                </td>

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
                    <select name="city">
                        <option value="surat" <?php if(@$city == 'surat') { echo "selected"; } ?>>Surat</option>
                        <option value="rajkot" <?php if(@$city == 'rajkot') { echo "selected"; } ?>>Rajkot</option>
                        <option value="mumbai" <?php if(@$city == 'mumbai') { echo "selected"; } ?>>Mumbai</option>
                        <option value="delhi" <?php if(@$city == 'delhi') { echo "selected"; } ?>>Delhi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Profile Photo</td>
                <td><input type="file" id="myFile" name="image"></td>
            </tr>
            <tr>
                <td><button name="handleSubmit" class="sign">SIGN UP</button></td>
                <td><button class="login"><a href="logindata.php">LOGIN</a></button></td>
            </tr>
        </table>
    </form>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
body {
    background-color: rgb(240, 240, 240);
}

a {
    text-decoration: none;
    color: white;
}

.w-100 {
    width: 100%;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;

}

p {
    margin: 0;
    padding: 0;
}

form {
    height: 350px;
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

input {
    width: 330px;
    height: 40px;
    border-radius: 5px;
    border: 0;
    box-shadow: 0px 0px 3px 1px rgb(166, 166, 166);
    padding-left: 10px;
    margin:10px;

}

.login {
  
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

#password {
    margin-top: 20px;
}
a {
    color: black;
}

.login {
    margin-top: 20px;
    height: 40px;
    width: 90px;
    border-radius: 5px;
    background-color: rgb(70, 192, 54);
    box-shadow: 0px 0px 3px 1px rgb(166, 166, 166);
    margin: 10px;
    background: #fff !important;
    padding: 10px;
    border: 2px solid green;
    transition: background 400ms ease-out,
        color 400ms ease-out,
        border 400ms ease-out;

}

.login:hover {
    background: green !important;
    color: #fff !important;
    border: none;
}

.login:hover a {

    color: #fff !important;

}
.sign {
    margin-top: 20px;
    height: 40px;
    width: 90px;
    border-radius: 5px;
    background-color: rgb(70, 192, 54);
    box-shadow: 0px 0px 3px 1px rgb(166, 166, 166);
    margin: 10px;
    background: #fff !important;
    padding: 10px;
    border: 2px solid red;
    transition: background 400ms ease-out,
        color 400ms ease-out,
        border 400ms ease-out;

}

.sign:hover {
    background: red !important;
    color: #fff !important;
    border: none;
}

.sign:hover a {

    color: #fff !important;

}
.data{
    font-weight: bold !important;
}
</style>

<body>
    <div class="w-100">
        <form action="" method="POST">
            <h3>Log in to Dashboard</h3>
            <input type="email" placeholder="Email address" id="email" name="email" value="<?php echo @$email; ?>">
            <input type="password" placeholder="Password" id="password" name="password" value="<?php echo @$password; ?>">
            <div class="data">
                <button type="submit" name="submit" class="login">LOG IN</button>
                <button class="sign"><a href="signupdata.php">SIGN UP</a></button>
            </div>
    </div>


    <?php

$con = mysqli_connect("localhost","root","","login_system");

session_start();


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `logindata` WHERE `email`='$email' AND `password`='$password'";

    $res = mysqli_query($con , $qry);

    $row = mysqli_fetch_assoc($res);

    $cnt = mysqli_num_rows($res);
    

    if($cnt == 1)
    {
        $_SESSION['loginUser'] = $row['id'];
        header("location:profile.php");
    }
    else
    {
        echo "Invalid data..";
    }
}


?>


</body>

</html>
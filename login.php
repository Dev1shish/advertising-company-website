<?php
include('connection.php');
session_start();

// if(isset($_POST))
// {
//     $username = $_POST['uname'];
//     $password = $_POST['psw'];
// }
if(isset($_POST['login_clk'])){
    $username= $_POST['uname'];
    $password= $_POST['psw'];
    $sql="SELECT `username` FROM `user_login` WHERE `username`='$username'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_num_rows($result);
    if($row>0){
        // echo 'username working fine';
        $sql="SELECT 'password' FROM user_login WHERE 'password'=$password";
        if(mysqli_query($con,$sql))
        {
            // echo 'password working fine';

            $_SESSION['username']=$username;
            header('location: index.php');
            // header('location: index.php');
        }
        else{
            echo 'wrong password';
        }    
    }
    else{
        echo 'username error';
    }
}


?>
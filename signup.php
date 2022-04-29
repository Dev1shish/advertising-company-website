<?php
session_start();
include('connection.php');
if(isset($_SESSION['username']))
{
    echo 'error';
}
else{
    if(isset($_POST['signup_click']))
    {
        $owner = $_POST['ownername'];
        $companyname = $_POST['companyname'];
        $street = $_POST['street'];
        $Area = $_POST['Area'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $sql = "SELECT * From `user_login` WHERE `username`='$username'";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);
        if($rows>0){
            echo '<script>window.alert("Username Aleready Taken please enter a new username");
                        window.location.href="http://localhost/Campaigns/index.html"</script>';
            // header('location: index.html');
        } 
        else{
            $sql = "INSERT INTO `user_login` (`ID`, `owner-name`, `company-name`, `street`, `area`, `city`, `state`, `zipcode`, `username`, `password`) VALUES ('', '$owner', '$companyname', '$street', '$Area', '$city', '$state', '$zip', '$username', '$password');";
            if(mysqli_query($con,$sql)){
                $_SESSION['username'] = $username;
                header('Location: companylistings.php');

            // echo "records added successfully";
            }
            else{
                echo 'error';
            }
        }
        // $sql = "INSERT INTO user_login (id, ownername, 'company-name', street, area, city, state_1, zip, username, 'password') VALUES ('', '$owner', '$companyname', '$street', '$Area', '$city', '$state', '$zip', '$username', '$password');";
        
        
    }
    else{
        echo 'error';
    }

}

?>
<!-- /*INSERT INTO `user_login` (`ID`, `owner-name`, `company-name`, `street`, `area`, `city`, `state`, `zipcode`, `username`, `password`) VALUES ('1', 'devashish chafale', 'needsource', 'sec-15', 'CBD Belapur', 'Navi Mumbai', 'Maharashtra', '400614', 'Dev_shish', 'Devashish@16112002');*/ -->
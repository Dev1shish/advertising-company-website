<?php include('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.0.0/d3.min.js"></script>
        <script src="Scripts.js"></script>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <title>| Campaigns.com |</title>
</head>
<body style="background-color:#FF6A3D">
<?php
session_start();
$title=$Adtype=$cost=$desc=$pimg=$loc="NULL";
if(isset($_POST['submit']))
{
    if(isset($_POST['title']))
    {
        $title=$_POST['title'];
    }
    if(isset($_POST['type-of-adspace']))
    {
        $Adtype=$_POST['type-of-adspace'];
    }
    if(isset($_POST['cost']))
    {
        $cost=$_POST['cost'];
    }
    if(isset($_POST['description']))
    {
        $desc=$_POST['description'];
    }
    if(isset($_POST['profileimage']))
    {
        $pimg=$_POST['profileimage'];
    }
    if(isset($_POST['location']))
    {
        $loc=$_POST['location'];
    }
    if(isset($_FILES) && !empty($_FILES))
    {
        $filename = $_FILES["profileimage"]["type-of-adspace"];
        $to_upload_path = "uploads/".$filename; 
        // uploads folder must be inside your project root directory
        //move_uploaded_file($_FILES["profileimage"]["tmp_name"], $to_upload_path);
        // $sql = "INSERT INTO `companylistings` (`sr no.`, `title`,`adtype`, `cost`,`description`, `image`, `location`) VALUES ('', $title,$Adtype, $cost, $desc, $to_upload_path,$loc)";
        
    }
    $sql = "INSERT INTO `companylistings` (`sr no.`, `title`, `adtype`, `cost`, `description`, `image`, `location`) VALUES ('', '.$title.', '.$Adtype.', '.$cost.', '.$desc.', '.$pimg.', '.$loc.')";
    //INSERT INTO `companylistings` (`sr no.`, `title`, `adtype`, `cost`, `description`, `image`, `location`) VALUES ('', '.$title.', '.$Adtype.', '.$cost.', '.$desc.', '.$to_upload_path.', '.$loc.')
        if(mysqli_query($con,$sql))
        {
            header('location: index.php');
        }
        else{
            echo '<script>window.alert("error");</script>';
        }
}

include("header1.php");
?>
<div class="main-body">
    <h1 style="margin-top:10%;margin-left: 10%;color: #fff;">List Product</h1>
    <form action="index.php" method="post" style="margin-left:10%;margin-top: 5%;margin-bottom: 10%;align-content: Left;">
        <input type="file" name="profileimage" onchange="displayimage(this)" name="profileimage" id="profileimage" style="display: none;">
        <div class="col-sm-6" style="text-align: center;align-items: center;">
                <img src="images/placeholder.png" onclick="trigger_click()" alt="companylogo" id="companylogo">
                <label for="Companylogo" style="text-align: center;margin-left: 40%;margin-right: 40%;">Upload Image</label>
            </div>
        <label for="Title" style="margin 20 0 8px; float: left;">Title</label>
        <input type="text" name="title" placeholder="Title">
        <label for="product_details" style="margin 20 0 8px; float: left;">Type of Ad-Space</label>
        <input type="text" name="type-of-adspace" placeholder="Type of Ad-Space">
        <label for="product_details" >Per day cost</label>
        <input type="text" placeholder="Per day cost" name="cost">
        <label for="product_details">Description of space</label>
        <input type="text" placeholder="Description" name="description">
        <label for="location" style="margin 20 0 8px; float: left;">Location of billboard</label>
        <input type="text" name="location" placeholder="location">
        <button type="submit">Submit</button>
        
    </form>
</div>
<?php
include("footer.php");

?>
    
</body>
</html>

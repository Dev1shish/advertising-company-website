<?php 
ob_start();
session_start();
include('connection.php');?>
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
<script>
    function signup_form(){
        
  var x = document.getElementById("signup_form");
        var y = document.getElementById("holder-list");
        var z = document.getElementById("login_form");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
    function login_form(){
        // if(document.getElementById('signup_form').classList.contains('show'))
        // {
        //     document.getElementById('signup_form').classList.remove('show');
        //     document.getElementById('signup_form').classList.add('hide');
        //     document.getElementById('signup_btn').classList.remove('active');
        //     document.getElementById('image').classList.remove('show');
        //     document.getElementById('image').classList.add('hide');
        // }
        // document.getElementById('home').classList.remove('active');
        // document.getElementById('login_btn').classList.add('active');
        // document.getElementById('login_form').classList.remove('hide');
        // document.getElementById('login_form').classList.add('show');
        // document.getElementById('image').classList.remove('show');
        // document.getElementById('image').classList.add('hide');
        // var b=document.getElementById('holder-list');
        //     b.classList.add('hide');
        //     b.classList.remove('show');
        var x = document.getElementById("login_form");
        var y = document.getElementById("holder-list");
        var z = document.getElementById("signup_form");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
        
    }
    function home(){
        var x = document.getElementById("holder-list");
        var y = document.getElementById("login_form");
        var z = document.getElementById("signup_form");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } 
    }
    
</script>
</head>
<body class="d-flex flex-column min-vh-100 example">
    <?php 
    // $username = $_SESSION['username'];

    
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        include('header1.php');
        $_SESSION['username']=$username;
    }
    else{
        //echo '<script>window.alert("error")</script>';
        include('header.php');
        $username= "NULL";
        $_SESSION['username']=$username;
    }
    $sql = "SELECT * FROM `companylistings`;";
    $result = mysqli_query($con, $sql);
    ?>
     <div class="main-body" id="main-body">
          <div class="holder-list" id="holder-list">
             
            
          <div class="row listed-services" name="row" id="listed-services">
              <div class="col-lg-2 sec-left">
                  <div class="card">
                      
                  </div>
              </div>
              <div class="col-lg-8 sec-mid">
              <?php
               while($row=mysqli_fetch_array($result))
               {
                //    $output="NULL";
                $output='<div class="row" style="display:inline-flexbox;background-color: #ffffff;min-height: 300px;">
                <div class="col-lg-2" style="flex:1;background-color: #ffffff;"><div class="product_image"><img src="product/bandra_1.png" alt=""></div></div>
                <div class="col-lg-7" style="flex:1;background-color: #ffffff;">
                    <div class="product_details"><h4>'.$row['title'].'</h4><div class="product_cost"><p>&#8377 '.$row['cost'].'/</p><span>day</span></div>
                
                  <div class="billboard-info" style="background-color: #ffffff;">
                      <a style="text-decoration: none;background-color: #ffffff;"><b style="background-color: #ffffff;">Description</b></a>
                      <p style="background-color: #ffffff;">'.$row['description'].'</p>
                  </div>
        </div>
    </div>
                <div class="col-lg-3 place" style="flex: 1;">
                    <!-- <div class="details_company">
                        <p class="company-name"><span class="company_name">company name</span></p>
                        <p class="location"><span class="location_company">'.$row['location'].'</span></p>
                        <p class="supplier"><span class="supplier_type">supplier type</span><span class="verify_type">verification type</span></p>
                        <p class="video"><span class="company_video">company video</span></p>
                    </div> -->
                    
                    <div class="contact_btn">
                        <button class="contact_supplier_btn">Add to Cart <p>Or request quote</p></button>
                    </div>
                    
                </div>
                
            </div>';
            echo $output;
               }
              ?>
                  
              </div>
              <div class="col-lg-2 sec-right">
                  <div class="card">
                      today
                  </div>
              </div>
  
          </div>
          </div>     
    <div id="login_form" class="login_form_cntr hide">
        <div class="container">
            <h1>Login Form</h1>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter Username" name="uname" id="uname">
                <label for="Password">Password:</label>
                <input type="Password" placeholder="Enter Password" name="psw" id="psw">
                <button type="submit" name="login_clk" class="login_submit active">Login</button>
                <button type="submit" class="login_cancel active">Cancel</button>
                <ul class="btn2">
                    <li class="text-white">Forgot </li>
                    <li><a href="#">password?</a></li>
                  </ul>
            </form>
        </div>
    </div>   
    <div id="signup_form" class="signup_form_cntr hide">
        <div class="container">
            
                <h1>Sign Up Form</h1>
            <form action="signup.php" enctype="multipart/form-data" method="post" style="width: 100%;">
                <div class="row" style="width: 100%;">
                    <div class="col-sm-6">
                        
                        <input type="file" name="profileimage" onchange="displayimage(this)" id="profileimage" style="display: none;">
                        <label for="ownername">Owner's name:</label>
                        <input type="text" placeholder="Enter owner's name" name="ownername" id="ownername">
                        <label for="ownername">Company name:</label>
                        <input type="text" placeholder="Enter Company name" name="companyname" id="companyname">
                        <label for="location">location:</label>
                        <input type="text" name="street" id="street" placeholder="Enter Street / Lane / Plot no">
                        <input type="text" name="Area" id="Area" placeholder="Enter Area / locality">
                        <input type="text" name="city" id="city" placeholder="Enter City">
                        <input type="text" name="state" id="state" placeholder="Enter State">
                        <input type="text" name="zip" id="zip" placeholder="Zipcode">
                        <label for="username">Username:</label>
                        <input type="Username" placeholder="Enter Username" name="uname" id="uname">
                        <label for="Password">Password:</label>
                        <input type="Password" placeholder="Enter Password" name="psw" id="psw">
                        <button type="submit" name="signup_click" class="signup_submit active">Sign Up</button>
                        <button type="submit" class="signup_cancel active">Cancel</button>
                        <ul class="btn2">
                            <li class="text-white">Forgot </li>
                            <li><a href="#">password?</a></li>
                          </ul>
                        
                        </div>
                        <div class="col-sm-6" style="text-align: center;align-items: center;">
                            <img src="images/placeholder.png" onclick="trigger_click()" alt="companylogo" id="companylogo">
                            <label for="Companylogo" style="text-align: center;margin-left: 40%;margin-right: 40%;">Upload Company Logo</label>
                        </div>

                </div>
                
            </form>
        </div>
    </div> 
    </div> 
    <footer class="mt-auto">
        <div class="footer-content">
            <h3>Campaigns.com</h3>
            <p>Campaigns.com is a website where people can lease media spaces, plan advertisment campaigns and get consultation from expert as per the custom requirements and buget of user</p>
            <ul class="socials">
                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="	fab fa-twitter"></i></a></li>
             </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2022 <a href="#">Campaigns.com</a>  </p>
         </div>


    </footer> 
    <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
        </script> 

</body>
</html>
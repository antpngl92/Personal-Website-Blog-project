<?php 
    if(isset($_SESSION['id']))
    {
        header("Location: index.php");
    }

    if(isset($_POST['register']))
    {
        include_once("db.php");

        $firstName = strip_tags($_POST['firstname']);
        $lasttName = strip_tags($_POST['lastname']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $password_confirm = strip_tags($_POST['password_confirm']);

        $firstName = stripslashes($firstName);
        $lasttName = stripslashes($lasttName);
        $email = stripslashes($email);
        $password = stripslashes($password);
        $password_confirm = stripslashes($password_confirm);

        $firstName = mysqli_real_escape_string($db, $firstName);
        $lasttName = mysqli_real_escape_string($db, $lasttName);
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);
        $password_confirm = mysqli_real_escape_string($db, $password_confirm);

        $password = md5($password);
        $password_confirm = md5($password_confirm);
        

        $sql_store = "INSERT INTO USERS(firstName, lastName, password, email)
        VALUES('$firstName', '$lasttName', '$password', '$email')";

        //Check if the email exist:
        $sql_fetch_email="SELECT email FROM USERS WHERE email='$email'";

        $query_email= mysqli_query($db,$sql_fetch_email);
        //Checks if returns anything, if it does, there is an user with the same email
        if(mysqli_num_rows($query_email))
        {
            echo"There is already a user with taht email";
            return;
        }
        if($email == "")
        {
            echo "Please insert email";
            return;
        }
        if($password == "" || $password_confirm == "")
        {
            echo"Please insert your password";
            return;
        }

        if($password != $password_confirm)
        {
            echo "The password do not match";
            return;
        }

        //Check if is a valid email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "This email is not valid";
            return;
        }

        mysqli_query($db, $sql_store);

        header("Location: login.php");


    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Anton Nyagolov</title>
    <link rel="stylesheet" type="text/css" href="reset.css" class = "a">
    <link rel= "stylesheet" type="text/css" href = "style2.css" class = "a">
    
  </head>
<body  onload="showTime()">
    <!-- Header -->
<div class="header">
        <img src="logo.png" height="80px" weight="80px"></header>
        <div id="MyClockDisplay" class="clock"></div>
</div>



       <!-- The flexible grid (content) -->
<div class="row">
        <div class="left">
            <div class="navbar" >
                    <nav class="sidebar-first">
                            <ul id="verNav">
                                <li  class="navBarVer" >
                                    <a href="index.html">
                                        <div class="container">
                                        <img src="home.png" height="40px" weight="40px" class = "image" > 
                                            <div class="overlay">
                                                <a href="index.php" > <div class="text">HOME</div></a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="navBarVer">
                                    <a href="index.html">
                                        <div class="container">
                                        <img src="about.png" height="40px" weight="40px" class = "image">
                                            <div class="overlay">
                                                <a href="about.php" ><div class="text">ABOUT</div></a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="navBarVer">
                                    <a href="index.html">
                                        <div class="container">
                                        <img src="projects.png" height="40px" weight="40px" class = "image">
                                        <div class="overlay">
                                                <a href="projects.php">   <div class="text">PROJECTS</div> </a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="navBarVer">
                                    <a href="index.html">
                                            <div class="container">
                                        <img src="contact.png" height="40px" weight="40px" class = "image">
                                        <div class="overlay">
                                                <a href="contact.php"> <div class="text">CONTACT</div></a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="navBarVer">
                                        <a href="index.html">
                                            <div class="container">
                                            <img src="blog.png" height="40px" weight="40px" class = "image">
                                                <div class="overlay">
                                                        <a href="viewBlog.php"> <div class="text">BLOG</div> </a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                            </ul>
                        </nav>
            </div>
        </div>
        <div class="center">
            <div class="flex-container">
                <form class="myFormBlog" id="form" style="text-align: center;" method="post" action="register.php" enctype="multipart/form-data">
                    <h1 style="text-align: center; color: #609FB4;"> User Registration Form</h1><br />
                    <input placeholder="First Name" name="firstname" type="text" required autofocus><br />
                    <input placeholder="Last Name" name="lastname" type="text" required><br />
                    <input placeholder="Email" name="email" type="email" required><br />
                    <input placeholder="Password" name="password" type="password" required><br />
                    <input placeholder="Confirm Password" name="password_confirm" type="password" id="cpsw" required><br />
                    <input name="register"  id="button" type="submit" value="Register">
                </form>
                
            </div>
        </div>    
            
        <div class="right">
            <div class = "right">
                    <ul>
                        <li class="rightSection" >
                            <a href="index.html">
                                 <div class="container">
                                    <img src="login.png" height="40px" weight="40px" class = "image2" > 
                                        <div class="overlayRight">
                                            <a href="login.php" > <div class="text2">LOGIN</div></a>
                                        </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <br />
                    <div class="hobbies">
                            <h2>Hobbies</h2>
                            <ul>
                                <li>Hobbie1</li>
                                <li>Hobbie2</li>
                                <li>Hobbie3</li>
                                <li>Hobbie4</li>
                                <li>Hobbie5</li>
                                <li>Hobbie6</li>
                                
                            </ul>
                    </div>
            </div>
        </div>
</div>

      <footer class="footer">
            <div id = "footer">
                
                        <p>
                        <a id="linkedin" href = "#" target = "_blank"><img src="linkedin.png" alt = "LinkedIn Profile" height= "40" width = "40"/><span class = "tt"></span></a> 
                        <a href = "#" target = "_blank"><img src="instagram.png" alt = "Instagram Profile" height= "40" width = "40"  /><span class = "tt"></span></a> 
                        <a href = "#" target = "_blank"><img src="facebook.png" alt = "Facebook Profile" height= "40" width = "40"  /><span class = "tt"></span></a>
                        </p>
                        <p id ="text">&copy; Anton Nyagolov, 2019</p>
                    
    </footer>
    
    <script src="clock.js"></script>
</body>
</html>

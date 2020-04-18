<?php 
   session_start();
    if(isset($_SESSION['username']))
    {
        header("Location: viewBlog.php");
    }
   if(isset($_POST['login']))
   {
       include_once("db.php");
       //removes all the possible ways for SQL injection
       $email = strip_tags($_POST['email']);
       $password = strip_tags($_POST['password']);

       $email = stripslashes($email);
       $password = stripslashes($password);

       $email = mysqli_real_escape_string($db, $email);
       $password = mysqli_real_escape_string($db, $password);

       $password = md5($password);
       
       $sql = "SELECT * FROM USERS WHERE email = '$email' LIMIT 1";
       $query = mysqli_query($db, $sql);
       $row = mysqli_fetch_array($query);
       $id = $row['ID'];
       $firstName = $row['firstName'];
       $db_password = $row['password'];
       $admin = $row['admin'];

       if($password == $db_password)
       {
           $_SESSION['username'] = $firstName;
           $_SESSION['id'] = $id;
           if($admin == 1)
           {
               $_SESSION['admin'] = 1;
           }
           header("Location: viewBlog.php");
       }
       else
       {
        header("Location: incorrectDetails.html");
       }
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
        <header>
            <img src="logo.png" height="80px" weight="80px">
            <div id="MyClockDisplay" class="clock"></div>
        </header>
        
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
                    <form action ="login.php" style="text-align: center;" class="myFormBlog" method = "POST" id="form">
                            <h1 style = "color: #609FB4; text-align:center;">Login</h1>
                        
                        <br>
                        <input type="email" name="email" placeholder="yourName@example.com" required autofocus>
                        <br>
                        <input type="password" name="password" placeholder="Password" required>
                        <br>
                        
                        <br>
                        <input type="submit" name = "login" id="button" value="Login" >
                        <input type="button"   id="button" name ='register' value="Register" onclick='window.location = "register.php"'>
            
        </div>
                    </form>
            </div>    
            
        <div class="right">
                
                <div class = "right">
                    <ul>
                        <li class="rightSection" >
                            <a href="index.html">
                                 <div class="container">
                                    <img src="login.png" height="40px" style="left:40px;"weight="40px" class = "image2" > 
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
        <footer class="footer">
            <div id = "footer">
                
                        <p>
                        <a id="linkedin" href = "#" target = "_blank"><img src="linkedin.png" alt = "LinkedIn Profile" height= "40" width = "40"/><span class = "tt"></span></a> 
                        <a href = "#" target = "_blank"><img src="instagram.png" alt = "Instagram Profile" height= "40" width = "40"  /><span class = "tt"></span></a> 
                        <a href = "#" target = "_blank"><img src="facebook.png" alt = "Facebook Profile" height= "40" width = "40"  /><span class = "tt"></span></a>
                        </p>
                        <p id ="text">&copy; Anton Nyagolov, 2019</p>
                    
    </footer>

    
    </div>

      
    <script src="clock.js"></script>
</body>
</html>

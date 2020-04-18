<?php 
    session_start();
    include_once("db.php");

    //If the user is logged already in variable $logged gets the value of Logged ad: so it can be displayed on the right column
    if(isset($_SESSION['username']))
    {
        $logged = "Logged as: ";
    }
    //If admin is logged in the control panel will be diplayed on the right
    if(isset($_SESSION['admin']) && $_SESSION['admin'] ==1 )
    {
        
        $side_button_panel = "  <ul>
                                    <li class='rightSection' >
                                        <a href='index.php'>
                                            <div class='container'>
                                                <img src='admin.png' height='40px' weight='40px' class = 'image2' > 
                                                <div class='overlayRight'>
                                                    <a href='admin.php' > <div class='text2'>ADMIN</div></a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class='rightSection' >
                                        <a href='index.php'>
                                            <div class='container'>
                                                <img src='logout.png' height='40px' weight='40px' class = 'image2' > 
                                                <div class='overlayRight'>
                                                    <a href='logout.php' > <div class='text2'>LOGOUT</div></a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class='rightSection'>
                                        <a href='index.php'>
                                            <div class='container'>
                                                <img src='addpost.png' height='40px' weight='40px' class = 'image2' > 
                                                <div class='overlayRight'>
                                                    <a href='addpost.php' > <div class='text2'>POST</div></a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>";

        

                                
    }
    //If no user is logged in there will be a log in button on the right 
    if(!isset($_SESSION['username']))
    {
        
        $side_button_panel = "  <ul>
                                    <li class='rightSection' >
                                        <a href='index.php'>
                                            <div class='container'>
                                                <img src='login.png' height='40px' weight='40px' class = 'image2' > 
                                                <div class='overlayRight'>
                                                    <a href='login.php' > <div class='text2'>LOGIN</div></a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                <ul>";
    }
    //If user is loged in who is not admin a logout button only will be displayed
    if(isset($_SESSION['username']) && !isset($_SESSION['admin']))
    {
        
        $side_button_panel = " <ul>
                                    <li class='rightSection' >
                                        <a href='index.php'>
                                            <div class='container'>
                                                <img src='logout.png' height='40px' weight='40px' class = 'image2' > 
                                                <div class='overlayRight'>
                                                    <a href='logout.php' > <div class='text2'>LOGOUT</div></a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                <ul>";

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
  <body onload="showTime()">
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
                                    <a href="index.php">
                                        <div class="container">
                                        <img src="home.png" height="40px" weight="40px" class = "image" > 
                                            <div class="overlay">
                                                <a href="index.php" > <div class="text">HOME</div></a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="navBarVer">
                                    <a href="index.php">
                                        <div class="container">
                                        <img src="about.png" height="40px" weight="40px" class = "image">
                                            <div class="overlay">
                                                <a href="about.php" ><div class="text">ABOUT</div></a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="navBarVer">
                                    <a href="index.php">
                                        <div class="container">
                                        <img src="projects.png" height="40px" weight="40px" class = "image">
                                        <div class="overlay">
                                                <a href="projects.php">   <div class="text">PROJECTS</div> </a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="navBarVer">
                                    <a href="index.php">
                                            <div class="container">
                                        <img src="contact.png" height="40px" weight="40px" class = "image">
                                        <div class="overlay">
                                                <a href="contact.php"> <div class="text">CONTACT</div></a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="navBarVer">
                                        <a href="index.php">
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
                <h1 id="antonBlog"> Why Computer Science? </h1>
                    
                        
                        <p class="pAbout">Computer technology has significantly transformed the way individuals, industries and societies function on a daily basis. 
                        I have a strong passion for learning about complex computer systems, and I am particularly drawn to the way software 
                        engineering involves mathematical, logical, and linear processes. Computing as a dynamic and constantly evolving area 
                        fascinates me, and I am prepared for the challenging yet fulfilling journey of studying towards a degree in Computer Science.
                        </p>
                        <br />
                        
            </div>
                    
        </div>    
            
       
        <div class="right">
                <div class = "right">
                    <div class="welcomeName">
                        <!--It displays the loged user name -->
                        <p><?php echo $logged. $_SESSION['username']; ?></p>
                    </div>
                    <br />
                    <div class="sideButtons">
                        <?php echo $side_button_panel; ?>
                    </div>
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
                <p id ="text">&copy; Anton  Nyagolov, 2019</p>
            </div>
                    
    </footer>
    <script src="clock.js"></script>
</body>
</html>

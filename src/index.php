<?php 
    session_start();
    include_once("db.php");

    if(isset($_SESSION['username']))
    {
        $logged = "Logged as: ";
    }

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
    <link rel= "stylesheet" type="text/css" href = "styleHomePage.css" class = "a">
    
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
                <div class="row2">
                    <div class="aboutmyself">
                            <div class="column">
                                <div class = "textAboutMyself">
                                    <h2> About Myself</h2>
                                    <p id = "amp">
                                        My name is Anton Nyagolov and I am a Computer Science student within the School of Elecronic Engineering and Computer Science of Queen Marry University of London.
                                    </p>
                                </div>
                            </div>
                        <div class="column">
                            <div class="pictureAboutMyself">
                                <img class="pictureAboutMyself" id="me" src="me.jpg" alt = "Anton Nyagolov" ;/>
                            </div>
                        </div>
                    </div>
                </div>
               
                     <aside class = "education">
                        <div  id="table-responsive">
                        
                            <h2 id="educationHeader">Education</h2>
                        <table class = "table">
                            <tr>
                                <td>
                                    <p class="educationContent"><datetime>2017 - 2018</datetime> Some text here</p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <p class="educationContent"><datetime>2018 - 2021</datetime> Some text here</p>
                                </td>	
                            </tr>
                        </table>
                        </div>
                    </aside>
            </div>                
            
        </div>
        <div class="right">
                <div class = "right">
                    <div class="welcomeName">
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
                        <p id ="text">&copy; Anton Nyagolov, 2019</p>
                    
            </div>
    </footer>
    <script src="clock.js"></script>
</body>
</html>

<?php 
   session_start();
   include_once("db.php");

    //if user is not admin its get redirected to the login page
   if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1)
   {
       header("Location: login.php");
       return;
   }
   //if no one has logged going to login page 
   if(!isset($_SESSION['username']))
   {
       header("Location: login.php");
       return;
   }
   $side_button_panel = "";
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
   //If admin presses post button:
   if(isset($_POST['post']) && isset($_SESSION['admin']))
   {   
       //Strores title from text area named title and content from text area named content
       $title = strip_tags($_POST['title']);
       $content = strip_tags($_POST['content']);

       //against mysql injection
       $title = mysqli_real_escape_string($db, $title);
       $content = mysqli_real_escape_string($db, $content);
        //date function 
       $date = date(' jS \of F Y h:i:s A T');
       
       
        //inserts into sql table
       $sql = "INSERT INTO POSTS (title, content, date) VALUES ('$title','$content','$date')";

       /*
       if($title == "" || $content == "")
       {
           echo "Please complete your post";
           return;
       }
       */
       



       mysqli_query($db, $sql);
       //Once the new post is inserted into the table refirects to viewBlog page  
       header("Location: viewBlog.php");

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
                <form action="addpost.php" method="post" onsubmit="return FormValidation();" enctype="multipart/form-data" class="myFormBLog" id="form">
                    <input placeholder="Title" id="titleInput" name="title" type="text" autofocus size="48"><br /><br />
                    <textarea placeholder="Content" id="textArea" name="content" rows="20" cols="100" ></textarea><br />
                    <input name="post" type="submit" id="button"  value="Post">
                    <button name="clear"  id="button" onclick="clear()">Clear</button>
                </form>   
            </div>  
        </div>  
            
        <div class="right">
                <div class = "right">
                    <div class="welcomeName">
                        <p><?php echo "Logged as: ". $_SESSION['username']; ?></p>
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
    <script src="clearButton.js"></script>
    <script src="addPostValidation.js"></script>
</body>
</html>

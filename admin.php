<?php 
    session_start();
    include_once("db.php");

    //if user is not admin its get redirected to the login page
    if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1)
    {
        header("Location: login.php");
        return;
    }

?>
<?php
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
                    
                    <?php 
                            //gets the data from sql table with the latest ID first meaning that the latest submited post will be first 
                            $sql = "SELECT * FROM POSTS ORDER BY id DESC";
                            //result of the query
                            $res = mysqli_query($db, $sql) or die(mysqli_error());
                
                            $post = "";
                            //if there are more than 0 rows meaning that there is data in the table 
                            if(mysqli_num_rows($res) > 0)
                            {   //loops through associative array (containing all the data required from the sql database with the sql query)
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $id = $row['ID'];
                                    $title = $row['title'];
                                    $content = $row['content'];
                                    $date = $row['date'];
                
                                    $admin = "
                                                <a id='button' style='text-decoration: none;'  href='del_post.php?pid=$id'>Delete</a>
                                                &nbsp
                                                <a id='button' style='text-decoration: none;' href='edit_post.php?pid=$id'>Edit</a>
                                              ";
                
                                    
                                    //.= operator is a string operator, it first convers the values to string
                                    $posts .="
                                    
                                        <h6  style='color: #609FB4; float: right; ' >$date</h6><br />
                                        <h2  style='font-size: 200%; text-align:center; color: white;'>
                                            $title
                                        </h2>
                                        <p id='adminContent' style='font-size: 150%; text-align:center; color: white;'>$content</p> <br />
                                        <p style='text-align:center; ' >$admin</p> <br />
                                        <div class = 'separator'></div>
                                        <br />
                                        ";
                
                                }
                                echo $posts;
                
                            }
                            else
                            {
                                echo "<h1 style='text-align: center; color: white; font-size:200%;'>There are no posts to display!<h1>";
                            }
                            ?>
                            
                    
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
                        <a id="linkedin" href = "" target = "_blank"><img src="linkedin.png" alt = "LinkedIn Profile" height= "40" width = "40"/><span class = "tt"></span></a> 
                        <a href = "" target = "_blank"><img src="instagram.png" alt = "Instagram Profile" height= "40" width = "40"  /><span class = "tt"></span></a> 
                        <a href = "" target = "_blank"><img src="facebook.png" alt = "Facebook Profile" height= "40" width = "40"  /><span class = "tt"></span></a>
                        </p>
                        <p id ="text">&copy; Anton Nyagolov, 2019</p>
                    
    </footer>
    <script src="clock.js"></script>
</body>
</html>

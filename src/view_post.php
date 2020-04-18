<?php
   session_start();
   include_once("db.php");
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
       
    </head>
    <body onload="showTime()">
    <!-- Header -->
<div class="header">
        <img src="logo.png" height="80px" weight="80px"></header>
        <div id="MyClockDisplay" class="clock"></div>
</div>
        <?php 
            require_once("nbbc/nbbc.php");

            $bbcode = new BBCode;

            $pid = $_GET['pid'];

            $sql = "SELECT * FROM POSTS WHERE id=$pid LIMIT 1";

            $res = mysqli_query($db, $sql) or die(mysqli_error());

            if(mysqli_num_rows($res) > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['ID'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $date = $row['date'];
                    
                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
                    {
                        $admin = "<div>
                                    <a href='del_post.php?pid=$id'>Delete</a>
                                    <a href ='edit_post.php?pid=$id'>Edit</a>
                                  </div>"
                    }
                    else
                    {
                       $admin = ""; 
                    }

                    $output = $bbcode->Parse($content);
                    
                    //.= operator is a string operator, it first convers the values to string
                    echo"
                    <div>
                         <h6 style = 'font-size: 50%';>$date</h6>
                         <h2>
                            <a href = 'view_post.php?pid=$id'>$title</a>
                         </h2>
                                        
                        <p>$output</p>
                        <hr />
                    </div>";

                }

            }
            else
            {
                echo "There are no posts to display!";
            }

            
        ?>
        
        <a href="index.php">Return</a>
        <script src="clock.js"></script>
    </body>
</html>

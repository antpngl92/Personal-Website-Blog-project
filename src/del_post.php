<?php 
    session_start();
    include_once("db.php");
    //if no one loged in goes to login page
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
        return;
    }
    //if the are no id from the table so it cannot delete anything
    if(!isset($_GET['pid']))
    {
        header("Location: index.php");
    }
    else
    {
        $pid = $_GET['pid'];
        $sql = "DELETE FROM POSTS WHERE ID=$pid";
        mysqli_query($db, $sql);
        header("Location: admin.php");
    }
    ?>
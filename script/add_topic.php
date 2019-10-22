<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: uhoh.php");
    }
?>

<!DOCTYPE html>
<html>
    <!-- page header -->
    <header>
        <?php include('header.php'); ?>
    </header>

    <!-- page contents -->
    <!-- need to change to new table -->
    <body>
        <section>
            <?php
                error_reporting(0);
                include('../connect.php');

               $tbl_posts= "posts";

               try {
                 $UserID=(int)$_SESSION['user_id'];
              } catch (Exception $e) {}

               // mysqli_connect("$host", "$username", "$password")or die("cannot connect");
               // mysqli_select_db("$db_name")or die("cannot select DB");

               $topic=$_POST['detail'];
               $detail=$_POST['topic'];

               $datetime=date("d/m/y h:i:s"); // Don't think this is needed

               // $sql="INSERT INTO $tbl_posts(PostContent, PostTopic, DatePosted)VALUES('$detail', '$topic','$datetime')";
               // $sql="INSERT INTO $tbl_posts(PostContent, PostTopic, DatePosted)VALUES('$detail', '$topic', now())"; // Changed to now()
               $sql="INSERT INTO $tbl_posts(PostContent, PostTopic, DatePosted, PosterID)VALUES('$detail', '$topic', now(), '$UserID')";
               $result=mysqli_query($connection, $sql);

               if($result){
               echo "Successful<BR>";
               echo "<a href=main_forum.php>View your topic</a>";
               }
               else {
               echo "ERROR";
               }
               mysqli_close($connection);
            ?>

        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

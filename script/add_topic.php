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
                include('../connect.php');

               $host= "localhost";
               $username="";
               $password="";
               $db_name= "pettit";
               $tbl_posts= "posts";

               mysqli_connect("$host", "$username", "$password")or die("cannot connect");
               mysqli_select_db("$db_name")or die("cannot select DB");

               $topic=$_POST['topic'];
               $detail=$_POST['detail'];
               $name=$_POST['name'];
               $email=$_POST['email'];

               $datetime=date("d/m/y h:i:s");

               $sql="INSERT INTO $tbl_posts(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
               $result=mysqli_query($sql);

               if($result){
               echo "Successful<BR>";
               echo "<a href=main_forum.php>View your topic</a>";
               }
               else {
               echo "ERROR";
               }
               mysql_close();
            ?>
               
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

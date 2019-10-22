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

    <body>
        <section>
          <?php 
          include('../connect.php');

          $tbl_name= "comments"

          $id= $_POST['PostID']; //Value from hidden field

          //Get higest number of comments
          $sql= "SELECT MAX(comment_id) AS Maxa_id FROM $tbl_name WHERE parent_id= '$id'";
          $result= mysqli_query($connection, $sql);
          $rows= mysqli_fetch_array($result);

          //Adding 1 to the highest num of comments
          if($rows) {
            $Max_id= $rows['Maxa_id'] + 1;
          }

          else {
            $Max_id= 1;
          }

          //Get values
          $a_name= $_POST('user_id');
          $a_email= $_POST('EmailAddress');
          $a_answer= $_POST('text_content');

          $datetime= $_POST('date_posted');

          //Post comment
          $sql2= "INSERT INTO $tbl_name(parent_id, comment_id, UserName, EmailAddress, text_content, date_posted) VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$a_datetime')";
          $result2= mysqli_query($connection, $sql2);

          if($result2) {
            echo "Successful<BR>";
            echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

            //if new comment add +1 to reply column
            $tbl_name2= "posts";
            $sql3= "UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
            $result3= mysqli_query($connection, $sql3);
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

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

          $host= "localhost";
          $username= "";
          $password= "";
          $db_name= "test"
          $tbl_name= "forum_answer";

          mysqli_connect("$host", "$username", "$password") or die("cannot connect");
          mysqli_select_db("$db_name") or die("cannot select DB");

          $id= $_POST['id']; //Value from hidden field

          //Get higest number of comments
          $sql= "SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id= '$id'";
          $result= mysqli_query($sql);
          $rows= mysqli_fetch_array($result);

          //Adding 1 to the highest num of comments
          if($rows) {
            $Max_id= $rows['Maxa_id'] + 1;
          }

          else {
            $Max_id= 1;
          }

          //Get values
          $a_name= $_POST('a_name');
          $a_email= $_POST('a_email');
          $a_answer= $_POST('a_answer');

          $datetime= date("d/m/y H:i:s");

          //Post comment
          $sql2= "INSERT INTO $tbl_name(question_id, a_id, a_name, a_email, a_answer, a_datetime) VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$a_datetime')";
          $result2= mysqli_query($sql2);

          if($result2) {
            echo "Successful<BR>";
            echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

            //if new comment add +1 to reply column
            $tbl_name2= "forum_question";
            $sql3= "UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
            $result3= mysqli_query($sql3);
          }

          else {
            echo "ERROR";
          }

          mysqli_close();

           ?>

        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

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
               $db_name= "pettit";
               $tbl_posts= "posts";
               $tbl_users= "users";

               mysqli_connect("$host", "$username", "$password") or die("cannot connect");
               mysqli_select_db("$db_name") or die("cannot select DB");

               //Get ID sent from the address bar
               $id= $_GET['PostID'];
               $sql= "SELECT * FROM $tbl_posts WHERE PostID= '$PostID'";
               $result= mysqli_query($sql);
               $rows= mysqli_fetch_array($result);

               $sql_users= "SELECT * FROM $tbl_users WHERE ID= '$ID'";
               $result2= mysqli_query($sql2)
               $rows_users= mysqli_fetch_array($result2);
                ?>

                <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                      <tr>
                        <td bgcolor="#F8F7F1"><strong><? echo $rows['PostTopic']; ?></strong></td>
                      </tr>

                      <tr>
                        <td bgcolor="#F8F7F1"><? echo $rows['PostContent']; ?></td>
                      </tr>

                      <tr>
                        <td bgcolor="#F8F7F1"><strong>By: </strong> <? echo $rows_users['EmailAddress'];?></td>
                      </tr>

                      <tr>
                        <td bgcolor="$F8F7F1"><strong>Date/time: </strong> <? echo $rows['DatePosted']; ?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <BR>

                <?php 
                $tbl_comments= "comments";
                $sql_comments= "SELECT * FROM $tbl_comments WHERE comment_id= '$comment_id'";
                $result3= mysqli_query($sql_comments);

                while($rows_comments = mysqli_fetch_array($result3)){
                 ?>

                 <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                   <tr>
                     <td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                      <tr>
                        <td bgcolor="#F8F7F1"><strong>ID</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><? echo $rows_comments['user_id']; ?></td>
                      </tr>

                      <tr>
                        <td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
                        <td width="5%" bgcolor="#F8F7F1">:</td>
                        <td width="77%" bgcolor="#F8F7F1"><? echo $rows_users['UserName']; ?></td>
                      </tr>

                      <tr>
                        <td bgcolor="#F8F7F1"><strong>Email</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><? echo $rows_users['EmailAddress']; ?></td>
                      </tr>

                      <tr>
                        <td bgcolor="#F8F7F1"><strong>Answer</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><? echo $rows_comments['text_content']; ?></td>
                      </tr>

                      <tr>
                        <td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
                        <td bgcolor="#F8F7F1">:</td>
                        <td bgcolor="#F8F7F1"><? echo $rows_comments['date_posted']; ?></td>
                      </tr>
                     </table></td>
                   </tr>
                 </table>
                 <BR>

              <?php  
              }

              $sql2= "SELECT view FROM $tbl_posts WHERE id= '$PostID'";
              $result4= mysqli_query($sql2);
              $rows= mysqli_fetch_array($result4);
              $view= $rows['view'];

              if (empty($view)) {
                $view= 1;
                $sql3= "INSERT INTO $tbl_posts(view) VALUES('$view') WHERE id='$PostID'";
                $result4= mysqli_query($sql3);
              }

              $addview= $view + 1;
              $sql4= "UPDATE $tbl_posts SET view= '$addview' WHERE id='$PostID'";
              $result5= mysqli_query($sql5);
              mysqli_close();
              ?>

              <BR>
              <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                  <form name="form1" method="post" action="add_answers.php">
                    <td>
                      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                          <td width="18%"><strong>Name</strong></td>
                          <td width="3%">:</td>
                          <td width="79%"><input type="text" name="a_name" id="a_name" size="45"></td>
                        </tr>

                        <tr>
                          <td><strong>Email</strong></td>
                          <td>:</td>
                          <td><input type="text" name="a_email" id="a_email" size="45"></td>
                        </tr>

                        <tr>
                          <td valign="top"><strong>Answer</strong></td>
                          <td valign="top">:</td>
                          <td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td><input type="hidden" name="id" value="<? echo $PostID; ?>"></td>
                          <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
                        </tr>
                      </table>
                    </td>
                  </form>
                </tr>
              </table>
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

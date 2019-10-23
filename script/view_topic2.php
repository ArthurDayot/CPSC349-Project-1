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

               $tbl_posts = "posts";
               $tbl_users = "users";
               //Get ID sent from the address bar
               $PostID = $_GET['id'];
               $sql= "SELECT * FROM $tbl_posts WHERE PostID= '$PostID'";
               $result= mysqli_query($connection, $sql);
               $row= mysqli_fetch_array($result);

               $userID = $row['PosterID'];
               $sqluser= "SELECT * FROM $tbl_users WHERE UserID= '$userID'";
               $resultUserName= mysqli_query($connection, $sqluser);
               $rowUserName= mysqli_fetch_array($resultUserName);
                ?>
                <table>
                <tr>
                  <td><span style="font-size: 32px;"><strong><?php echo htmlspecialchars($row['PostTopic'])?></strong></span></td><br></tr><tr>
                  <td><?php echo "Poster: " . htmlspecialchars($rowUserName['UserName'])?></td><br></tr><tr>
                  <td><span style="font-size: 24px;"><?php echo htmlspecialchars($row['PostContent'])?></span></td><br></tr><tr>
                  <td><?php echo "Date Posted: " . htmlspecialchars($row['DatePosted'])?></td><br></tr><tr>
                  <td><?php echo "Upvotes: " . htmlspecialchars($row['up_votes'])?><br>
                  <?php echo "Downvotes: " . htmlspecialchars($row['down_votes'])?><br>
                  <?php echo "Views: " . htmlspecialchars($row['view'])?><br>
                  <?php echo "Replies: " . htmlspecialchars($row['reply'])?></td><br>
                </tr>
              </table>
        </section>
        <section>
          <?php
          include('../connect.php');

          $tbl_comments = "comments";

          //Get ID sent from the address bar
          $PostID = $_GET['id'];
          $sql2= "SELECT * FROM $tbl_comments WHERE parent_id= '$PostID'";
          $result2= mysqli_query($connection, $sql2);
          // $row2= mysqli_fetch_array($result2);
          // echo "Comments:";
          ?>
          <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">

            <tr>
              <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Commenter</strong></td>
              <td width="33%" align="center" bgcolor="#E6E6E6"><strong>Comment</strong></td>
              <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date commented</strong></td>
              <td width="5%" align="center" bgcolor="#E6E6E6"><strong>Upvotes</strong></td>
              <td width="5%" align="center" bgcolor="#E6E6E6"><strong>Downvotes</strong></td>
            </tr>
          <tr>
          <?php
          while ($row2 = $result2->fetch_assoc()) {
            $commenterID = $row2['user_id'];
            $sqlcommenter= "SELECT * FROM $tbl_users WHERE UserID= '$commenterID'";
            $resultCommenter= mysqli_query($connection, $sqlcommenter);
            $rowCommenter= mysqli_fetch_array($resultCommenter);
           ?>
             <td><span style="font-size: 32px;"><?php echo htmlspecialchars($rowCommenter['UserName'])?></span></td>
             <td><?php echo htmlspecialchars($row2['text_content'])?></td><br>
             <td><?php echo htmlspecialchars($row2['date_posted'])?></td>
             <td><?php echo htmlspecialchars($row2['up_votes'])?></td>
             <td><?php echo htmlspecialchars($row2['down_votes'])?></td>
           </tr>
           <?php
         }
         mysqli_close($connection);
            ?>
          </table>
          <br>
        </section>

        <section>

        </section>

    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

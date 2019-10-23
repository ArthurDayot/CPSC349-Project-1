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
            $tbl_name="posts";//CHANGE ACCORDING TO JOHNS DB

            // mysqli_connect("$host", "$username", "$password", "8889") or die("cannot connect");
            // mysqli_select_db("$db_name") or die("cannot select DB");
            //$sql= "SELECT * FROM $tbl_name ORDER BY PostID DESC"; //order results by descending id
            $sql= "SELECT PostID, PostTopic, view, reply, DatePosted FROM $tbl_name ORDER BY PostID DESC";

            $result= mysqli_query($connection, $sql);
             ?>

            <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">

              <tr>
                <td width="6%" align="center" bgcolor="#E6E6E6"><strong></strong>#</td>
                <td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
                <td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
                <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
                <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
              </tr>

              <?php

               //table row loop
              //  while($row = $result->fetch_assoc()) {
              //    echo "PostID: " . $row["PostID"]. " - PostTopic: " . $row["PostTopic"]. " - view: " . $row["view"]. " - reply: " . $row["reply"]. " - DatePosted: " . $row["DatePosted"]. "<br>";
              // }

              while ($row = $result->fetch_assoc()) {
               ?>
                              <tr>
                                <td><?php echo htmlspecialchars($row['PostID'])?></td>
                                <!-- <td><?php //echo htmlspecialchars($row['PostTopic'])?></td> -->
                                <td><a href="view_topic2.php?id=<?php echo htmlspecialchars($row['PostID']) ?>"><?php echo htmlspecialchars($row['PostTopic']); ?></td>
                                <td><?php echo htmlspecialchars($row['view'])?></td>
                                <td><?php echo htmlspecialchars($row['reply'])?></td>
                                <td><?php echo htmlspecialchars($row['DatePosted'])?></td>
                              </tr>

               <?php
             }
             mysqli_close($connection);
                ?>

             <tr>
               <td colspan="5" align="right" bgcolor="#000000"><a href="create_topic.php"><strong>Create New Topic</strong></a></td>
             </tr>
            </table>

        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

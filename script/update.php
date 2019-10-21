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
    <body>
        <section>
            <h2>Create your post! </h2>
            <form action="processUpdate.php" method=post>
                <table id="searching">
                    <tr>
                      <!-- Need to change name = to fit the new table -->
                      <td>Title</td>
                      <td align=center><input type="text" name="nplayer" size=60 maxlength=60></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td align=center><input type="text" name="spons" size=60 maxlength=60></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td align=center><input type="text" name="game" size=60 maxlength=60></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td align=center><input type="text" name="main" size=60 maxlength=15></td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td alighn=center><input type="text" name="main" size=60 maxlength=60></td>
                    </tr>
                </table>
                <br />
                <input type=submit id="search" value="Submit" name="add_btn"><br />
                <p style="margin-botom: 200px; width: 50px; border: 120px solid white;">
            </form>

        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

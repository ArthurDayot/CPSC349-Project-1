<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: uhoh.php");
    }
?>

<!DOCTYPE html>
<!-- change to search for the new post table -->
<html>
    <!-- page header -->
    <header>
        <?php include('header.php'); ?>
    </header>

    <!-- page contents -->
    <body>
        <section>
            <h2>Search for a post:</h2>

                <form action="processSearch.php" method=post>
                    <table id="searching">
                        <tr>
                            <td>Post Title</td>
                            <td align=center><input type="text" name="player" size=60 maxlength=60></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td align=center><input type="text" name="main" size=60 maxlength=25></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td align=center><input type="text" name="game" size=60 maxlength=60></td>
                        </tr>
                    </table>
                    <br />
                    <input type=submit id="search" value="Search"><br />
                    <p style="margin-botom: 200px; width: 50px; border: 120px solid white;">
                </form>
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <!-- page header -->
    <header>
        <?php
            include('header.php');
        ?>
    </header>

    <!-- page contents -->
    <body>
        <section>
            <h2>Welcome to Pettit!</h2>
            <p>&nbsp; &nbsp; &nbsp; Here, you can set up doggie dates with your local doggie parents!</p>
            <p>&nbsp; &nbsp; &nbsp; If you would like to find a doggie date near you check out our fourm page!</p>
            <p>&nbsp; &nbsp; &nbsp; Want to set up a date? Create a post!</p>
            <p style="margin-botom: 200px; width: 50px; border: 120px solid white;">



            <?php
                if(!isset($_SESSION['user_id'])){?>
                    <p>&nbsp; &nbsp; &nbsp; Please
                    <a href="login.php"><font color="3300ff"><u>log in</u></font></a> or <a href="register.php"><font color="3300ff"><u>register</u></font></a> to continue.</p>
                <?php } ?>
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

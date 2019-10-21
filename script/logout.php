<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: home.php");
    }
    else{
        session_destroy();
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
            <h2>You've been logged out.</h2>
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

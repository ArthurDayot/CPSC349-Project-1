<?php
    session_start(['cookie_lifetime' => 86400,]);
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
            <h2>LOGIN:</h2>
            <form action="" method="POST">
                <table id="searching">
                   <tr><td>E-mail</td><td align=center> <input type="text" name="email"></td></tr>
                   <tr><td>Password</td><td align=center> <input type="password" name="pass"></td></tr>
                </table>
                <br />
                <input type="submit" id="search" value="Login" name="submit_btn">
            </form>

            <?php
                include('../connect.php');

                if(isset($_REQUEST['submit_btn'])){
                    $email = $_POST["email"];
                    $password = md5($_POST["pass"]);

                    $result=$connection->query("SELECT * FROM user WHERE EmailAddress='$email' AND Password='$password'");

                    //User exists, with correct password hash
                    if($result->num_rows!=0){
                        $_SESSION['user_id']=$email;
                        header("Location: home.php");
                    }

                    //User does not exist
                    if($result->num_rows==0){?>
                        <p>Uh-oh, you have entered an invalid email and/or password. Please try again, or register <a href="register.php"><font color="3300ff"><u>here</u></font></a>.<br>"</p>
                    <?php
                    }
                }
            ?>
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

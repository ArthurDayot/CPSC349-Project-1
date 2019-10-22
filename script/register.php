<?php
    session_start(['cookie_lifetime' => 86400,]);
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
            <h2>REGISTER:</h2>
            <form action="" method="post">
                <table id="searching">
                    <tr><td>First Name</td><td align=center><input type="text" name="firstN"></td></tr>
                    <tr><td>Last Name</td><td align=center><input type="text" name="lastN"></td>
                    <tr><td>User Name</td><td align=center><input type="text" name="userName"></td>
                    <tr><td>E-mail</td><td align=center><input type="text" name="mail"></td>
                    <tr><td>Password</td><td align=center><input type="password" name="password"></td>
                </table>
                <br />
                <input type="submit" id="search" value="Register" name="reg_btn">
            </form>

            <?php
                include('../connect.php');
                if(isset($_REQUEST['reg_btn'])){
                    $first = $_POST["firstN"];
                    $last = $_POST["lastN"];
                    $user = $_POST["userName"];
                    $email = $_POST["mail"];
                    $password = md5($_POST["password"]);
                    // $password = $_POST["password"];
                    $result=$connection->query("INSERT INTO users (FirstName, LastName, UserName, EmailAddress, Password) VALUES('$first', '$last', '$user', '$email', '$password')");
                    if($result){
                        // $_SESSION['user_id'] = $email;
                        $_SESSION['user_id'] = $connection->query("SELECT UserID FROM users WHERE $email = EmailAddress");
                        header("Location: home.php");
                    } else {
                    echo "ERROR";
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

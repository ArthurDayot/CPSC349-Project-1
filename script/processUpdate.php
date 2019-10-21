<!DOCTYPE html>
<html>
    <!-- page header -->
    <header>
        <?php include('header.php'); ?>
    </header>

    <!-- page contents -->
    <body>
        <section>
            <h2>Success!</h2>
            <br />
            <?php
                $name = $_POST['nplayer'];
                $spons = $_POST['spons'];
                $game = $_POST['game'];
                $main = $_POST['main'];
                $age = (int) $_POST['age'];

                $player = $_POST['player'];
                $newMain = $_POST['newMain'];

                $rplayer = $_POST['rplayer'];

                include('../connect.php');

                //FOR ADDING A NEW PLAYER
                if(isset($_POST['add_btn'])){
                    $result=$connection->query("INSERT INTO player VALUES('$name','$spons',$age,'$game','$main')");
                }

                //FOR UPDATING A MAIN
                if(isset($_POST['update_btn'])){
                    $result=$connection->query("UPDATE player SET mainChar='$newMain' WHERE name='$player'");
                }

                //FOR DELETING A PLAYER
                if(isset($_POST['remove_btn'])){
                    $result=$connection->query("DELETE FROM player WHERE name='$rplayer'");
                }
            ?>
        </section>
    </body>

    <!-- page footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>

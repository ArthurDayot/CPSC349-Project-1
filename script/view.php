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
                <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                    <tr>
                        <form id="form1" name="form1" method="post" action="add_topic.php">
                            <td>
                                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                    <tr>
                                        <td colspan="3" bgcolor="#e6e6e6"><strong>Create New Topic</strong></td>
                                    </tr>

                                    <tr>
                                        <td width="14%"><strong>Topic</strong></td>
                                        <td width="2%">:</td>
                                        <td width="84%"><input type="text" name="topic" id="topic" size="50"></td>
                                    </tr>

                                    <tr>
                                        <td valign="top"><strong>Detail</strong></td>
                                        <td valign="top">:</td>
                                        <td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
                                    </tr>

<!--                                     <tr>
                                        <td><strong>Name</strong></td>
                                        <td>:</td>
                                        <td><input type="text" name="name" id="name" size="50"></td>
                                    </tr> -->

<!--                                     <tr>
                                        <td><strong>Email</strong></td>
                                        <td>:</td>
                                        <td><input type="text" name="email" id="email" size="50"></td>
                                    </tr> -->

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset"></td>
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

<!DOCTYPE html>
<!-- update to new tables -->
<html>
    <!-- page header -->
    <header>
        <?php include('header.php'); ?>
    </header>

    <!-- page contents -->
    <body>
        <section>
        <h2>Search</h2>
        <?php
            $name = $_POST['player'];
            $main = $_POST['main'];
            $game = $_POST['game'];

            include('../connect.php');

            //Name search
            if((trim($name)!="") && (trim($main)=="") && (trim($game)=="")){
                  $sql = "SELECT * from player WHERE name='" . $name . "'";
                  $result = $connection->query($sql);
                  if($result){
                      ?>
                      <table>
                          <tr>
                              <th>Name</th>
                              <th>Sponsor</th>
                              <th>Age</th>
                              <th>Game</th>
                              <th>Main Character</th>
                          </tr>
                      <?php
                          while($row= $result->fetch_assoc()){ ?>
                              <tr>
                                  <td><?php echo htmlspecialchars($row['name'])?></td>
                                  <td><?php echo htmlspecialchars($row['sponsor'])?></td>
                                  <td><?php echo htmlspecialchars($row['age'])?></td>
                                  <td><?php echo htmlspecialchars($row['game'])?></td>
                                  <td><?php echo htmlspecialchars($row['mainChar'])?></td>
                              </tr>
                  <?php
                          }
                  }
                  ?>
                </table><?php
            }

            //Main search
            elseif((trim($name)=="") && (trim($main)!="") && (trim($game)=="")){
                  $sql = "SELECT * from player WHERE mainChar='" . $main . "'";
                  $result = $connection->query($sql);
                  if($result){
                      ?>
                      <table>
                          <tr>
                              <th>Name</th>
                              <th>Sponsor</th>
                              <th>Age</th>
                              <th>Game</th>
                              <th>Main Character</th>
                          </tr>
                      <?php
                          while($row=$result->fetch_assoc()){?>
                              <tr>
                                  <td><?php echo htmlspecialchars($row['name'])?></td>
                                  <td><?php echo htmlspecialchars($row['sponsor'])?></td>
                                  <td><?php echo htmlspecialchars($row['age'])?></td>
                                  <td><?php echo htmlspecialchars($row['game'])?></td>
                                  <td><?php echo htmlspecialchars($row['mainChar'])?></td>
                              </tr>
                  <?php
                          }
                  }
                  ?>
                      </table><?php
            }

            //Game search
            elseif((trim($name)=="") && (trim($main)=="") && (trim($game)!="")){
                  $sql = "SELECT * from player where game='" . $game . "'";
                  $result = $connection->query($sql);
                  if($result){
                      ?>
                      <table>
                          <tr>
                              <th>Name</th>
                              <th>Sponsor</th>
                              <th>Age</th>
                              <th>Game</th>
                              <th>Main Character</th>
                          </tr>
                      <?php
                          while($row=$result->fetch_assoc()){?>
                              <tr>
                                  <td><?php echo htmlspecialchars($row['name'])?></td>
                                  <td><?php echo htmlspecialchars($row['sponsor'])?></td>
                                  <td><?php echo htmlspecialchars($row['age'])?></td>
                                  <td><?php echo htmlspecialchars($row['game'])?></td>
                                  <td><?php echo htmlspecialchars($row['mainChar'])?></td>
                              </tr>
                  <?php
                          }
                  }
                  ?>
                      </table><?php
            }

            //Name and main search
            elseif((trim($name)!="") && (trim($main)!="") && (trim($game)=="")){
                  $sql = "SELECT player.name, sponsor.sponsorname, player.mainChar, tournament.tourneyname, player.game, tournament.placement FROM player INNER JOIN tournament INNER JOIN sponsor WHERE player.name=tournament.playername AND player.sponsor=sponsor.sponsorname AND player.name='" . $name . "' AND player.mainChar='" . $main . "'";
                  $result = $connection->query($sql);
                  if($result){
                      ?>
                      <table>
                          <tr>
                              <th>Name</th>
                              <th>Sponsor</th>
                              <th>Main Character</th>
                              <th>Tournament</th>
                              <th>Game</th>
                              <th>Placement</th>
                          </tr>
                      <?php
                          while($row=$result->fetch_assoc()){?>
                              <tr>
                                  <td><?php echo htmlspecialchars($row['name'])?></td>
                                  <td><?php echo htmlspecialchars($row['sponsorname'])?></td>
                                  <td><?php echo htmlspecialchars($row['mainChar'])?></td>
                                  <td><?php echo htmlspecialchars($row['tourneyname'])?></td>
                                  <td><?php echo htmlspecialchars($row['game'])?></td>
                                  <td><?php echo htmlspecialchars($row['placement'])?></td>
                              </tr>
                  <?php
                          }
                  }
                  ?>
                </table><?php
            }

            //Name and game search
            elseif((trim($name)!="") && (trim($main)=="") && (trim($game)!="")){
                  $sql = "SELECT player.name, sponsor.sponsorname, player.mainChar, tournament.tourneyname, player.game, tournament.placement FROM player INNER JOIN tournament INNER JOIN sponsor WHERE player.name=tournament.playername AND player.sponsor=sponsor.sponsorname AND player.name='" . $name . "' AND player.game='" . $game . "'";
                  $result = $connection->query($sql);
                  if($result){
                      ?>
                      <table>
                          <tr>
                              <th>Name</th>
                              <th>Sponsor</th>
                              <th>Main Character</th>
                              <th>Tournament</th>
                              <th>Game</th>
                              <th>Placement</th>
                          </tr>
                      <?php
                          while($row=$result->fetch_assoc()){?>
                              <tr>
                                  <td><?php echo htmlspecialchars($row['name'])?></td>
                                  <td><?php echo htmlspecialchars($row['sponsorname'])?></td>
                                  <td><?php echo htmlspecialchars($row['mainChar'])?></td>
                                  <td><?php echo htmlspecialchars($row['tourneyname'])?></td>
                                  <td><?php echo htmlspecialchars($row['game'])?></td>
                                  <td><?php echo htmlspecialchars($row['placement'])?></td>
                              </tr>
                  <?php
                          }
                  }
                  ?>
                </table><?php
            }

            //Main and game search
            elseif((trim($name)=="") && (trim($main)!="") && (trim($game)!="")){
                  $sql = "SELECT name, mainChar, game FROM player WHERE mainChar='" . $main . "' AND game='" . $game . "'";
                  $result = $connection->query($sql);
                  if($result){
                      ?>
                      <table>
                          <tr>
                              <th>Name</th>
                              <th>Main Character</th>
                              <th>Game</th>
                          </tr>
                      <?php
                          while($row=$result->fetch_assoc()){?>
                              <tr>
                                  <td><?php echo htmlspecialchars($row['name'])?></td>
                                  <td><?php echo htmlspecialchars($row['mainChar'])?></td>
                                  <td><?php echo htmlspecialchars($row['game'])?></td>
                              </tr>
                  <?php
                          }
                  }
                  ?>
                </table><?php
            }?>

        </section>
    </body>

  <!-- page footer -->
  <footer>
      <?php include('footer.php'); ?>
  </footer>
</html>

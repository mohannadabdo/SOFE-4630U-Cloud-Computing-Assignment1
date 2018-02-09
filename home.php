<?php
  include 'FootballData.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mohannad Schedule </title>
    <body style="background-color: lightblue;">
    	  <?php
                // Create instance of API class
                $api = new FootballData(); ?>
        <div class="container">
                <div class="page-header">
                    <h1>Mohannad Schedule</h1>
                </div>
              <?php 
              if (isset($_POST['findSchedule'])) {
				//echo "$_POST[matchday]\n";
				//echo "$_POST[team]\n";
				$search = $api->searchTeam(urlencode($_POST[team]));
				 $team = $api->getTeamById($search->teams[0]->id);
				 $crestUrl= $team->_payload->crestUrl;
			    echo "<img src=\"$crestUrl\" height=100px width=100px/>";
			}

              ?>

                <?php
                
                // fetch and dump summary data for premier league' season 2017/18
                $soccerseason = $api->getSoccerseasonById(445);
                echo "<p><hr><p>"; ?>
                <h3>Fixtures for matchday <?php echo $_POST[matchday]; ?> of <?php echo $soccerseason->payload->caption; ?></h3>
                <table class="table table-striped">
                    <tr>
                    <th>HomeTeam</th>
                    <th></th>
                    <th>AwayTeam</th>
                    <th colspan="3">Result</th>
                    <th>Date</th>
                    </tr>

                    <?php 
                    
                  
                    
                    foreach ($soccerseason->getFixturesByMatchday($_POST[matchday]) as $fixture) { ?>
                    <tr>
                        <td><?php echo $fixture->homeTeamName; ?></td>
                        <td>-</td>
                        <td><?php echo $fixture->awayTeamName; ?></td>
                        <td><?php echo $fixture->result->goalsHomeTeam; ?></td>
                        <td>:</td>
                        <td><?php echo $fixture->result->goalsAwayTeam; ?></td>
                        <td><?php echo $fixture->date; ?></td>
                    </tr>
                    <?php } ?>
                </table>

            <?php
                echo "<p><hr><p>";
                // search for desired team
                $searchQuery = $api->searchTeam(urlencode($_POST[team]));
                // var_dump searchQuery and inspect for results

                $response = $api->getTeamById($searchQuery->teams[0]->id);
                $fixtures = $response->getFixtures('')->fixtures;
            ?>
                <h3>All matches of <?php echo $_POST[team] ?>:</h3>
                <table class="table table-striped">
                    <tr>
                        <th>HomeTeam</th>
                        <th></th>
                        <th>AwayTeam</th>
                        <th colspan="3">Result</th>
                        <th>Date</th>
                    </tr>
                    <?php foreach ($fixtures as $fixture) { ?>
                    <tr>
                        <td><?php echo $fixture->homeTeamName; ?></td>
                        <td>-</td>
                        <td><?php echo $fixture->awayTeamName; ?></td>
                        <td><?php echo $fixture->result->goalsHomeTeam; ?></td>
                        <td>:</td>
                        <td><?php echo $fixture->result->goalsAwayTeam; ?></td>
                        <td><?php echo $fixture->date; ?></td>
                    </tr>
                    <?php } ?>
                </table>



            <?php
                echo "<p><hr><p>";
                // fetch players for a specific team
                $team = $api->getTeamById($searchQuery->teams[0]->id);
            ?>
            <h3>Players of <?php echo $team->_payload->name; ?></h3>
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Jersey Number</th>
                    <th>Date of birth</th>
                </tr>
                <?php foreach ($team->getPlayers() as $player) { ?>
                <tr>
                    <td><?php echo $player->name; ?></td>
                    <td><?php echo $player->position; ?></td>
                    <td><?php echo $player->jerseyNumber; ?></td>
                    <td><?php echo $player->dateOfBirth; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    
    </body>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
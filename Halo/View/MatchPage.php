<?php

namespace View;
use Data\Match;

class MatchPage {

  private $match;

  function __construct($match) {
    $this->match = $match;
  }
  
  function getHtml() {
    ob_start();
?>
<div class="jumbotron-green container-fluid">
  <div class="row">
   <div class="col-md-12 p-5">
      <div class="text-white">
        <div class=""><h2>Match details</h2></div>
        <h4>Player list</h4>
        <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Player</th>
            <th scope="col">Action</th>
            <th scope="col">Kills</th>
            <th scope="col">Deaths</th>
            <th scope="col">K/D</th>
            <th scope="col">Shots Fired</th>
            <th scope="col">Shots Landed</th>
            <th scope="col">Accuracy</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($this->match->getPlayerList() as $player) { ?>
            <tr>
            <th scope="row"><?php echo $player->getGamerTag()?></th>
            <td><button type="button" data-gamertag="<?php echo $player->getGamerTag()?>" class="btn getStats btn-outline-light">Get Stats</button></td>
            <td><?php echo $player->getTotalKills(); ?></td>
            <td><?php echo $player->getTotalDeaths(); ?></td>
            <td><?php
              if ($player->getTotalDeaths() == 0) { echo 0; } else {
                echo round($player->getTotalKills() / $player->getTotalDeaths(), 2);
              }
              ?>
            </td>
            <td><?php echo $player->getTotalShotsFired(); ?></td>
            <td><?php echo $player->getTotalShotsLanded(); ?></td>
            <td><?php  
              if ($player->getTotalShotsFired() == 0) { echo 0 . "%"; } else {
                echo round($player->getTotalShotsLanded() / $player->getTotalShotsFired() * 100 , 2) . '%'; 
              }
              ?>
            </td>
            </tr>
          <?php } ?>     
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<?php
    $content = ob_get_clean();
    return $content;
  }
  
  private function getStatForArenaProfile($arenaProfile) {
    ob_start();
?>    
  <div class="row pt-3">
    <div class="col-md-7">Total Kills</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalKills(); ?></div>
  </div>
  <div class="row pt-3">
    <div class="col-md-7">Total Deaths</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalDeaths(); ?></div>
  </div>
  <div class="row pt-3">
    <div class="col-md-7"><abbr title="Kill Death Ratio">KDR</abbr></div>
    <div class="col-md-5"><?php
    if ($arenaProfile->getTotalDeaths() == 0) { echo 0; } else {
     echo round($arenaProfile->getTotalKills() / $arenaProfile->getTotalDeaths(), 2);
    }
     ?></div>
  </div>
  <div class="row pt-3">
    <div class="col-md-7">Total Shots Fired</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalShotsFired(); ?></div>
  </div>
  <div class="row pt-3">
    <div class="col-md-7">Total Shots Landed</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalShotsLanded(); ?></div>
  </div>
  <div class="row pt-3">
    <div class="col-md-7">Accuracy</div>
    <div class="col-md-5"><?php  
    if ($arenaProfile->getTotalShotsFired() == 0) { echo 0 . "%"; } else {
      echo round($arenaProfile->getTotalShotsLanded() / $arenaProfile->getTotalShotsFired() * 100 , 2) . '%'; 
    }
    ?></div>
  </div>
<?php
    $content = ob_get_clean();
    return $content;
  }
}
?>
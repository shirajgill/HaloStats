<?php

namespace View;
use Data\ArenaProfile;

class ProfilePage {

  private $overallStats;
  private $huskyRaidStats;
  private $superFiestaStats;
  private $infectionStats;

  function __construct($overallStats, $huskyRaidStats, $superFiestaStats, $infectionStats) {
    $this->overallStats = $overallStats;
    $this->huskyRaidStats = $huskyRaidStats;
    $this->superFiestaStats = $superFiestaStats;
    $this->infectionStats = $infectionStats;
  }
  
  function getHtml() {
    ob_start();
?>
<div class="jumbotron-green container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="jumbotron-white rounded image-with-content mt-2">
        <img class="pl-4 pt-5 img-fluid" src="data:image/png;base64, <?php echo $this->overallStats->getSpartanImage(); ?>" alt="Card image cap"/>
        <div class="content-image h5">          
          <?php echo $this->overallStats->getGamerTag(); ?>
          <span class="float-right">SR <?php echo $this->overallStats->getSpartanRank(); ?></span>
        </div>

          <img class="content-image-top m-1 img-fluid border border-3 border-success rounded-circle" style="width: 100px;" src="data:image/png;base64, <?php echo $this->overallStats->getSpartanEmblem(); ?>" alt="Card image cap"/>
        
      </div>
    </div>
    <div class="col-md-8">
      <div class="text-white h6">
        <div class=""><h2>Stats</h2></div>
        <ul class="nav nav-tabs" id="statTabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-white" id="overall-tab" data-toggle="tab" href="#overall" role="tab" aria-controls="home" aria-selected="true">Overall</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" id="husky-tab" data-toggle="tab" href="#husky" role="tab" aria-controls="profile" aria-selected="false">Husky Raid</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" id="superFiesta-tab" data-toggle="tab" href="#superFiesta" role="tab" aria-controls="contact" aria-selected="false">Super Fiesta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" id="infection-tab" data-toggle="tab" href="#infection" role="tab" aria-controls="contact" aria-selected="false">Infection</a>
          </li>
        </ul>
        <div class="tab-content" id="statTabsContent">
          <div class="tab-pane fade show active" id="overall" role="tabpanel" aria-labelledby="home-tab">
            <?php echo $this->getStatForArenaProfile($this->overallStats); ?>
          </div>
          <div class="tab-pane fade" id="husky" role="tabpanel" aria-labelledby="profile-tab">
            <?php echo $this->getStatForArenaProfile($this->huskyRaidStats); ?>
          </div>
          <div class="tab-pane fade" id="superFiesta" role="tabpanel" aria-labelledby="contact-tab">
            <?php echo $this->getStatForArenaProfile($this->superFiestaStats); ?>
          </div>
          <div class="tab-pane fade" id="infection" role="tabpanel" aria-labelledby="contact-tab">
            <?php echo $this->getStatForArenaProfile($this->infectionStats); ?>
          </div>
        </div>
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
  <div class="row py-2 hoverDiv">
    <div class="col-md-7">Total Kills</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalKills(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7">Total Deaths</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalDeaths(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7"><abbr title="Kill Death Ratio">KDR</abbr></div>
    <div class="col-md-5"><?php
    if ($arenaProfile->getTotalDeaths() == 0) { echo 0; } else {
     echo round($arenaProfile->getTotalKills() / $arenaProfile->getTotalDeaths(), 2);
    }
     ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7">Total Shots Fired</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalShotsFired(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7">Total Shots Landed</div>
    <div class="col-md-5"><?php echo $arenaProfile->getTotalShotsLanded(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7">Accuracy</div>
    <div class="col-md-5"><?php  
    if ($arenaProfile->getTotalShotsFired() == 0) { echo 0 . "%"; } else {
      echo round($arenaProfile->getTotalShotsLanded() / $arenaProfile->getTotalShotsFired() * 100 , 2) . '%'; 
    }
    ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7 ">Total Games Completed</div>
    <div class="col-md-5 "><?php echo $arenaProfile->getTotalGamesPlayed(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7 ">Total Games Won</div>
    <div class="col-md-5 "><?php echo $arenaProfile->getTotalGamesWon(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7 ">Total Games Lost</div>
    <div class="col-md-5 "><?php echo $arenaProfile->getTotalGamesLost(); ?></div>
  </div>
  <div class="row py-2 hoverDiv">
    <div class="col-md-7">Win %</div>
    <div class="col-md-5"><?php 
    if ($arenaProfile->getTotalGamesPlayed() == 0) { echo 0 . "%"; } else {
      echo round($arenaProfile->getTotalGamesWon() / $arenaProfile->getTotalGamesPlayed() * 100, 2) . "%"; 
    }
    ?></div>
  </div>
<?php
    $content = ob_get_clean();
    return $content;
  }
}
?>
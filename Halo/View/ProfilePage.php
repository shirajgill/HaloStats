<?php

namespace View;
use Data\Profile;

class ProfilePage {

  private $profile;

  function __construct($profile) {
    $this->profile = $profile;
  }
  
  function getHtml() {
    ob_start();
?>
<div class="row no-gutters bg-info">
  <div class="col-md-2 pr-2 bg-dark text-white">
    <div class="pl-2 pt-1">
      <img class="border border-white rounded"src="data:image/png;base64, <?php echo $this->profile->getSpartanImage(); ?>" alt="Card image cap">
      <h5><?php echo $this->profile->getGamerTag(); ?></h5>
      <p class="h4">SR <?php echo $this->profile->getSpartanRank(); ?></p>
    </div>
  </div>
  <div class="col-md-10">
    <div class="card text-white bg-info">
      <div class="card-header"><h2>Stats</h2></div>
      <div class="card-body">
        <div class="row border-bottom border-white">
          <div class="col-md-7">Total Kills</div>
          <div class="col-md-5"><?php echo $this->profile->getTotalKills(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7">Total Deaths</div>
          <div class="col-md-5"><?php echo $this->profile->getTotalDeaths(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7"><abbr title="Kill Death Ratio">KDR</abbr></div>
          <div class="col-md-5"><?php echo round($this->profile->getTotalKills() / $this->profile->getTotalDeaths(), 2); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7">Total Shots Fired</div>
          <div class="col-md-5"><?php echo $this->profile->getTotalShotsFired(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7">Total Shots Landed</div>
          <div class="col-md-5"><?php echo $this->profile->getTotalShotsLanded(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7">Accuracy</div>
          <div class="col-md-5"><?php echo round($this->profile->getTotalShotsLanded() / $this->profile->getTotalShotsFired() * 100 , 2) . '%'; ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7 ">Total Games Completed</div>
          <div class="col-md-5 "><?php echo $this->profile->getTotalGamesPlayed(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7 ">Total Games Won</div>
          <div class="col-md-5 "><?php echo $this->profile->getTotalGamesWon(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7 ">Total Games Lost</div>
          <div class="col-md-5 "><?php echo $this->profile->getTotalGamesLost(); ?></div>
        </div>
        <div class="row border-bottom border-white">
          <div class="col-md-7">Win %</div>
          <div class="col-md-5"><?php echo round($this->profile->getTotalGamesWon() / $this->profile->getTotalGamesPlayed() * 100, 2) . "%"; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    $content = ob_get_clean();
    return $content;
  }
}
?>
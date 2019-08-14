<?php

namespace View;
use Data\ArenaProfile;

class ComparePage {

  private $user1;
  private $user2;

  function __construct($user1, $user2) {
    $this->user1 = $user1;
    $this->user2 = $user2;
  }
  
  function getHtml() {
    ob_start();
?>
<div class="jumbotron-green container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="jumbotron-white rounded image-with-content mt-2">
        <img class="pl-4 pt-5 img-fluid" src="data:image/png;base64, <?php echo $this->user1->getSpartanImage(); ?>" alt="Card image cap"/>
        <div class="content-image h5">          
          <?php echo $this->user1->getGamerTag(); ?>
          <span class="float-right">SR <?php echo $this->user1->getSpartanRank(); ?></span>
        </div>

          <img class="content-image-top m-1 img-fluid border border-3 border-success rounded-circle" style="width: 100px;" src="data:image/png;base64, <?php echo $this->user1->getSpartanEmblem(); ?>" alt="Card image cap"/>
        
      </div>
    </div>
    <div class="col-md-6">
      <div class="text-white h6">
        <div class=""><h2>Stats</h2></div>
        <div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalKills(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Kills</span>
            </div>
              <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalKills(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalDeaths(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Deaths</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalDeaths(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php  if ($this->user1->getTotalDeaths() == 0) { echo 0; } else {
            echo round($this->user1->getTotalKills() / $this->user1->getTotalDeaths(), 2);
            } ?>
            </div>
            <div class="col-md-4 text-center">
              <span class=""><abbr title="Kill Death Ratio">KDR</abbr></span>
            </div> 
            <div class="col-md-4"> 
              <span class="float-right"><?php if ($this->user2->getTotalDeaths() == 0) { echo 0; } else {
            echo round($this->user2->getTotalKills() / $this->user2->getTotalDeaths(), 2);
            }  ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalShotsFired(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Shots Fired</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalShotsFired(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalShotsLanded(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Shots Landed</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalShotsLanded(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php  if ($this->user1->getTotalShotsFired() == 0) { echo 0 . "%"; } else {
            echo round($this->user1->getTotalShotsLanded() / $this->user1->getTotalShotsFired()* 100 , 2) . '%'; 
            } ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Accuracy</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php if ($this->user2->getTotalShotsFired() == 0) { echo 0 . "%"; } else {
            echo round($this->user2->getTotalShotsLanded() / $this->user2->getTotalShotsFired()* 100 , 2) . '%'; 
            }  ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalGamesPlayed(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Games Completed</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalGamesPlayed(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalGamesWon(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Games Won</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalGamesWon(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php echo $this->user1->getTotalGamesLost(); ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Total Games Lost</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php echo $this->user2->getTotalGamesLost(); ?></span>
            </div>
          </div>
          <div class="row py-2 hoverDiv">
            <div class="col-md-4">
              <?php  if ($this->user1->getTotalGamesPlayed() == 0) { echo 0 . '%'; } else {
            echo round($this->user1->getTotalGamesWon() / $this->user1->getTotalGamesPlayed()* 100 , 2) . '%'; 
            } ?>
            </div>
            <div class="col-md-4 text-center">
              <span class="">Win %</span>
            </div>
            <div class="col-md-4">
              <span class="float-right"><?php if ($this->user2->getTotalGamesPlayed() == 0) { echo 0 . '%'; } else {
            echo round($this->user2->getTotalGamesWon() / $this->user2->getTotalGamesPlayed()* 100 , 2) . '%'; 
            }  ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="jumbotron-white rounded image-with-content mt-2">
        <img class="pl-4 pt-5 img-fluid" src="data:image/png;base64, <?php echo $this->user2->getSpartanImage(); ?>" alt="Card image cap"/>
        <div class="content-image h5">          
          <?php echo $this->user2->getGamerTag(); ?>
          <span class="float-right">SR <?php echo $this->user2->getSpartanRank(); ?></span>
        </div>

          <img class="content-image-top m-1 img-fluid border border-3 border-success rounded-circle" style="width: 100px;" src="data:image/png;base64, <?php echo $this->user2->getSpartanEmblem(); ?>" alt="Card image cap"/>
        
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
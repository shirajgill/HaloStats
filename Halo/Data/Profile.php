<?php

namespace Data;

class Profile implements \JsonSerializable {
  private $gamerTag;
  private $spartanImage;
  private $spartanEmblem;
  private $totalKills;
  private $totalDeaths;
  private $totalShotsFired;
  private $totalShotsLanded;
  private $spartanRank;
  
  function __construct($gamerTag) {
    $this->gamerTag = $gamerTag;
  }
  
  function jsonSerialize() {
    $vars = get_object_vars($this);
    return $vars;
  }

  function getGamerTag(){
    return $this->gamerTag;
  }
  function setSpartanImage($spartanImage) {
    $this->spartanImage = $spartanImage;
    return $this;
  }
  function getSpartanImage() {
    return $this->spartanImage;
  }
  function setSpartanEmblem($spartanEmblem) {
    $this->spartanEmblem = $spartanEmblem;
    return $this;
  }
  function getSpartanEmblem() {
    return $this->spartanEmblem;
  }
  function setTotalKills($totalKills) {
    $this->totalKills = $totalKills;
    return $this;
  }
  function getTotalKills() {
    return $this->totalKills;
  }
  function setTotalDeaths($totalDeaths) {
    $this->totalDeaths = $totalDeaths;
    return $this;
  }
  function getTotalDeaths() {
    return $this->totalDeaths;
  }
  function setTotalShotsFired($totalShotsFired) {
    $this->totalShotsFired = $totalShotsFired;
    return $this;
  }
  function getTotalShotsFired() {
    return $this->totalShotsFired;
  }
  function setTotalShotsLanded($totalShotsLanded) {
    $this->totalShotsLanded = $totalShotsLanded;
    return $this;
  }
  function getTotalShotsLanded() {
    return $this->totalShotsLanded;
  }
  function setSpartanRank($spartanRank) {
    $this->spartanRank = $spartanRank;
    return $this;
  }
  function getSpartanRank() {
    return $this->spartanRank;
  }
  
}
?>
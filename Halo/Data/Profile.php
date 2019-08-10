<?php

namespace Data;

class Profile {
  private $gamerTag;
  private $spartanImage;
  private $spartanEmblem;
  private $totalKills;
  private $totalDeaths;
  private $totalShotsFired;
  private $totalShotsLanded;
  private $totalGamesPlayed;
  private $totalGamesWon;
  private $totalGamesLost;
  private $totalTimePlayed;
  private $spartanRank;
  
  function __construct($gamerTag) {
    $this->gamerTag = $gamerTag;
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
  function setTotalGamesPlayed($totalGamesPlayed) {
    $this->totalGamesPlayed = $totalGamesPlayed;
    return $this;
  }
  function getTotalGamesPlayed() {
    return $this->totalGamesPlayed;
  }
  function setTotalGamesWon($totalGamesWon) {
    $this->totalGamesWon = $totalGamesWon;
    return $this;
  }
  function getTotalGamesWon() {
    return $this->totalGamesWon;
  }
  function setTotalGamesLost($totalGamesLost) {
    $this->totalGamesLost = $totalGamesLost;
    return $this;
  }
  function getTotalGamesLost() {
    return $this->totalGamesLost;
  }
  function setTotalTimePlayed($totalTimePlayed) {
    $this->totalTimePlayed = $totalTimePlayed;
    return $this;
  }
  function getTotalTimePlayed() {
    return $this->totalTimePlayed;
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
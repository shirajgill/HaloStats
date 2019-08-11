<?php

namespace Data;
use Data\Profile;

class ArenaProfile extends Profile {
 
  private $totalGamesPlayed;
  private $totalGamesWon;
  private $totalGamesLost;
  private $totalTimePlayed;
  
  function __construct($gamerTag) {
    parent::__construct($gamerTag);
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
}
?>
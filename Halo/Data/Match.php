<?php

namespace Data;
use Profile;

class Match {
  private $requesterGamerTag;
  private $playerList;
  private $score;
  
  function __construct($gamerTag) {
    $this->requesterGamerTag = $gamerTag;
  }
  
  function getRequesterGamerTag() {
    return $this->requesterGamerTag;

  }
  function addToPlayerList($player) {
    return $this->playerList[] = $player;
  }

  function getPlayerList() {
    return $this->playerList;
  }

  function setScore($score) {
    $this->score = $score;
    return $this;
  }
  
  function getScore() {
    return $this->score;
  }
}
?>
<?php

namespace Data;
use Profile;

class Match implements \JsonSerializable {
  private $requesterGamerTag;
  private $matchId;
  private $mapImage;
  private $playdate;
  private $mapId;
  private $playerList;
  private $scores;
  private $resultOfMatch;
  
  function __construct($gamerTag, $matchId, $mapId, $playdate) {
    $this->requesterGamerTag = $gamerTag;
    $this->matchId = $matchId;
    $this->mapId = $mapId;
    $date = date_create($playdate);
    $this->playdate = date_format($date, 'Y-m-d  H:i');
  }
  
  function jsonSerialize() {
    $vars = get_object_vars($this);
    return $vars;
  }
  
  function getRequesterGamerTag() {
    return $this->requesterGamerTag;
  }

  function getMatchId() {
    return $this->matchId;
  }
  function getMapId() {
    return $this->matchId;
  }
  function getPlaydate() {
    return $this->playdate;
  }
  function getMapImage() {
    return $this->mapImage;
  }

  function setMapImage($mapImage) {
    $this->mapImage = $mapImage;
    return $this;
  }
  function getResultOfMatch() {
    return $this->resultOfMatch;
  }

  function setResultOfMatch($resultOfMatch) {
    $this->resultOfMatch = $resultOfMatch;
    return $this;
  }
  function addToPlayerList($player) {
    return $this->playerList[] = $player;
  }

  function getPlayerList() {
    return $this->playerList;
  }

  function addScore($score, $teamId) {
    $this->scores[$teamId] = $score;
    return $this;
  }
  
  function getScore() {
    return $this->scores;
  }
}
?>
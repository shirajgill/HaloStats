<?php

use DAO\API;
use Data\ArenaProfile;
use View\ProfilePage;
use View\MatchPage;
use View\ComparePage;

function homePage () {
  include "helloWorld.php";
}

function getPlayerProfilePage() {
  $player = $_POST["gamertag"];
  $overallProfile = API::getPlayerOverallStats($player);
  $huskyProfile = API::getPlayerHuskyRaidStats($player);
  $superFiestaProfile = API::getPlayerSuperFiestaStats($player);
  $infectionProfile = API::getPlayerInfectionStats($player);
  $profilePage = new ProfilePage($overallProfile, $huskyProfile, $superFiestaProfile, $infectionProfile);
  $matches = API::getPlayerMatches($player);

  $ajaxResponse = array(
    "profilePage" => $profilePage->getHtml(),
    "matches" => json_encode($matches),
    "matchInfo" =>  null
  );
  echo json_encode($ajaxResponse); 
  exit();
}

function getMatchPage() {
  $matchId = $_POST["matchId"];
  $match = API::getMatchDetails($matchId);
  $matchPage = new MatchPage($match);
  $ajaxResponse = $matchPage->getHtml();
  echo json_encode($ajaxResponse); 
  exit();
}

function getComparePage() {
  $user1 = $_POST["user1"];
  $user2 = $_POST["user2"];
  $user1Profile = API::getPlayerOverallStats($user1);
  API::flushStats();
  $user2Profile = API::getPlayerOverallStats($user2);
  $comparePage = new ComparePage($user1Profile, $user2Profile);
  $ajaxResponse = $comparePage->getHtml();
  echo json_encode($ajaxResponse); 
  exit();
}

?>
<?php

use DAO\API;
use Data\ArenaProfile;
use View\ProfilePage;

// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
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

?>
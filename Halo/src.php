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
  $ajaxResponse = array(
    "profilePage" => (new ProfilePage($overallProfile, $huskyProfile, $superFiestaProfile, $infectionProfile))->getHtml()
  );
  echo json_encode($ajaxResponse); 
  exit();
}

?>
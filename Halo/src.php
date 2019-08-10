<?php

use DAO\API;
use Data\Profile;
use View\ProfilePage;

// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
function homePage () {
  include "helloWorld.php";
}

function getPlayerProfilePage() {
  $player = $_POST["gamertag"];
  $profile = API::getPlayerProfile($player);
  $ajaxResponse = array(
    "profilePage" => (new ProfilePage($profile))->getHtml()
  );
  echo json_encode($ajaxResponse); 
  exit();
}

?>
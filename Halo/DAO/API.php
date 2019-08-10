<?php

namespace DAO;
use Data\Profile;

class API {

  private static $apiKey = "818de354856940f3845a13ddcc70672e";

  public static function getPlayerProfile($gamerTag) {
    echo json_encode($gamerTag); 
    exit();
    $response = Self::getPlayerStats($gamerTag);
    $profile = new Profile($gamerTag); 
    $profile->setTotalKills($response->ArenaStats->TotalKills)
      ->setTotalDeaths($response->ArenaStats->TotalDeaths)
      ->setTotalShotsFired($response->ArenaStats->TotalShotsFired)
      ->setTotalShotsLanded($response->ArenaStats->TotalShotsLanded)
      ->setTotalGamesPlayed($response->ArenaStats->TotalGamesCompleted)
      ->setTotalGamesWon($response->ArenaStats->TotalGamesWon)
      ->setTotalGamesLost($response->ArenaStats->TotalGamesLost)
      ->setTotalTimePlayed($response->ArenaStats->TotalTimePlayed)
      ->setSpartanRank($response->SpartanRank)
      ->setSpartanImage(Self::getPlayerImage($gamerTag))
      ->setSpartanEmblem(Self::getPlayerEmblem($gamerTag));
    return $profile;
  }
  
  private static function getPlayerStats($gamerTag) {
    $gamerTag = urlencode($gamerTag);
    $url = "https://www.haloapi.com/stats/h5/servicerecords/arena?players=$gamerTag";
    $response = self::queryAPI($url);
    $response = json_decode($response)->Results[0]->Result;
    return $response;
  }

  private static function getPlayerImage($gamerTag) {
    $gamerTag = urlencode($gamerTag);
    $url = "https://www.haloapi.com/profile/h5/profiles/$gamerTag/spartan?size=190";
    $response = self::queryAPI($url);
    $response = base64_encode($response);
    return $response;
  }

  private static function getPlayerEmblem($gamerTag) {
    $gamerTag = urlencode($gamerTag);
    $url = "https://www.haloapi.com/profile/h5/profiles/$gamerTag/emblem?size=95";
    $response = self::queryAPI($url);
    $response = base64_encode($response);
    return $response;
  }

  private static function queryAPI($url) {
    //Create a stream with these options
    $opts = array(
      'http'=> array(
        'method' => "GET",
        'header' => "Ocp-Apim-Subscription-Key: " . self::$apiKey
      )
    );
    $context = stream_context_create($opts);

    //Query the API using the HTTP headers set above
    $apiResponse = file_get_contents($url, false, $context);    
    return $apiResponse;
  }
}
?>
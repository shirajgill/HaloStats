<?php

namespace DAO;
use Data\ArenaProfile;
use Data\Match;
use Data\Profile;

class API {

  private static $apiKey = "818de354856940f3845a13ddcc70672e";
  private static $huskyRaidId = "f7473936-59d7-4099-81c4-316f2ed9f42c";
  private static $infectionId = "84d7dafa-0419-4e6f-a990-4987ae57611c";
  private static $superFiestaId = "f0c9ef9a-48bd-4b24-9db3-2c76b4e23450";
  private static $arenaStats = null;

  public static function getPlayerOverallStats($gamerTag) {
    $stats = Self::getPlayerStatsForPlaylist($gamerTag);
    $profile = Self::createProfileForPlaylistStat($gamerTag, $stats);
    $profile->setSpartanRank(json_decode(Self::$arenaStats)->Results[0]->Result->SpartanRank)
      ->setSpartanImage(Self::getPlayerImage($gamerTag))
      ->setSpartanEmblem(Self::getPlayerEmblem($gamerTag));
    return $profile;
  }

  public static function getPlayerHuskyRaidStats($gamerTag) {
    $playlistStat = Self::getPlayerStatsForPlaylist($gamerTag, Self::$huskyRaidId);
    $profile = Self::createProfileForPlaylistStat($gamerTag, $playlistStat); 
    return $profile;
  }

  public static function getPlayerSuperFiestaStats($gamerTag) {
    $playlistStat = Self::getPlayerStatsForPlaylist($gamerTag, Self::$superFiestaId);
    $profile = Self::createProfileForPlaylistStat($gamerTag, $playlistStat); 
    return $profile;
  }

  public static function getPlayerInfectionStats($gamerTag) {
    $playlistStat = Self::getPlayerStatsForPlaylist($gamerTag, Self::$infectionId);
    $profile = Self::createProfileForPlaylistStat($gamerTag, $playlistStat); 
    return $profile;
  }

  private static function createProfileForPlaylistStat($gamerTag, $playlistStat) {
    $profile = new ArenaProfile($gamerTag); 
    if ($playlistStat == null) {
      $playlistStat = (array)$playlistStat;
      $playlistStat["TotalKills"] = 0;
      $playlistStat["TotalDeaths"] = 0;
      $playlistStat["TotalShotsFired"] = 0;
      $playlistStat["TotalShotsLanded"] = 0;
      $playlistStat["TotalGamesCompleted"] = 0;
      $playlistStat["TotalGamesWon"] = 0;
      $playlistStat["TotalGamesLost"] = 0;
      $playlistStat["TotalTimePlayed"] = 0;
      $playlistStat = (object)$playlistStat;
      
    }
    $profile->setTotalKills($playlistStat->TotalKills)
      ->setTotalDeaths($playlistStat->TotalDeaths)
      ->setTotalShotsFired($playlistStat->TotalShotsFired)
      ->setTotalShotsLanded($playlistStat->TotalShotsLanded)
      ->setTotalGamesPlayed($playlistStat->TotalGamesCompleted)
      ->setTotalGamesWon($playlistStat->TotalGamesWon)
      ->setTotalGamesLost($playlistStat->TotalGamesLost)
      ->setTotalTimePlayed($playlistStat->TotalTimePlayed);
    return $profile;
  }

  private static function getPlayerStatsForPlaylist($gamerTag, $playlistId = null) {
    $gamerTag = urlencode($gamerTag);
    $url = "https://www.haloapi.com/stats/h5/servicerecords/arena?players=$gamerTag&seasonId=NonSeasonal";
    if (Self::$arenaStats == null) {
      $response = self::queryAPI($url);
      Self::$arenaStats = $response;
    } else {
      $response = Self::$arenaStats;
    }
    $response = json_decode($response)->Results[0]->Result;

    if ($playlistId == null) {
      return $response->ArenaStats;
    }

    foreach ($response->ArenaStats->ArenaPlaylistStats as $playlistStat) {
      if ($playlistStat->PlaylistId == $playlistId) {
        return $playlistStat;
      }
    }

    
    return null;
  }

  private static function getPlayerImage($gamerTag) {
    $gamerTag = urlencode($gamerTag);
    $url = "https://www.haloapi.com/profile/h5/profiles/$gamerTag/spartan?size=512";
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

  public static function getPlayerMatches($gamerTag) {
    $encodedGamerTag = urlencode($gamerTag);
    $url = "https://www.haloapi.com/stats/h5/players/$encodedGamerTag/matches?modes=arena&count=10&include-times=true";
    $response = self::queryAPI($url);
    $response = json_decode($response)->Results;
    $matches = array();
    foreach ($response as $match) {
      $currMatch = new Match($gamerTag, $match->Id->MatchId, $match->MapId, $match->MatchCompletedDate->ISO8601Date);
      foreach ($match->Teams as $team) {
        $currMatch->addScore($team->Score, $team->Id);
      }
      $currMatch->setResultOfMatch($match->Players[0]->Result);
      $playerProfile = new Profile($gamerTag);
      $playerProfile->setTotalKills($match->Players[0]->TotalKills);
      $playerProfile->setTotalDeaths($match->Players[0]->TotalDeaths);
      $currMatch->addToPlayerList($playerProfile);
      $matches[] = $currMatch;
    }
    return $matches;
  }

  public static function getMatchDetails($matchId) {
    $matchId = urlencode($matchId);
    $url = "https://www.haloapi.com/stats/h5/arena/matches/$matchId";
    $response = self::queryAPI($url);
    $response = json_decode($response);
    $currMatch = new Match(null, $matchId, $response->MapId, null);

    foreach ($response->PlayerStats as $player) {
      $profile = new Profile($player->Player->Gamertag);
      $profile->setTotalKills($player->TotalKills)
      ->setTotalDeaths($player->TotalDeaths)
      ->setTotalShotsFired($player->TotalShotsFired)
      ->setTotalShotsLanded($player->TotalShotsLanded);
      $currMatch->addToPlayerList($profile);
    }
    return $currMatch;
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
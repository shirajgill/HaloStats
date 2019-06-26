<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
function helloWorld () {
  include "helloWorld.php";
}

function lowercase () {
  echo strtoupper($_POST["textToLower"]);
}

function getPlayerStats () {
  $player = $_POST["gamertag"];
// Create a stream
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>'Ocp-Apim-Subscription-Key: 818de354856940f3845a13ddcc70672e'
  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents("https://www.haloapi.com/stats/h5/servicerecords/arena?players=hsingh97", false, $context);
print_r($file); die;
$request = new Http_Request2("https://www.haloapi.com/stats/h5/servicerecords/arena?players=$player");
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => '818de354856940f3845a13ddcc70672e',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
}
?>

<?php


?>
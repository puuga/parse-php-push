<?php
require 'autoload.php';
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseClient;


$app_id = "PdbY0J1f0LBXJoEWNeID0nIiVlO7b5dpcVJwVicd";
$rest_key = "ouDSEZym7CnCABiAg1TBkxue51oICXXG6DJyJWO7";
$master_key = "VcHsKijE5vqFBA8qPwtoU4qXZxEYwGUV19hYvfkE";

ParseClient::initialize( $app_id, $rest_key, $master_key );

if ( !isset($_GET["message"]) || $_GET["rlskey"]!=="VJwVicd") {
  $result["result"] = "fail";
  $result["reason"] = "invalid key or blank message";
} else {
  // get data from query string
  $rlskey = $_GET["rlskey"];
  $message = $_GET["message"];
  if ( isset($_GET["title"]) ) {
    $title = $_GET["title"];
    $data = array("alert"=>$message, "title"=>$title);
  } else {
    $data = array("alert"=>$message);
  }

  // send push
  ParsePush::send(array(
    "channels" => [""],
    "data" => $data
  ));

  $result["result"] = "success";
  $result["title"] = $title;
  $result["message"] = $message;
}

header('Content-Type: application/json');
echo json_encode($result);

?>

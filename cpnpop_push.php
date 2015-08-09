<?php
require 'autoload.php';
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseClient;


$app_id = "ut71Hombs4drwmZCZ3Ez4cfU5fm19iiJkWSWe522";
$rest_key = "RffInDSP4HajHjIdp1xrPtkVphWxKaIKkmTba4q2";
$master_key = "x7V1uARnhcqc7TTILafCHvV0wZ8ECu66gu3A4gzN";

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

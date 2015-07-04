<?php
require 'autoload.php';
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseClient;

$data = array("alert" => "Hi! sent from php!","title"=>"Hello");

$app_id = "PdbY0J1f0LBXJoEWNeID0nIiVlO7b5dpcVJwVicd";
$rest_key = "ouDSEZym7CnCABiAg1TBkxue51oICXXG6DJyJWO7";
$master_key = "VcHsKijE5vqFBA8qPwtoU4qXZxEYwGUV19hYvfkE";

ParseClient::initialize( $app_id, $rest_key, $master_key );

ParsePush::send(array(
  "channels" => [""],
  "data" => $data
));

?>

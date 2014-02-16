<?php

session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$search = $_POST['searchTxt'];
$notweets = 30;
$consumerkey = "2FvSGE46fLj2Ii2lVjxqsg";
$consumersecret = "oVEChTNxcxlwevtU5Zl2dpznlm63op3lEksaOeOWzs";
$accesstoken = "38119965-vbIsp6zJrCexPxsuQ0hURLud8MpHg6ilTtRJsOGgX";
$accesstokensecret = "JdGCiONhnpHue6iujcc1zmAbu4M199UwhHCdJ0dmdS39s";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret)
{
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$search = str_replace("#", "%23", $search);
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=" . $search . "&count=" . $notweets);

echo json_encode($tweets);
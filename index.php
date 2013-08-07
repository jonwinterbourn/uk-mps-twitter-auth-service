<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth.php');
require_once('config.php');

$screen_name = "tweetminster";
//get param
if ($_GET["screenname"]) {
	$screen_name = $_GET["screenname"];
}

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, TOKEN, TOKEN_SECRET);

#$content = $connection->get('account/verify_credentials');
$content = $connection->get('statuses/user_timeline', array('screen_name' => $screen_name, 'exclude_replies' => 'true'));

#include('html.inc');
#print_r($content); 

$json = json_encode($content);
echo $json;

?>

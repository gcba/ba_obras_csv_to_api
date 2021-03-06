<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

# Include Instant API's function library.
require_once('class.csv-to-api.php');

# No Source file is given, just show documentation
if ( !isset( $_REQUEST['source'] ) ) {
  echo "<PRE>";
  require "README.md";
  die();
}
if (file_exists(__DIR__.'/config.php' )){
	$config = @require_once('config.php' );
} else {
	header( '501 Not Implemented' );
	die('ERROR: Configuration file config.php is missing.');
}

# Create a new instance of the Instant API class.
$api = new CSV_To_API($config);

# Intercept the requested URL and use the parameters within it to determine what data to respond with.
$api->parse_query();

# Gather the requested data from its CSV source, converting it into JSON, XML, or HTML.
$api->parse();

# Send the JSON to the browser.
echo $api->output();
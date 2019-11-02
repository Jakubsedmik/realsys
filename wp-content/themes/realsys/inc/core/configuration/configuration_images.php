<?php


define("IMAGE_QUALITY", 50);
define("DEFAULT_UPLOAD_TO", 'uploads/system_data/');
define("DEFAULT_UPLOAD_URL", BASE_URL . "wp-content/" . DEFAULT_UPLOAD_TO);
define("DEFAULT_IMAGE_SIZE", 'default');

$image_sizes = array(
	'listing' => array(
		'size' => array(400,600),
		'prefix' => 'listing'
	),
	'original' => array(
		'size' => 'original',
		'prefix' => 'original'
	),
	'default' => array(
		'size' => array(700,700),
		'prefix' => 'default'
	)
);
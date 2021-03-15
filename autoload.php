<?php
define('FOLDER_NAME', 'dit');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER_NAME . '/');
define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . FOLDER_NAME . '/');

include ROOT_DIR . 'includes/connection.php';
include ROOT_DIR . 'includes/helpers.php';

<?php
//require_once __DIR__ . '../../../vendor/autoload.php';
// Cargar las variables del archivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

/* ============================================================
 //////////////////////////- app -////////////
===============================================================*/

define("API_V",  strtolower($_ENV['API_V']));
define("APP_KEY",  $_ENV['APP_KEY']);
define("APP_TOKEN",  $_ENV['APP_TOKEN']);
define("APP_ID",  $_ENV['APP_ID']);
define("APP_HTTP_CACHE",  strtolower($_ENV['APP_HTTP_CACHE']));
define("MAX_TIME_HTTP_CACHE",  $_ENV['MAX_TIME_HTTP_CACHE']);

/* ============================================================
 //////////////////////////- EMAIL -////////////
===============================================================*/
define("SMTPSecure",  $_ENV['SMTPSecure']);
define("EMAIL_HOST",  $_ENV['EMAIL_HOST']);
define("APP_EMAIL",  $_ENV['APP_EMAIL']);
define("EMAIL_PASSWORD",  $_ENV['EMAIL_PASSWORD']);
define("EMAIL_PORT",  $_ENV['EMAIL_PORT']);

define("HR_KEY_EXP", $_ENV['HR_KEY_EXP']);
define("DD_KEY_EXP", $_ENV['DD_KEY_EXP']);
define("MP_ACCESS_TOKEN", $_ENV['MP_ACCESS_TOKEN']);
define("MP_PUBLIC_KEY", $_ENV['MP_PUBLIC_KEY']);

define("MAX_RATE_SEG", $_ENV['MAX_RATE_SEG']);
define("CLIENT_MAX_RATE_SEG", $_ENV['CLIENT_MAX_RATE_SEG']);
define("ACCESS_ORIGIN_URL", $_ENV['ACCESS_ORIGIN_URL']);

$_path = null;
if (substr($_ENV['APP_PATH'], -1) === "/") {
    $_path = substr($_ENV['APP_PATH'], 0, -1);
} else {
    $_path = $_ENV['APP_PATH'];
}
define("APP_PATH", $_path);

define("FOLDER_URL_IMG_ALMACEN", $_ENV["_FILE"]);

/* ============================================================
 //////////////////////////- config data base -////////////
===============================================================*/
define("ATTR_EMULATE_PREPARES", $_ENV['ATTR_EMULATE_PREPARES']); //

$ENV = array(
    "HOST"    => $_ENV['DB_HOST'],
    "DB_NAME" => $_ENV['DB_DATABASE'],
    "DB_USER" => $_ENV['DB_USERNAME'],
    "DB_PASS" => $_ENV['DB_PASSWORD'],
    "PORT"    => $_ENV['DB_PORT'],
);

define("DISTANCE_HOST", $ENV["HOST"]);
define("DISTANCE_DB_NAME", $ENV["DB_NAME"]);
define("DISTANCE_DB_USER", $ENV["DB_USER"]);
define("DISTANCE_DB_PASS", $ENV["DB_PASS"]);
define("DISTANCE_PORT", $ENV["PORT"]);

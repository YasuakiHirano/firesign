<?php
// PHPのエラーレベルを設定
error_reporting(0);

// タイムゾーンを指定
date_default_timezone_set('Asia/Tokyo');

// DB有無 1:使う 0:使わない
define(DB_USE, "1");

// MySql or Postgresql
define(DB_NAME, "Postgresql");

define(HOST_NAME, "localhost");
define(USER_NAME, "yasuaki");
define(PASSWORD, "*********");
define(DATABASE, "dbname");
header('Content-Type: text/html; charset=UTF-8');
define("SYSTEM_ROOT","/home/yasuaki/www/tools.codelike.info/firesign");
define("SITE_URL","http://tools.codelike.info/firesign/");
define("CLASS_FILE_DELIMTER","Ctl");
define("MODEL_FILE_DELIMTER","Mdl");
define("ACTION_DELIMTER","Act");
define("VIEW_DIR","./view/");
define("CSS_DIR","./css/");
define("JS_DIR","./js/");
define(NO_LOGIN_ROOT, "top");
define(LOGIN_ROOT, "main");


//共通クラス・共通部品等読み込み定義
require_once './core/fireSignCtl.php';
require_once './core/fireSignMdl.php';
require_once './lib/mysql.lib.php';
require_once './lib/pgsql.class.php';
require_once './lib/debug.lib.php';
require_once './lib/mail.lib.php';
require_once './lib/js.lib.php';

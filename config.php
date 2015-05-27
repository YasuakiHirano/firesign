<?php
header('Content-Type: text/html; charset=UTF-8');
define("SYSTEM_ROOT","/home/yasuaki/www/tools.codelike.info/firesign");
define("SITE_URL","http://tools.codelike.info/firesign/");
define("CLASS_FILE_DELIMTER","Ctl");
define("MODEL_FILE_DELIMTER","Mdl");
define("ACTION_DELIMTER","Act");
define("VIEW_DIR","./view/");
define("CSS_DIR","./css/");
define("JS_DIR","./js/");

//共通クラス・共通部品等読み込み定義
require_once './core/fireSignCtl.php';
require_once './core/fireSignMdl.php';
//require_once './lib/mysql.lib.php';
//require_once './lib/debug.lib.php';
//require_once './lib/mail.lib.php';
//require_once './lib/js.lib.php';

<?PHP
/**
 * @brief   定数を定義
 * @author  Y.Hirano@CodeLike
 */
/** ページ文字コードをUTF8に設定 */
header('Content-Type: text/html; charset="UTF-8"');
/** PHPのエラーレベルを設定 */
error_reporting(0);
/** タイムゾーンを指定 */
date_default_timezone_set('Asia/Tokyo');

define(HOST_NAME, "localhost");
define(USER_NAME, "postgres");
define(PASSWORD, "password");
define(DATABASE, "yasuaki");

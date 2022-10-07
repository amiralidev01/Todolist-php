<?php use JetBrains\PhpStorm\NoReturn;

defined('BASE_PATH') or die("Permission Denied!");

/**
 * @param $msg
 * @return void
 */
#[NoReturn] function diePage($msg): void
{
    echo $msg;
    die;
}

/**
 * @return bool
 */
function isAjaxRequest(): bool
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        //request is ajax
        return true;
    }
    return false;
}

/**
 * @param $var
 * @return void
 */
function dd($var): void
{
    echo "<pre style='color: #00ff1c; background: #000; z-index: 999; position: relative; padding: 37px; width: 1100px; margin: 30px auto; border-radius: 4px; border-left: 5px solid #f00; font-weight: bold; height: 400px;'>";
    var_dump($var);
    echo "</pre>";

}

function getFolderId($var)
{
//        ($_GET["folder_id"] == $folder->id) ? '' :'';
    return $_GET["folder_id"] == $var ? 'active' : '';
}
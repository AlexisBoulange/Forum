<?php

    namespace App;

    require_once "app/Autoloader.php";
    Autoloader::register();

    use App\Router;

    define('DS', DIRECTORY_SEPARATOR);              //DIRECTORY_SEPARATOR est une constante pré-définies tel que "/" ou "\"
    define('ROOT_DIR', '.'.DS);                     // ici on définit la racine tel que : ".\"
    define('PUBLIC_PATH', ROOT_DIR.'public'.DS);    // on définit le chemin vers le dossier public à l'aide de notre constante "ROOT_DIR" pré-définies tel que  ".\public\"
    define('CSS_PATH', PUBLIC_PATH.'css'.DS);       // on définit le chemin vers le dossier css à l'aide de notre constante "PUBLIC_PATH" pré-définies tel que  ".\public\css\"
    define('IMG_PATH', PUBLIC_PATH.'img'.DS);       // on définit le chemin vers le dossier img à l'aide de notre constante "PUBLIC_PATH" pré-définies tel que  ".\public\img\"
    define('VIEW_PATH', ROOT_DIR.'view'.DS);        // on définit le chemin vers le dossier view à l'aide de notre constante "ROOT_DIR" pré-définies tel que  ".\view\"
    define('CTRL_PATH', ROOT_DIR.'controller'.DS);  // on définit le chemin vers le dossier controller à l'aide de notre constante "ROOT_DIR" pré-définies tel que  ".\controller\"
    define('SERVICE_PATH', ROOT_DIR.'app'.DS);      // on définit le chemin vers le dossier app à l'aide de notre constante "ROOT_DIR" pré-définies tel que  ".\app\"


    $result = Router::handleRequest($_GET);

    ob_start();

    if(is_array($result) && array_key_exists('view', $result)){
        $data = isset($result['data']) ? $result['data'] : null;
        include VIEW_PATH.$result['view'];

    }else include VIEW_PATH."404.html";

    $page = ob_get_contents();
    ob_end_clean();

    include VIEW_PATH."layout.php";
    
    
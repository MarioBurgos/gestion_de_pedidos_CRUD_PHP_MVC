<?php 
require_once 'config/config.php';
require_once 'config/credentials.php';
require_once 'model/dbconnector.php';
/* Mediante GET se obtienen los parametros para navegar por la pagina.  Si no se reciben, carga los default */
if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

/* Declarar el path para cargar el controller */
$controller_path = './controller/'.$_GET["controller"].'.php';

/* Comprobar si el controller existe en el directorio */
if(!file_exists($controller_path)) $controller_path = 'controller/'.constant("DEFAULT_CONTROLLER").'.php';

/* Cargar el controlador por reflexion */
require_once $controller_path;
$controllerName = $_GET["controller"].'Controller';
$controller = new $controllerName();

/* Comprobar si el metodo existe en el controlador */
$dataToView["data"] = array();
if(method_exists($controller,$_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();


/* Load views */
require_once 'view/template/header.php';
require_once 'view/'.$controller->view.'.php';
require_once 'view/template/footer.php';

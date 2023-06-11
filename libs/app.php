<?php
// This class is used as a router to redirect the user to the specified url (controller).
require_once 'controllers/errors.php';
class App
{
    function __construct()
    {
        error_log('APP::construct-> no hay controlador especificado.');
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        if (empty($url[0])) {
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/' . $url[0] . '.php';
        if (file_exists($archivoController)) {
            // Require the controller
            require_once $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            // Validate url methods
            if (isset($url[1])) {
                // If there is a url method... Load method.
                if (method_exists($controller, $url[1])) {
                    // The method exists!
                    if (isset($url[2])) {
                        // Obtain the number of params
                        $nparam = count($url) - 2;
                        // Store the parameters
                        $params = [];
                        for ($i = 0; $i < $nparam; $i++) {
                            array_push($params, $url[$i] + 2);
                        }
                        // Pass the parameters to the controller.
                        $controller->{$url[1]}($params);
                    } else {
                        // The method does not have any more parameters. The method is rendered as it is.
                        $controller->{$url[1]}(); // () is added so PHP loads this sentence as a dynamic method.
                    }
                } else {
                    // Error, the method does not exist!. Call 404.
                    $controller = new Errors();
                    $controller->render();
                }
            } else {
                // There is no url method... Load default method.
                $controller->render();
            }
        } else {
            // The controller does not exist!. Call 404.
            $controller = new Errors();
            $controller->render();
        }
    }
}
?>
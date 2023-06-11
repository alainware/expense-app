<?php
class Controller
{
    public $view;
    public $model;
    function __construct()
    {
        $this->view = new View();
    }
    function loadModel($model)
    {
        $url = 'models/' . $model . 'Model.php';
        if (file_exists($url)) {
            require_once $url;
            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }
    function existPost($params) {
        foreach ($params as $param) {
            if(!isset($_POST[$param])) {
                error_log('Controller::existPost => The parameter does not exist!');
                return false;
            }
        }
        return true;
    }
    function existGet($params) {
        foreach ($params as $param) {
            if(!isset($_GET[$param])) {
                error_log('Controller::existGet => The parameter does not exist!');
                return false;
            }
        }
        return true;
    }
    function getGet($name) {
        return $_GET[$name];
    }
    function getPost($name) {
        return $_POST[$name];
    }
    function redirect($route, $messages) {
        $data = [];
        $params = '';
        foreach ($messages as $key => $message) {
            array_push($data, $key . '=' . $message);
        }
        $params = join('&', $data);
        if($params != '') {
            $params = '?' . $params;
        }
        header('Location: ' . constant('URL') . $route . $params);
    }
}
?>
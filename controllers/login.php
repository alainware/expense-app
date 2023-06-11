<?php
class Login extends Controller
{
    public $view;
    function __construct()
    {
        parent::__construct();
        error_log('Login::construct-> inicio de Login');
    }
    function render()
    {
        error_log('Login::render -> Start login index!');
        $this->view->render('login/index');
    }
}
?>
<?php
class Errors extends Controller {
    function __construct() {
        parent::__construct();
        error_log('Errors::construct -> start Errors.');
    }
    function render() {
        error_log('Errors::render -> Load the error page!.');
        $this->view->render('errors/index');
    }
}
?>
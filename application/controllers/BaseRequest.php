<?php

class BaseRequestController extends Yaf\Controller_Abstract{

    public function init(){
        Yaf\Dispatcher::getInstance()->autoRender(false);
    }

    public function returnJson($data, $status=true, $message='success'){
        $this->getView()->assign("status", $status);
        $this->getView()->assign("message", $message);
        $this->getView()->assign("data", $data);
        $this->getView()->display('common/response.html');
    }

    static public function defaultExceptionHandler($exception, $view) {
        $view->setScriptPath(APPLICATION_VIEWS);
        $view->assign("exception", $exception);
        $view->display('error/error_request.html');
    }

}

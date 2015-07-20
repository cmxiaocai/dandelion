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

}

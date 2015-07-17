<?php

class ProjectAjaxController extends Yaf\Controller_Abstract{

    public function readDirectoryAction(){
        
        $postdata = Ap_Dispatcher::getInstance()->getRequest()->getPost();
        if(!empty($postdata)){
            throw new Exception("错误的参数");
        }

        $ProjectEntity = new \services\project\Entity( $postdata['project_name'] );
        $VersionDepot  = new \services\versiondepot\Entity( $ProjectEntity );
        $version_code  = $VersionDepot->getDirectory($postdata['path']);

        $this->getView()->assign('version_code', $version_code);
        var_dump($version_code);
    }

}
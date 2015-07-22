<?php

class ProjectAjaxController extends BaseRequestController{

    public function init(){
        parent::init();
        if ($this->getRequest()->getMethod() != "POST") {
            throw new Exception('Request data error');
        }
        $project_name = $this->getRequest()->getPost("name");
        $this->project_path  = $this->getRequest()->getPost("path");
        $this->ProjectEntity = new \services\project\Entity( $project_name );
    }

    public function readDirectoryAction(){
        $VersionDepot  = new \services\versiondepot\Entity( $this->ProjectEntity );
        $version_code  = $VersionDepot->getDirectory($this->project_path);
        $version_code  = $VersionDepot->handleLengthByDirectory($version_code);
        $this->returnJson(array(
            'back' => dirname($this->project_path),
            'code' => $version_code
        ));
    }

    public function readFileContentAction(){
        $VersionDepot  = new \services\versiondepot\Entity( $this->ProjectEntity );
        $content  = $VersionDepot->getFileContent($this->project_path);
        $this->returnJson(array(
            'back'    => dirname($this->project_path),
            'content' => $content
        ));
    }

}
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
        $this->VersionDepot  = new \services\versiondepot\Entity( $this->ProjectEntity );
    }

    public function readDirectoryAction(){
        $version_dir = $this->VersionDepot->getDirectory($this->project_path);
        $version_dir = $this->VersionDepot->handleLengthByDirectory($version_dir);
        $this->returnJson(array(
            'back' => dirname($this->project_path),
            'code' => $version_dir
        ));
    }

    public function readFileContentAction(){
        $content = $this->VersionDepot->getFileContent($this->project_path);
        $this->returnJson(array(
            'back'    => dirname($this->project_path),
            'content' => $content
        ));
    }

}
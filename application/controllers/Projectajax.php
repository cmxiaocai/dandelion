<?php

class ProjectAjaxController extends BaseRequestController{

    public function readDirectoryAction(){
        if ($this->getRequest()->getMethod() != "POST") {
            throw new Exception();
        }
        $project_name  = $this->getRequest()->getPost("name");
        $project_path  = $this->getRequest()->getPost("path");
        $ProjectEntity = new \services\project\Entity( $project_name );
        $VersionDepot  = new \services\versiondepot\Entity( $ProjectEntity );
        $version_code  = $VersionDepot->getDirectory($project_path);
        $version_code  = $VersionDepot->HandleLengthByDirectory($version_code);
        $this->returnJson(array(
            'back' => dirname($project_path),
            'code' => $version_code
        ));
    }

    public function readFileContentAction(){
        if ($this->getRequest()->getMethod() != "POST") {
            throw new Exception();
        }
        $project_name  = $this->getRequest()->getPost("name");
        $project_path  = $this->getRequest()->getPost("path");
        $ProjectEntity = new \services\project\Entity( $project_name );
        $VersionDepot  = new \services\versiondepot\Entity( $ProjectEntity );
        $content  = $VersionDepot->getFileContent($project_path);
        $this->returnJson(array(
            'back'    => dirname($project_path),
            'content' => $content
        ));
    }

}
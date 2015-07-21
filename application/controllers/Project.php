<?php

class ProjectController extends Yaf\Controller_Abstract{

    public function versionAction($project_name){
        
        $ProjectEntity = new \services\project\Entity( $project_name );
        $VersionDepot  = new \services\versiondepot\Entity( $ProjectEntity );
        $version_list  = $VersionDepot->getBranchs();

        $this->getView()->assign('version_list', $version_list);
        $this->getView()->assign('version_path', $ProjectEntity->depo_path);
        $this->getView()->assign('project_name', $ProjectEntity->project_name);
    }

    public function publishAction($project_name){

        $this->getView()->assign('project_name', $project_name);
    }

    public function logAction($project_name){

        $this->getView()->assign('project_name', $project_name);
    }

    public function configureAction($project_name){

        $this->getView()->assign('project_name', $project_name);
    }

}
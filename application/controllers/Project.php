<?php
/**
 * YAF框架示例代码
 * @author xiaocai
 * @since  2014-3-3
 */
class ProjectController extends Yaf\Controller_Abstract{

    public function codeAction($project_name){
        
        $ProjectEntity = new \services\project\Entity( $project_name );
        $VersionDepot  = new \services\versiondepot\Entity( $ProjectEntity );

        $version_list = $VersionDepot->getBranchs();
        $version_path = $VersionDepot->getPath();
        $version_code = $VersionDepot->getDirectory($ProjectEntity->depo_path);

        $this->getView()->assign('version_list', $version_list);
        $this->getView()->assign('version_path', $version_path);
        $this->getView()->assign('version_code', $version_code);
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
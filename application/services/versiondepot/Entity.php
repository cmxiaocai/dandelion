<?php
namespace services\versiondepot;

class Entity{

    private $ProjectEntity;
    private $DepoOperation;

    public function __construct(\services\project\Entity $ProjectEntity){
        $this->ProjectEntity = $ProjectEntity;
        switch ($this->ProjectEntity->depo_type) {
            case 'svn':
                $this->DepoOperation = new SvnDepoOperation();break;
            default:
                throw new Exception("Not supported ".$this->ProjectEntity->depo_type);
        }
        $this->DepoOperation->setAuth($this->ProjectEntity->USERNAME, $this->ProjectEntity->PASSWORD);
    }

    public function getBranchs(){
        return $this->DepoOperation->getBranches($this->ProjectEntity->depo_path);
    }

    public function getPath(){
        
    }

    public function getDirectory($path){
        return $this->DepoOperation->getDirectory($path);
    }

}
<?php
namespace services\project;


class Entity{

    private $data = array();

    public function __construct($project_name){
        $this->data = array(
            'project_name'   => 'hiapk-bbs',
            'project_domain' => 'bbs.hiapk.com',
            'depo_type'      => 'svn',
            'depo_path'      => 'svn://svn.coc-dept.91.com/bm/bmp/',
            'USERNAME'       => '684435',
            'PASSWORD'       => 'RYBQnJiB050K',
        );
    }

    public function __get($name){
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        throw new \Exception("Undefined property : \${$name}");
    }

}
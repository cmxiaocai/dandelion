<?php
namespace services\versiondepot;
class SvnDepoOperation{

    public function setAuth($user, $pass){
        svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, $user); 
        svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, $pass);
    }

    public function getBranches($path){
        $branches = array(
            'trunk' => array( 'trunk' )
        );
        $tmp = svn_ls($path);;
        foreach ($tmp as $name => $info) {
            if( $info['type'] != 'dir' || $name=='trunk' ) continue;
            $branches[$name] = array();
            $dirs = svn_ls($path.'/'.$name);
            foreach ($dirs as $key => $value) {
                if( $info['type'] != 'dir' ) continue;
                $branches[$name][] = $name.'/'.$value['name'];
            }
        }
        return $branches;
    }

    public function getDirectory($path){
        $directorys = array();
        $dirs = svn_ls($path);
        foreach ($dirs as $key => $value) {
            $log = svn_log( $path.'/'.$value['name'], 0, 0, 1);
            $directorys[] = array(
                'name'   => $value['name'],
                'path'   => $path.'/'.$value['name'],
                'type'   => $value['type'],
                'date'   => date('Y-m-d H:i:s', $value['time_t']),
                'author' => $value['last_author'],
                'msg'    => $log[0]['msg']
            );
        }
        return $directorys;
    }

}
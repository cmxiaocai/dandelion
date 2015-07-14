<?php
namespace services\versiondepot;
class SvnDepoOperation{

    public function setAuth($user, $pass){
        svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, $user); 
        svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, $pass);
    }

    public function getDirectory($path){
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

}
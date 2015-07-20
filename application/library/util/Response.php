<?php

/**
 * JSON辅助方法
 * @author xiaocai
 * @since  2014-3-4
 */
class Util_Response{
    /**
     * 接口返回JSON数据
     * @param $code      状态码
     * @param $message   消息
     * @param $data      附加数据
     * @param $callback  回调函数
     * @param $isheader  是否输出header
     */
    public static function apiReturn($code, $message, $data=array(), $callback=false, $isheader=true){
        if ( TRUE === $code ) {
            $code = 200;
        }
        if ( $isheader ){
            header('Content-type:application/json;charset=utf-8');
        }
        $json = json_encode(array('code'=>intval($code), 'message'=>$message, 'data'=>$data));
        if ( FALSE === $callback ) {
            return $json;
        } else {
            return $callback.'('.$json.')';
        }
    }

}
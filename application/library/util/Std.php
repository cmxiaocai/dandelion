<?php

class Util_Std {

    private $__data = array();

    public function __set($key, $value) {
        $this->__data[$key] = $value;
    }

    public function __call($func, $args) {
        if ( ! isset( $this->__data[$func]) )
            throw new YafException(\Exception_Decorator::DECORATOR_STD_ERROR);
            
        return $this->__data[$func];
    }
}
?>
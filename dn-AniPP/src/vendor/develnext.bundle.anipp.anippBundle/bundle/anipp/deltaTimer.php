<?php
namespace bundle\anipp;

use std;

class deltaTimer 
{

    private $last;
    
    public function __construct(){
        $this->last = Time::millis();
    }
    
    /**
     * @return int
     */
    public function getDelta(){
        $l = Time::millis();
        $d = $l-$this->last;
        $this->last = $l;
        return $d;
    }

}
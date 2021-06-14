<?php
namespace bundle\anipp;

use std;

class deltaTimer 
{

    private $last;
    
    public function __construct(int $start = null){
        if($start==null)
			$this->last = Time::millis();
        else
			$this->last = $start;
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
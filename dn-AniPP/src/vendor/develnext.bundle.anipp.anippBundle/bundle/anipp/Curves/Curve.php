<?php
namespace bundle\anipp\Curves;

class Curve 
{

    /**
     * @return float
     */
    public static function norm(float $x){
        while($x>1) $x--;
        while(0>$x) $x++;
        return $x;
    }

    /**
     * @return float
     */
    public static function get(float $x){
        return static::norm($x);
    }

}
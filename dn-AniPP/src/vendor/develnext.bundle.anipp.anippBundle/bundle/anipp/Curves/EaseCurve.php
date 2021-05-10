<?php
namespace bundle\anipp\Curves;

class EaseCurve extends Curve
{

    /**
     * @return float
     */
    public static function get(float $x){
        $x = static::norm($x);
        if($x>0.5)
            return 1-static::get(1-$x);
        return EaseCurveIn::get($x)*2;
    }

}
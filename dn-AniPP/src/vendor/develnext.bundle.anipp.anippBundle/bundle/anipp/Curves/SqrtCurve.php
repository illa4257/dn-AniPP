<?php
namespace bundle\anipp\Curves;

class SqrtCurve extends Curve
{

    /**
     * @return float
     */
    public static function get(float $x){
        $x = static::norm($x);
        if($x>0.5)
            return 1-static::get(1-$x);
        return SqrtCurveIn::get($x*2)/2;
    }

}
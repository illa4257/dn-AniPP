<?php
namespace bundle\anipp;

use gui, bundle\anipp\deltaTimer, bundle\anipp\Curves\Curve;

class AniPP 
{
    /**
     * @return Curve
     */
    public static function getCurve($curve){
        if(!is_object($curve)){
            $curve = "bundle\\anipp\\Curves\\".$curve;
            $curve = new $curve;
        }
        return $curve;
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function smoothlySetValues(UXNode $object, int $duration, array $vars, callable $onEnd = null, $curve = null){
        $t = 0;
        $s = [];
        $onet = 1/$duration;
        foreach ($vars as $key => $value)
            $s[$key] = ($value-$object->$key)/($duration/1000);
        $dt = new deltaTimer;
        if($curve==null)
            $curve = new Curve;
        $curve = static::getCurve($curve);
        $ti = new UXAnimationTimer(function () use ($object, $duration, $dt, $s, &$t, $onEnd, $curve, $onet) {
            $ot = $t;
            $t += $dt->getDelta();
            if($t>$duration)
                $t = $duration;
            $val = $curve->get($t*$onet)-$curve->get($ot*$onet);
            foreach ($s as $key => $value){
                $object->$key += $val*$value;
            }
            if($t>=$duration){
                if($onEnd)
                    $onEnd();
                return true;
            }
            return false;
        });
        $ti->start();
        return $ti;
    }
    
    public static function smoothlyAddValues(UXNode $object, int $duration, array $vars, callable $onEnd = null, $curve = null){
        foreach ($vars as $key => &$value)
            $value += $object->$key;
        return static::smoothlySetValues($object,$duration,$vars,$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function smoothlySetValue(UXNode $object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null){
        return static::smoothlySetValues($object,$duration,[$varName=>$value],$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function smoothlyAddValue(UXNode $object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null){
        return static::smoothlySetValue($object,$duration,$varName,$object->$varName+$value,$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function fadeTo(UXNode $object, int $duration, float $value, callable $onEnd = null, $curve = null){
        return static::smoothlySetValue($object,$duration,"opacity",$value,$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function fadeOut(UXNode $object, int $duration, callable $onEnd = null, $curve = null){
        return static::fadeTo($object,$duration,0,$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function fadeIn(UXNode $object, int $duration, callable $onEnd = null, $curve = null){
        return static::fadeTo($object,$duration,1,$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function scaleTo(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null){
        return static::smoothlySetValues($object,$duration,["scaleX"=>$x,"scaleY"=>$y],$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function scale(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null){
        return static::scaleTo($object,$duration,$object->x+$x,$object->y+$y,$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function moveTo(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null){
        return static::smoothlySetValues($object,$duration,["x"=>$x,"y"=>$y],$onEnd,$curve);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function displace(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null){
        return static::moveTo($object,$duration,$object->x+$x,$object->y+$y,$onEnd,$curve);
    }

}
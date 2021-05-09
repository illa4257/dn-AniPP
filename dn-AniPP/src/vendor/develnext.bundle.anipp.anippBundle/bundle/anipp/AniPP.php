<?php
namespace bundle\anipp;

use gui, bundle\anipp\deltaTimer;

class AniPP 
{
    
    /**
     * @return UXAnimationTimer
     */
    public static function smoothlySetValues(UXNode $object, int $duration, array $vars, callable $onEnd = null){
        $t = 0;
        $s = [];
        foreach ($vars as $key => $value)
            $s[$key] = ($value-$object->$key)/$duration;
        $dt = new deltaTimer;
        $ti = new UXAnimationTimer(function () use ($object, $duration, $dt, $s, &$t, $onEnd) {
            $ot = $t;
            $t += $dt->getDelta();
            if($t<$duration)
                $d = $t-$ot;
            else 
                $d = $duration-$ot;
            foreach ($s as $key => $value)
                $object->$key += $d*$value;
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
    
    public static function smoothlyAddValues(UXNode $object, int $duration, array $vars, callable $onEnd = null){
        foreach ($vars as $key => &$value)
            $value += $object->$key;
        return static::smoothlySetValues($object, $duration, $vars,$onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function smoothlySetValue(UXNode $object, int $duration, string $varName, $value, callable $onEnd = null){
        return static::smoothlySetValues($object, $duration, [$varName=>$value],$onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function smoothlyAddValue(UXNode $object, int $duration, string $varName, $value, callable $onEnd = null){
        return static::smoothlySetValue($object, $duration, $varName, $object->$varName+$value, $onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function fadeTo(UXNode $object, int $duration, float $value, callable $onEnd = null){
        return static::smoothlySetValue($object, $duration, "opacity", $value, $onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function fadeOut(UXNode $object, int $duration, callable $onEnd = null){
        return static::fadeTo($object, $duration, 0, $onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function fadeIn(UXNode $object, int $duration, callable $onEnd = null){
        return static::fadeTo($object, $duration, 1, $onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function scaleTo(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null){
        return static::smoothlySetValues($object, $duration, ["scaleX"=>$x,"scaleY"=>$y],$onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function scale(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null){
        return static::scaleTo($object, $duration, $object->x+$x, $object->y+$y, $onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function moveTo(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null){
        return static::smoothlySetValues($object, $duration, ["x"=>$x,"y"=>$y],$onEnd);
    }
    
    /**
     * @return UXAnimationTimer
     */
    public static function displace(UXNode $object, int $duration, int $x, int $y, callable $onEnd = null){
        return static::moveTo($object, $duration, $object->x+$x, $object->y+$y, $onEnd);
    }

}
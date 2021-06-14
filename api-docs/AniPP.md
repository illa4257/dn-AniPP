# [dn-AniPP](https://github.com/illa4257/dn-AniPP)
Animation++ for DevelNext.

---
## api-docs > EN > AniPP
> bundle\anipp\AniPP

> Animation class.

### Static methods:

#### ::getCurve($curve) : bundle\anipp\Curves\Curve
> Get a curve object by class, if not an object.
---
#### ::customAnimation(int $duration, callable $onStep, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Custom animation.
---
#### ::smoothlySetValues($object, int $duration, array $vars, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth change of values.
---
#### ::smoothlyAddValues($object, int $duration, array $vars, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth addition of values.
---
#### ::smoothlySetValue($object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth value change.
---
#### ::smoothlyAddValue($object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth addition of value.
---
#### ::fadeTo($object, int $duration, float $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth transparency change.
---
#### ::fade($object, int $duration, float $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smoothly adding transparency.
---
#### ::fadeOut($object, int $duration, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Fading out of the object.
---
#### ::fadeIn($object, int $duration, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> The smooth appearance of the object.
---
#### ::scaleTo($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth resizing.
---
#### ::scale($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth addition of sizes.
---
#### ::moveTo($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth movement to the point.
---
#### ::displace($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Smooth addition of object coordinates.
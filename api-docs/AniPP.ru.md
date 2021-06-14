# [dn-AniPP](https://github.com/illa4257/dn-AniPP)
Animation++ для DevelNext.

---
## api-docs > RU > AniPP
> bundle\anipp\AniPP

> Класс анимации.

### Статические методы:

#### ::getCurve($curve) : bundle\anipp\Curves\Curve
> Получить объект кривой по классу, если это не объект.
---
#### ::customAnimation(int $duration, callable $onStep, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Пользовательская анимация.
---
#### ::smoothlySetValues($object, int $duration, array $vars, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное изменение значений.
---
#### ::smoothlyAddValues($object, int $duration, array $vars, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное добавление значений.
---
#### ::smoothlySetValue($object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное изменение значения.
---
#### ::smoothlyAddValue($object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное добавление значения.
---
#### ::fadeTo($object, int $duration, float $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное изменение прозрачности.
---
#### ::fade($object, int $duration, float $value, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное добавление прозрачности.
---
#### ::fadeOut($object, int $duration, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное исчезание объекта.
---
#### ::fadeIn($object, int $duration, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное появление объекта.
---
#### ::scaleTo($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное изменение размеров.
---
#### ::scale($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное добавления размеров.
---
#### ::moveTo($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное движение к точки.
---
#### ::displace($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null) : php\gui\animation\UXAnimationTimer
> Плавное добавление координат объекта.
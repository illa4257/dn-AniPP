# dn-AniPP
Animation++ for DevelNext

---

Why is it better than Animation?
1. Animating a specific object value.
2. Synchronization with time.

![](TSync.gif)

3. Curves.

---

Example:
```php
use bundle\anipp\AniPP;
use bundle\anipp\Curves\EaseCurve;

AniPP::smoothlySetValues($this->button, 100, ["opacity"=>0,"rotate"=>360], function (){
	echo "Ready!\n";
}, EaseCurve);
```


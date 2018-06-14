# ImageKiller
# 保存网络图片到本地
# Save image to local file;
```php
<?php
use GoldOfficer\ImageKiller;

$localImage = ImageKiller::saveImage(
    'https://img.oasgames.com/upload/1527673136/web/images/indexbg.jpg',
    null,
    '/tmp',
    '.jpg'
);

var_dump($localImage);
```

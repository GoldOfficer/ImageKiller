## 保存网络图片到本地(ImageKiller)
This PHP class was developed to capture (download) a picture, or a set of pictures from specific internet/local address and save into users computer.
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

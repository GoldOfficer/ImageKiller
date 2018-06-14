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
//
// array(3) {
//   ["conentType"]=>
//   array(1) {
//     [0]=>
//     string(10) "image/jpeg"
//   }
//   ["imageSize"]=>
//   array(1) {
//     [0]=>
//     string(5) "24521"
//   }
//   ["localImagePath"]=>
//   string(78) "/tmp/e99a0580-6f92-11e8-a4ec-00005b21fb8c-e53e6df2-02e4-4a58-bf8b-3347a439e361"
// }
//
```


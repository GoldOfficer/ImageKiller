<?php
/**
 * Created by PhpStorm.
 * User: Baihuzi
 * Date: 2018/6/14
 * Time: 12:06
 */

require __DIR__ . '/vendor/autoload.php';

$compiledPath = __DIR__ . '/vendor/compiled.php';

if (file_exists($compiledPath)) {
    require $compiledPath;
}

var_dump(
    \GoldOfficer\ImageKiller::saveImage(
        'https://pic.xiami.net/images/album/img97/1004997397/1049976771427771121.jpg?x-oss-process=image/resize,limit_0,m_pad,w_185,h_185',
        null,
        '/tmp',
        '.jpg'
    )
);
/*var_dump(
    \GoldOfficer\ImageKiller::saveImage(
        'https://img.oasgames.com/upload/1527756197/web/images/menu_banner1.jpg',
        null,
        '/tmp',
        '.jpg'
    )
);
var_dump(
    \GoldOfficer\ImageKiller::saveImage(
        'https://img.oasgames.com/upload/1527673136/web/images/indexbg.jpg',
        null,
        '/tmp',
        '.jpg'
    )
);*/
var_dump(
    \GoldOfficer\ImageKiller::saveImage(
        'https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=3705557247,1170119525&fm=173&app=25&f=JPEG?w=640&h=480&s=45503EC2C542394D3E5CD909030090D1',
        null,
        '/tmp'
    )
);

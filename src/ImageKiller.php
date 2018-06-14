<?php
/**
 * Created by PhpStorm.
 * User: Baihuzi
 * Date: 2018/6/14
 * Time: 11:00
 */

namespace GoldOfficer;

use GoldOfficer\Exception\ImageKillerException;
use GuzzleHttp\Client;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Filesystem\Filesystem;

class ImageKiller
{
    /** @var Filesystem|null */
    private static $fileSystem = null;
    /** @var null|Client */
    private static $client = null;
    
    public static function saveImage($url, $fileName = "", $savePath = "/tmp", $ext = "")
    {
        $fileName = self::imageName($fileName, $savePath, $ext);
        
        $image = self::getImageContent($url);
        
        self::save($fileName, $image['content']);
        unset($image['content']);
        
        return [
            'conentType'     => $image['conentType'],
            'imageSize'      => $image['size'],
            'localImagePath' => $fileName,
        ];
        
    }
    
    private static function save($fileName, $file)
    {
        $fileSystem = self::getFileSystem();
        $fileSystem->dumpFile($fileName, $file);
    }
    
    protected static function getImageContent($url)
    {
        $client = self::getClient();
        try {
            $respone = $client->get($url);
        } catch (\Exception $e) {
            throw new ImageKillerException($e->getMessage(), $e->getCode(), $e);
        }
        if ('200' != $respone->getStatusCode()) {
            throw new ImageKillerException('Get Image fail!');
        }
        
        $image['conentType'] = $respone->getHeader('Content-Type');
        $image['size']       = $respone->getHeader('Content-Length');
        $image['content']    = $respone->getBody()->getContents();
        
        return $image;
    }
    
    protected static function imageName($fileName = "", $savePath = "/tmp", $ext = "")
    {
        $fileSystem = self::getFileSystem();
        
        if (!$fileSystem->exists($savePath)) {
            $fileSystem->mkdir($savePath, 0700);
        };
        
        if (empty($fileName)) {
            $fileName = Uuid::uuid1(time()) . '-' . Uuid::uuid4() . $ext;
        }
        
        $fileName = $savePath . '/' . $fileName;
        
        if ($fileSystem->exists($fileName)) {
            $fileSystem->remove($fileName);
        }
        
        return $fileName;
    }
    
    /**
     * @return null|Filesystem
     */
    protected static function getFileSystem()
    {
        if (null === self::$fileSystem) {
            self::$fileSystem = new Filesystem();
        }
        
        return self::$fileSystem;
    }
    
    /**
     * @return Client|null
     */
    protected static function getClient()
    {
        if (null === self::$client) {
            self::$client = new Client();
        }
        
        return self::$client;
    }
}
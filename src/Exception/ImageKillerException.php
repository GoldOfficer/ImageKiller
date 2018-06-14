<?php

/**
 * Created by PhpStorm.
 * User: Baihuzi
 * Date: 2018/6/14
 * Time: 11:46
 */
namespace GoldOfficer\Exception;

class ImageKillerException extends \Exception
{
    public function __construct($message, $code, Exception $previous)
    {
        parent::__construct('Image Killer Exception: ' . $message, $code, $previous);
    }
}
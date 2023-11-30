<?php
namespace Amk\SmileOne\Exceptions;

use Exception;

class SmileOneException extends Exception
{

    public static function info($reason)
    {
        return new static($reason);
    }

    public static function configError($reason)
    {
        return new static('You must assign ' . $reason . ' in config (smileone.php) file.');
    }

    
}




?>
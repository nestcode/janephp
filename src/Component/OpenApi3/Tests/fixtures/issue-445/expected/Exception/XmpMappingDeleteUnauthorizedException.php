<?php

namespace PicturePark\API\Exception;

class XmpMappingDeleteUnauthorizedException extends \RuntimeException implements ClientException
{
    public function __construct()
    {
        parent::__construct('Unauthorized', 401);
    }
}
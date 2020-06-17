<?php

namespace CreditSafe\API\Exception;

class SharePortfolioIdBadRequestException extends \RuntimeException implements ClientException
{
    public function __construct()
    {
        parent::__construct('', 400);
    }
}
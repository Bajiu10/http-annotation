<?php

namespace EasySwoole\HttpAnnotation\Attributes\Validator;

use EasySwoole\HttpAnnotation\Attributes\Param;
use Psr\Http\Message\ServerRequestInterface;

class AlphaDash extends AbstractValidator
{
    function __construct(?string $errorMsg = null)
    {
        if(empty($errorMsg)){
            $errorMsg = "{#name} must be all AlphaDash";
        }
        $this->errorMsg($errorMsg);
    }


    protected function validate(Param $param, ServerRequestInterface $request): bool
    {
        return (bool)preg_match( '/^[a-zA-Z0-9\-\_]+$/', (string)$param->parsedValue());
    }

    function ruleName(): string
    {
        return "AlphaDash";
    }
}
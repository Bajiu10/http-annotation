<?php

namespace EasySwoole\HttpAnnotation\Tests\ControllerExample\Api\Common;

use EasySwoole\HttpAnnotation\Attributes\Api;
use EasySwoole\HttpAnnotation\Attributes\Param;
use EasySwoole\HttpAnnotation\Attributes\Validator\Optional;

class Message extends Base
{
    #[Api(
        apiName: "list",
        requestPath: "api/common/message/list",
        params: [
            new Param(
                name: "token",
                validate: [
                    new Optional()
                ]
            )
        ]
    )]
    function list(){

    }
}
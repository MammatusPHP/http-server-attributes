<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes;

enum HttpMethod: string
{
    case HEAD   = 'HEAD';
    case GET    = 'GET';
    case POST   = 'POST';
    case PUT    = 'PUT';
    case PATCH  = 'PATCH';
    case DELETE = 'DELETE';
}

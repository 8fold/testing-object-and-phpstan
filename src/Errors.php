<?php
declare(strict_types=1);

namespace JB\PhpStan;

enum Errors
{
    case EnvironmentJsonNotFound;
    case EnvironmentJsonUnreadable;
    case EnvironmentJsonInvalid;
    case EnvironmentUnknown;
    case JsonNotFound;
    case JsonUnreadable;
    case JsonInvalid;
    case JsonUnknown;
    case FileNotFound;
    case FileUnreadable;
}

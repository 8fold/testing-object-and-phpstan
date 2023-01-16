<?php
declare(strict_types=1);

namespace JB\PhpStan;

use StdClass;

use JB\PhpStan\Errors;

class Something
{
    /**
     * PhpStan error: Method JB\PhpStan\Something::nearTarget() should return
     * JB\PhpStan\Errors|stdClass but returns object.
     */
    public function nearTargetUsingIsObject(): StdClass|Errors
    {
        $json = file_get_contents(__DIR__ . '/test.json');
        if (is_string($json) === false) {
            return Errors::JsonUnknown;
        }

        $decoded = json_decode($json);
        if (is_object($decoded) === false) {
            return Errors::JsonInvalid;
        }

        return $decoded;
    }

    public function nearTargetUsingIsA(): StdClass|Errors
    {
        $json = file_get_contents(__DIR__ . '/test.json');
        if (is_string($json) === false) {
            return Errors::JsonUnknown;
        }

        $decoded = json_decode($json);
        if (is_a($decoded, StdClass::class) === false) {
            return Errors::JsonInvalid;
        }

        return $decoded;
    }

    public function decodeOnlyUsingIsObject(): StdClass|Errors
    {
        $decoded = json_decode('{}');
        if (is_object($decoded) === false) {
            return Errors::JsonInvalid;
        }

        return $decoded;
    }
}

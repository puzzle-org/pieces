<?php

namespace Puzzle\Pieces;

class Json
{
    public static function decode($json, $assoc = false, $depth = 512, $option = 0)
    {
        $decodedJson = json_decode($json, $assoc, $depth, $option);

        $jsonLastError = json_last_error();
        if($jsonLastError != JSON_ERROR_NONE)
        {
            throw new Exceptions\JsonDecodeError(json_last_error_msg());
        }

        return $decodedJson;
    }

    public static function encode($value, $option = 0, $depth = 512)
    {
        $json = json_encode($value, $option, $depth);

        if($json === false)
        {
            throw new Exceptions\JsonEncodeError(json_last_error_msg());
        }

        return $json;
    }
}

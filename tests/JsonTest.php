<?php

namespace Puzzle\Pieces;

class JsonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providerTestJsonEncode
     */
    public function testJsonEncode($toEncode)
    {
        $json = Json::encode($toEncode);

        $this->assertSame(json_encode($toEncode), $json);
    }

    public function providerTestJsonEncode()
    {
        return [
            [
                'toEncode' => ['burger' => true]
            ],
            [
                'toEncode' => false
            ],
        ];
    }


    /**
     * @dataProvider providerTestJsonDecodeException
     * @expectedException Puzzle\Pieces\Exceptions\JsonDecodeError
     */
    public function testJsonDecodeException($depth, $json)
    {
        Json::decode($json, false, $depth);
    }

    public function providerTestJsonDecodeException()
    {
        return [
            'JSON_ERROR_DEPTH' => [
                'depth' => 1,
                'json' => '{burger: {id: 42, taste: pony, outdated: true}}',
            ],
            'JSON_ERROR_STATE_MISMATCH' => [
                'depth' => 512,
                'json' => '{"j": 1 ] }',
            ],
            'JSON_ERROR_CTRL_CHAR' => [
                'depth' => 512,
                'json' => "\"\001 invalid json\"", # https://github.com/php/php-src/blob/6053987bc27e8dede37f437193a5cad448f99bce/ext/json/tests/bug54484.phpt#L16
            ],
            'JSON_ERROR_SYNTAX' => [
                'depth' => 512,
                'json' => '{"pony":42',
            ],
            'JSON_ERROR_UTF8' => [
                'depth' => 512,
                'json' => "\"\xED\xA0\xB4\""
            ],
        ];
    }

    /**
     * @dataProvider providerTestJsonEncodeException
     * @expectedException Puzzle\Pieces\Exceptions\JsonEncodeError
     */
    public function testJsonEncodeException($data)
    {
        Json::encode($data);
    }

    public function providerTestJsonEncodeException()
    {
        $recursionData = array();
        $recursionData[] = &$recursionData;

        return [
            'JSON_ERROR_RECURSION' => [
                'data' => $recursionData,
            ],
            'JSON_ERROR_INF_OR_NAN NAN' => [
                'data' => NAN,
            ],
            'JSON_ERROR_INF_OR_NAN INF' => [
                'data' => INF,
            ],
        ];
    }
}

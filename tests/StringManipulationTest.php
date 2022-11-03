<?php

namespace Puzzle\Pieces;

use PHPUnit\Framework\TestCase;
use Puzzle\Assert\ExampleDataProvider;

class NoConvertible { public function toString(){} }
class Convertible { public function __toString(){ return ""; } }
class ConvertibleByInterface implements ConvertibleToString { public function __toString(){ return ""; } }

class StringManipulationTest extends TestCase
{
    use
        StringManipulation,
        ExampleDataProvider;

    /**
     * @dataProvider providerRemoveAccents
     */
    public function testRemoveAccents($actual, $expected)
    {
        $this->assertSame($expected, $this->removeAccents($actual));
    }

    public function providerRemoveAccents()
    {
        return array(
            array('L\'été est là', 'L\'ete est la'),
            array('3 % à 15 €', '3 % a 15 €'),
            array('ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ', 'AAAAAACEEEEIIIINOOOOOUUUUY'),
            array('áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy')
        );
    }

    /**
     * @dataProvider providerRemoveAccentsThrowException
     */
    public function testRemoveAccentsThrowException($stringToCheck)
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->removeAccents($stringToCheck);
    }

    public function providerRemoveAccentsThrowException()
    {
        return array(
            array(42),
            array(array('pony')),
            array(new \stdClass()),
            array(function(){}),
        );
    }
    
    /**
     * @dataProvider providerTestIsConvertibleToString
     */
    public function testIsConvertibleToString($expected, $value)
    {
        $this->assertSame($expected, $this->isConvertibleToString($value));
    }

    public function providerTestIsConvertibleToString()
    {
        return [
            [true, null],
            [true, 42],
            [true, 4.20],
            [true, "42"],
            [true, "this is a string"],
            [true, ""],
            [true, true],
            [true, false],
            [true, new Convertible()],
            [true, new ConvertibleByInterface()],
        
            [false, new NoConvertible()],
            [false, array()],
            [false, array('pony')],
            [false, new \stdClass()],
            [false, function(){}],
            [false, $this->buildGenerator()],
        ];
    }
    
    /**
     * @dataProvider providerTestIsConvertibleToString
     */
    public function testConvertToString($uselessArgument, $value)
    {
        $this->assertTrue(
            is_string(
                $this->convertToString($value)
        ));
    }
}

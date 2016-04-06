<?php

namespace Puzzle\Pieces;

class StringManipulationTest extends \PHPUnit_Framework_TestCase
{
    use StringManipulation;

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
     * @expectedException InvalidArgumentException
     */
    public function testRemoveAccentsThrowException($stringToCheck)
    {
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
}
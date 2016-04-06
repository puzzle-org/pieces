<?php

namespace Puzzle\Pieces;

class SanityCheckTest extends \PHPUnit_Framework_TestCase
{
    use SanityCheck;

    /**
     * @dataProvider providerTestEnsureStringOnlyContainsDigitsThrowException
     * @expectedException InvalidArgumentException
     */
    public function testEnsureStringOnlyContainsDigitsThrowException($stringToCheck)
    {
        $this->ensureStringOnlyContainsDigits($stringToCheck);
    }

    /**
     * @dataProvider providerTestEnsureStringOnlyContainsDigits
     */
    public function testEnsureStringOnlyContainsDigits($stringToCheck)
    {
        $this->ensureStringOnlyContainsDigits($stringToCheck);

        $this->assertTrue(true);
    }

    public function providerTestEnsureStringOnlyContainsDigitsThrowException()
    {
        return array(
            array('aaaa'),
            array('aa123aa'),
            array('123aaa'),
            array('aaa123'),
            array('  123'),
            array('  123   '),
            array('123   '),
            array('1 2'),
        );
    }

    public function providerTestEnsureStringOnlyContainsDigits()
    {
        return array(
            array('0'),
            array('1'),
            array('123'),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsPositiveIntegerThrowException
     * @expectedException InvalidArgumentException
     */
    public function testEnsureIsPositiveIntegerThrowException($toCheck)
    {
        $this->ensureIsPositiveInteger($toCheck);
    }

    public function providerTestEnsureIsPositiveIntegerThrowException()
    {
        return array(
            array('burger'),
            array('10'),
            array(10.5),
            array('10.5'),
            array('-10'),
            array(-10.5),
            array(-2),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsPositiveInteger
     */
    public function testEnsureIsPositiveInteger($toCheck)
    {
        $this->ensureIsPositiveInteger($toCheck);

        $this->assertTrue(true);
    }

    public function providerTestEnsureIsPositiveInteger()
    {
        return array(
            array(10),
            array(0),
            array(5),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsStrictPositiveIntegerThrowException
     * @expectedException InvalidArgumentException
     */
    public function testEnsureIsStrictPositiveIntegerThrowException($toCheck)
    {
        $this->ensureIsStrictPositiveInteger($toCheck);
    }

    public function providerTestEnsureIsStrictPositiveIntegerThrowException()
    {
        return array(
            array('burger'),
            array('10'),
            array(10.5),
            array('10.5'),
            array('-10'),
            array(-10.5),
            array(-2),
            array(0),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsStrictPositiveInteger
     */
    public function testEnsureIsStrictPositiveInteger($toCheck)
    {
        $this->ensureIsStrictPositiveInteger($toCheck);

        $this->assertTrue(true);
    }

    public function providerTestEnsureIsStrictPositiveInteger()
    {
        return array(
            array(10),
            array(5),
            array(69),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsPositiveFloatThrowException
     * @expectedException InvalidArgumentException
     */
    public function testEnsureIsPositiveFloatThrowException($toCheck)
    {
        $this->ensureIsPositiveFloat($toCheck);
    }

    public function providerTestEnsureIsPositiveFloatThrowException()
    {
        return array(
            array('burger'),
            array('-10.5'),
            array(-10.5),
            array('-10'),
            array(-10),
            array(null),
            array(''),
            array(array()),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsPositiveFloat
     */
    public function testEnsureIsPositiveFloat($toCheck)
    {
        $this->ensureIsPositiveFloat($toCheck);

        $this->assertTrue(true);
    }

    public function providerTestEnsureIsPositiveFloat()
    {
        return array(
            array(.2),
            array(10),
            array(0.5),
            array(10.00005),
            array('.2'),
            array('10'),
            array('0.5'),
            array('10.00005'),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsBooleanThrowException
     * @expectedException InvalidArgumentException
     */
    public function testEnsureIsBooleanThrowException($toCheck)
    {
        $this->ensureIsBoolean($toCheck);
    }

    public function providerTestEnsureIsBooleanThrowException()
    {
        return array(
            array(1),
            array(0),
            array('true'),
            array('false'),
            array('burger'),
            array(null),
            array(''),
            array(array()),
        );
    }

    /**
     * @dataProvider providerTestEnsureIsBoolean
     */
    public function testEnsureIsBoolean($toCheck)
    {
        $this->ensureIsBoolean($toCheck);

        $this->assertTrue(true);
    }

    public function providerTestEnsureIsBoolean()
    {
        return array(
            array(true),
            array(false),
        );
    }
}

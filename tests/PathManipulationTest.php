<?php

namespace Puzzle\Pieces;

class PathManipulationTest extends \PHPUnit_Framework_TestCase
{
    use PathManipulation;

    /**
     * @dataProvider providerTestEnforceLeadingSlash
     */
    public function testEnforceLeadingSlash($path, $expected)
    {
        $this->assertSame($expected, $this->enforceLeadingSlash($path));
    }

    public function providerTestEnforceLeadingSlash()
    {
        return array(
            array('foo', '/foo'),
            array('f/oo', '/f/oo'),
            array('/foo', '/foo'),
            array('//foo', '/foo'),
            array('/////foo', '/foo'),

            array('foo/', '/foo/'),
            array('f/oo/', '/f/oo/'),
            array('/foo/', '/foo/'),
            array('//foo/', '/foo/'),
            array('/////foo///', '/foo///'),

            array('foo/bar/over/ponies', '/foo/bar/over/ponies'),
            array('/foo/bar/over/ponies', '/foo/bar/over/ponies'),
            array('//foo/bar/over/ponies', '/foo/bar/over/ponies'),

            array('foo/bar/over/ponies/', '/foo/bar/over/ponies/'),
            array('/foo/bar/over/ponies/', '/foo/bar/over/ponies/'),
            array('//foo/bar/over/ponies/', '/foo/bar/over/ponies/'),
        );
    }

    /**
     * @dataProvider providerTestRemoveLeadingSlash
     */
    public function testRemoveLeadingSlash($path, $expected)
    {
        $this->assertSame($expected, $this->removeLeadingSlash($path));
    }

    public function providerTestRemoveLeadingSlash()
    {
        return array(
            array('foo', 'foo'),
            array('f/oo', 'f/oo'),
            array('/foo', 'foo'),
            array('//foo', 'foo'),
            array('/////foo', 'foo'),

            array('foo/', 'foo/'),
            array('f/oo/', 'f/oo/'),
            array('/foo/', 'foo/'),
            array('//foo/', 'foo/'),
            array('/////foo///', 'foo///'),

            array('foo/bar/over/ponies', 'foo/bar/over/ponies'),
            array('/foo/bar/over/ponies', 'foo/bar/over/ponies'),
            array('//foo/bar/over/ponies', 'foo/bar/over/ponies'),

            array('foo/bar/over/ponies/', 'foo/bar/over/ponies/'),
            array('/foo/bar/over/ponies/', 'foo/bar/over/ponies/'),
            array('//foo/bar/over/ponies/', 'foo/bar/over/ponies/'),
        );
    }

    /**
     * @dataProvider providerTestEnforceEndingSlash
     */
    public function testEnforceEndingSlash($path, $expected)
    {
        $this->assertSame($expected, $this->enforceEndingSlash($path));
    }

    public function providerTestEnforceEndingSlash()
    {
        return array(
            array('foo', 'foo/'),
            array('f/oo/', 'f/oo/'),
            array('foo/', 'foo/'),
            array('foo/', 'foo/'),
            array('foo////', 'foo/'),

            array('/foo', '/foo/'),
            array('/f/oo/', '/f/oo/'),
            array('/foo/', '/foo/'),
            array('/foo/', '/foo/'),
            array('//foo////', '//foo/'),

            array('foo/bar/over/ponies', 'foo/bar/over/ponies/'),
            array('foo/bar/over/ponies/', 'foo/bar/over/ponies/'),
            array('foo/bar/over/ponies///', 'foo/bar/over/ponies/'),

            array('/foo/bar/over/ponies', '/foo/bar/over/ponies/'),
            array('/foo/bar/over/ponies/', '/foo/bar/over/ponies/'),
            array('/foo/bar/over/ponies///', '/foo/bar/over/ponies/'),
        );
    }

    /**
     * @dataProvider providerTestRemoveEndingSlash
     */
    public function testRemoveEndingSlash($path, $expected)
    {
        $this->assertSame($expected, $this->removeEndingSlash($path));
    }

    public function providerTestRemoveEndingSlash()
    {
        return array(
            array('foo', 'foo'),
            array('f/oo/', 'f/oo'),
            array('foo/', 'foo'),
            array('foo/', 'foo'),
            array('foo////', 'foo'),

            array('/foo', '/foo'),
            array('/f/oo/', '/f/oo'),
            array('/foo/', '/foo'),
            array('/foo/', '/foo'),
            array('//foo////', '//foo'),

            array('foo/bar/over/ponies', 'foo/bar/over/ponies'),
            array('foo/bar/over/ponies/', 'foo/bar/over/ponies'),
            array('foo/bar/over/ponies///', 'foo/bar/over/ponies'),

            array('/foo/bar/over/ponies', '/foo/bar/over/ponies'),
            array('/foo/bar/over/ponies/', '/foo/bar/over/ponies'),
            array('/foo/bar/over/ponies///', '/foo/bar/over/ponies'),
        );
    }

    /**
     * @dataProvider providerTestRemoveWrappingSlashes
     */
    public function testRemoveWrappingSlashes($path, $expected)
    {
        $this->assertSame($expected, $this->removeWrappingSlashes($path));
    }

    public function providerTestRemoveWrappingSlashes()
    {
        return array(
            array('foo', 'foo'),
            array('f/oo/', 'f/oo'),
            array('foo/', 'foo'),
            array('foo/', 'foo'),
            array('foo////', 'foo'),

            array('/foo', 'foo'),
            array('/f/oo/', 'f/oo'),
            array('/foo/', 'foo'),
            array('/foo/', 'foo'),
            array('//foo////', 'foo'),

            array('foo/bar/over/ponies', 'foo/bar/over/ponies'),
            array('foo/bar/over/ponies/', 'foo/bar/over/ponies'),
            array('foo/bar/over/ponies///', 'foo/bar/over/ponies'),

            array('/foo/bar/over/ponies', 'foo/bar/over/ponies'),
            array('/foo/bar/over/ponies/', 'foo/bar/over/ponies'),
            array('/foo/bar/over/ponies///', 'foo/bar/over/ponies'),
        );
    }
}
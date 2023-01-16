<?php
declare(strict_types=1);

namespace JB\PhpStan\Tests;

use PHPUnit\Framework\TestCase;

use StdClass;

use Error;
use JB\PhpStan\Tests\Mock;

class PhpStraightTest extends TestCase
{
    /**
     * @test
     */
    public function array_cast_to_object_is_stdclass(): void
    {
        $sut = (object) [];

        $this->assertSame(
            'object',
            gettype($sut)
        );

        $this->assertTrue(
            is_a($sut, StdClass::class)
        );
    }

    /**
     * @test
     */
    public function new_stdclass_is_stdclass(): void
    {
        $sut = new StdClass();

        $this->assertSame(
            'object',
            gettype($sut)
        );

        $this->assertTrue(
            is_a($sut, StdClass::class)
        );
    }

    /**
     * @test
     */
    public function json_decode_is_stdclass(): void
    {
        $sut = json_decode('{}');

        $this->assertNotFalse(
            $sut
        );

        $this->assertSame(
            'object',
            gettype($sut)
        );

        $this->assertTrue(
            is_a($sut, StdClass::class)
        );

        $sut = json_decode('{}', false);

        $this->assertNotFalse(
            $sut
        );

        $this->assertSame(
            'object',
            gettype($sut)
        );

        $this->assertTrue(
            is_a($sut, StdClass::class)
        );
    }

    private function phpTypeSystemStdClass(StdClass $object): StdClass
    {
        return $object;
    }

    /**
     * @test
     */
    public function strict_stdclass_pass_and_return(): void
    {
        $sut = $this->phpTypeSystemStdClass(new StdClass());

        $this->assertSame(
            'object',
            gettype($sut)
        );

        $this->assertTrue(
            is_a($sut, StdClass::class)
        );

        $this->expectException(Error::class);

        $this->phpTypeSystemStdClass(
            new Mock()
        );
    }
}

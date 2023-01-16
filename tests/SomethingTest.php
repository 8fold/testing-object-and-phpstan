<?php
declare(strict_types=1);

namespace JB\PhpStan\Tests;

use PHPUnit\Framework\TestCase;

use JB\PhpStan\Something;

use StdClass;
use Error;

class SomethingTest extends TestCase
{
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Something(
            new StdClass()
        );

        parent::setUp();
    }

    /**
     * @test
     */
    public function strict_typed(): void
    {
        $result = $this->sut->strictObject();

        $this->assertSame(
            'object',
            gettype($result)
        );

        $this->assertFalse(
            is_a($result, StdClass::class)
        );

        $this->expectException(Error::class);

        $this->phpTypeSystemStdClass(
            $this->sut->strictStdClass()
        );
    }

    /**
     * @test
     */
    public function can_get_stdclass(): void
    {
        $result = $this->sut->stdClass();

        $this->assertSame(
            'object',
            gettype($result)
        );

        $this->assertTrue(
            is_a($result, StdClass::class)
        );
    }

    /**
     * @test
     */
    public function can_get_object(): void
    {
        $this->assertSame(
            'object',
            gettype($this->sut->init)
        );

        $this->assertSame(
            'object',
            gettype($this->sut->object())
        );

        $this->assertTrue(
            is_a($this->sut->object(), StdClass::class)
        );
    }

    /**
     * @test
     */
    public function can_initialize_something(): void
    {
        $this->assertSame(
            'object',
            gettype($this->sut)
        );

        $this->assertTrue(
            is_a($this->sut, Something::class)
        );

        $this->expectException(Error::class);

        $s = new Something($this->sut);
    }
}

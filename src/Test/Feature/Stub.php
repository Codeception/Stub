<?php

namespace Codeception\Test\Feature;

trait Stub
{
    private $mocks;

    public function stubStart()
    {
        if ($this instanceof \PHPUnit\Framework\TestCase) {
            return;
        }
        $this->mocks = [];
    }

    public function stubEnd($status, $time)
    {
        if ($this instanceof \PHPUnit\Framework\TestCase) {
            return;
        }
        if ($status !== 'ok') { // Codeception status
            return;
        }

        foreach ($this->mocks as $mockObject) {
            if ($mockObject->__phpunit_hasMatchers()) {
                $this->assertTrue(true); // incrementing assertions
            }

            $mockObject->__phpunit_verify(true);
        }
    }

    public function make($class, $params = [])
    {
        return $this->mocks[] = \Codeception\Stub::make($class, $params, $this);
    }

    public function makeEmpty($class, $params = [])
    {
        return $this->mocks[] = \Codeception\Stub::makeEmpty($class, $params, $this);
    }

    public function makeEmptyExcept($class, $method, $params = [])
    {
        return $this->mocks[] = \Codeception\Stub::makeEmptyExcept($class, $method, $params, $this);
    }

    public function construct($class, $constructorParams = [], $params = [])
    {
        return $this->mocks[] = \Codeception\Stub::construct($class, $constructorParams, $params, $this);
    }

    public function constructEmpty($class, $constructorParams = [], $params = [])
    {
        return $this->mocks[] = \Codeception\Stub::constructEmpty($class, $constructorParams, $params, $this);
    }

    public function constructEmptyExcept($class, $method, $constructorParams = [], $params = [])
    {
        return $this->mocks[] = \Codeception\Stub::constructEmptyExcept($class, $method, $constructorParams, $params, $this);
    }

}
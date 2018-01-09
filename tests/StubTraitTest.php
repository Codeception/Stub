<?php

class StubTraitTest extends \PHPUnit\Framework\TestCase
{
    use \Codeception\Test\Feature\Stub;
    /**
     * @var DummyClass
     */
    protected $dummy;

    public function setUp()
    {
        require_once $file = __DIR__. '/_data/DummyOverloadableClass.php';
        require_once $file = __DIR__. '/_data/DummyClass.php';
        $this->dummy = new DummyClass(true);
    }

    public function testMakeStubs()
    {
        $this->dummy = $this->make(DummyClass::class, ['helloWorld' => 'bye']);
        $this->assertEquals('bye', $this->dummy->helloWorld());
        $this->assertEquals('good bye', $this->dummy->goodByeWorld());

        $this->dummy = $this->makeEmpty(DummyClass::class, ['helloWorld' => 'bye']);
        $this->assertEquals('bye', $this->dummy->helloWorld());
        $this->assertNull($this->dummy->goodByeWorld());

        $this->dummy = $this->makeEmptyExcept(DummyClass::class, 'goodByeWorld', ['helloWorld' => 'bye']);
        $this->assertEquals('bye', $this->dummy->helloWorld());
        $this->assertEquals('good bye', $this->dummy->goodByeWorld());
        $this->assertNull($this->dummy->exceptionalMethod());
    }

    public function testConstructStubs()
    {
        $this->dummy = $this->construct(DummyClass::class, ['!'], ['helloWorld' => 'bye']);
        $this->assertEquals('constructed: !', $this->dummy->getCheckMe());
        $this->assertEquals('bye', $this->dummy->helloWorld());
        $this->assertEquals('good bye', $this->dummy->goodByeWorld());

        $this->dummy = $this->constructEmpty(DummyClass::class, ['!'], ['helloWorld' => 'bye']);
        $this->assertNull($this->dummy->getCheckMe());
        $this->assertEquals('bye', $this->dummy->helloWorld());
        $this->assertNull($this->dummy->goodByeWorld());

        $this->dummy = $this->constructEmptyExcept(DummyClass::class, 'getCheckMe', ['!'], ['helloWorld' => 'bye']);
        $this->assertEquals('constructed: !', $this->dummy->getCheckMe());
        $this->assertEquals('bye', $this->dummy->helloWorld());
        $this->assertNull($this->dummy->goodByeWorld());
        $this->assertNull($this->dummy->exceptionalMethod());

    }
}
<?php

namespace Codeception\Stub;

use PHPUnit\Framework\MockObject\Rule\InvocationOrder;

/**
 * Holds matcher and value of mocked method
 */
class StubMarshaler
{
    private $methodMatcher;

    private $methodValue;

    private $methodArguments = null;

    public function __construct(InvocationOrder $matcher, $value)
    {
        $this->methodMatcher = $matcher;
        $this->methodValue = $value;
    }

    public function getMatcher()
    {
        return $this->methodMatcher;
    }

    public function getValue()
    {
        return $this->methodValue;
    }

    /**
     * @return array|null expected method arguments, null makes it skip the check
     */
    public function getArguments()
    {
        return $this->methodArguments;
    }

    /**
     * Checks if a method is called with the specified arguments
     *
     * If the method is invoked with different arguments, an exception will be thrown.
     *
     * ```php
     * <?php
     * use \Codeception\Stub\Expected;
     *
     * $user = $this->make('User', [
     *      'setName' => Expected::once()->with('Davert')
     * ]);
     * $user->setName('Davert');
     * ?>
     * ```
     *
     * @see \PHPUnit\Framework\MockObject\Builder\InvocationMocker::with
     * @param array ...$arguments
     * @return StubMarshaler
     */
    public function with(...$arguments)
    {
        $this->methodArguments = $arguments;

        return $this;
    }
}

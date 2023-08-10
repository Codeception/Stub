<?php

declare(strict_types=1);

namespace Codeception\Stub;

use PHPUnit\Framework\MockObject\Rule\InvocationOrder;
use PHPUnit\Framework\MockObject\Stub\Stub;

/**
 * Holds matcher and value of mocked method
 */
class StubMarshaler
{
    private InvocationOrder $methodMatcher;

    private $methodValue;

    public function __construct(InvocationOrder $matcher, $value)
    {
        $this->methodMatcher = $matcher;
        $this->methodValue = $value;
    }

    public function getMatcher(): InvocationOrder
    {
        return $this->methodMatcher;
    }

    /**
     * @return Stub
     */
    public function getValue()
    {
        return $this->methodValue;
    }
}

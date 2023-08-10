<?php

declare(strict_types=1);

namespace Codeception\Stub;

use PHPUnit\Framework\MockObject\Invocation;
use PHPUnit\Framework\MockObject\Stub\Stub;
use SebastianBergmann\Exporter\Exporter;

/**
 * Holds matcher and value of mocked method
 */
class ConsecutiveMap implements Stub
{
    private array $consecutiveMap = [];

    /**
     * @var mixed
     */
    private $value;

    public function __construct(array $consecutiveMap)
    {
        $this->consecutiveMap = $consecutiveMap;
    }

    public function invoke(Invocation $invocation)
    {
        $this->value = array_shift($this->consecutiveMap);

        if ($this->value instanceof Stub) {
            $this->value = $this->value->invoke($invocation);
        }

        return $this->value;
    }

    public function toString(): string
    {
        $exporter = new Exporter;

        return sprintf(
            'return user-specified value %s',
            $exporter->export($this->value),
        );
    }
}

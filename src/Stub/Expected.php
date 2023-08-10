<?php

declare(strict_types=1);

namespace Codeception\Stub;

use Closure;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;
use PHPUnit\Framework\MockObject\Stub\Stub;

class Expected
{
    /**
     * Checks if a method never has been invoked
     *
     * If method invoked, it will immediately throw an
     * exception.
     *
     * ```php
     * <?php
     * use \Codeception\Stub\Expected;
     *
     * $user = $this->make('User', [
     *      'getName' => Expected::never(),
     *      'someMethod' => function() {}
     * ]);
     * $user->someMethod();
     * ```
     *
     * @param mixed $params
     */
    public static function never($params = null): StubMarshaler
    {
        return new StubMarshaler(
            new InvokedCount(0),
            self::stubIfClosure($params)
        );
    }

    /**
     * Checks if a method has been invoked exactly one
     * time.
     *
     * If the number is less or greater it will later be checked in verify() and also throw an
     * exception.
     *
     * ```php
     * <?php
     * use \Codeception\Stub\Expected;
     *
     * $user = $this->make(
     *     'User',
     *     array(
     *         'getName' => Expected::once('Davert'),
     *         'someMethod' => function() {}
     *     )
     * );
     * $userName = $user->getName();
     * $this->assertEquals('Davert', $userName);
     * ```
     * Alternatively, a function can be passed as parameter:
     *
     * ```php
     * <?php
     * Expected::once(function() { return Faker::name(); });
     * ```
     *
     * PHPUnit Stub can also be passed as parameter:
     * 
     * ```php
     * <?php
     * Expected::exactly(3, new ReturnSelf());
     * ```
     *
     * @param mixed $params
     */
    public static function once($params = null): StubMarshaler
    {
        return new StubMarshaler(
            new InvokedCount(1),
            self::stubIfClosure($params)
        );
    }

    /**
     * Checks if a method has been invoked at least one
     * time.
     *
     * If the number of invocations is 0 it will throw an exception in verify.
     *
     * ```php
     * <?php
     * use \Codeception\Stub\Expected;
     *
     * $user = $this->make(
     *     'User',
     *     array(
     *         'getName' => Expected::atLeastOnce('Davert')),
     *         'someMethod' => function() {}
     *     )
     * );
     * $user->getName();
     * $userName = $user->getName();
     * $this->assertEquals('Davert', $userName);
     * ```
     *
     * Alternatively, a function can be passed as parameter:
     *
     * ```php
     * <?php
     * Expected::atLeastOnce(function() { return Faker::name(); });
     * ```
     * 
     * ConsecutiveMap can also be passed as parameter:
     * 
     * ```php
     * <?php
     * Expected::exactly(3, Stub::consecutive(1,2,3));
     * ```
     *
     * PHPUnit Stub can also be passed as parameter:
     * 
     * ```php
     * <?php
     * Expected::exactly(3, new ReturnSelf());
     * ```
     *
     * @param mixed $params
     */
    public static function atLeastOnce($params = null): StubMarshaler
    {
        return new StubMarshaler(
            new InvokedAtLeastOnce(),
            self::stubIfClosure($params)
        );
    }

    /**
     * Checks if a method has been invoked a certain amount
     * of times.
     * If the number of invocations exceeds the value it will immediately throw an
     * exception,
     * If the number is less it will later be checked in verify() and also throw an
     * exception.
     *
     * ``` php
     * <?php
     * use \Codeception\Stub;
     * use \Codeception\Stub\Expected;
     *
     * $user = $this->make(
     *     'User',
     *     array(
     *         'getName' => Expected::exactly(3, 'Davert'),
     *         'someMethod' => function() {}
     *     )
     * );
     * $user->getName();
     * $user->getName();
     * $userName = $user->getName();
     * $this->assertEquals('Davert', $userName);
     * ```
     * Alternatively, a function can be passed as parameter:
     *
     * ```php
     * <?php
     * Expected::exactly(function() { return Faker::name() });
     * ```
     * 
     * ConsecutiveMap can also be passed as parameter:
     * 
     * ```php
     * <?php
     * Expected::exactly(3, Stub::consecutive(1,2,3));
     * ```
     *
     * PHPUnit Stub can also be passed as parameter:
     * 
     * ```php
     * <?php
     * Expected::exactly(3, new ReturnSelf());
     * ```
     *
     * @param mixed $params
     */
    public static function exactly(int $count, $params = null): StubMarshaler
    {
        return new StubMarshaler(
            new InvokedCount($count),
            self::stubIfClosure($params)
        );
    }

    private static function stubIfClosure($params) : Stub
    {
        if ($params instanceof Stub) {
            return $params;
        }

        return new ReturnCallback(self::closureIfNull($params));
    }

    private static function closureIfNull($params): Closure
    {
        if ($params instanceof Closure) {
            return $params;
        }

        return fn() => $params;
    }
}

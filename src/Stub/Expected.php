<?php

namespace Codeception\Stub;

use PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastOnce;
use PHPUnit\Framework\MockObject\Matcher\InvokedCount;

class Expected
{
    /**
     * Checks if a method never has been invoked
     *
     * If method invoked, it will immediately throw an
     * exception.
     *
     * ``` php
     * <?php
     * $user = Stub::make('User', array('getName' => Stub::never(), 'someMethod' => function() {}));
     * $user->someMethod();
     * ?>
     * ```
     *
     * @param mixed $params
     *
     * @return StubMarshaler
     */
    public static function never($params = null)
    {
        return new StubMarshaler(
            new InvokedCount(0),
            self::closureIfNull($params)
        );
    }

    /**
     * Checks if a method has been invoked exactly one
     * time.
     *
     * If the number is less or greater it will later be checked in verify() and also throw an
     * exception.
     *
     * ``` php
     * <?php
     * $user = Stub::make(
     *     'User',
     *     array(
     *         'getName' => Expected::once(function() { return 'Davert'; }),
     *         'someMethod' => function() {}
     *     )
     * );
     * $userName = $user->getName();
     * $this->assertEquals('Davert', $userName);
     * ?>
     * ```
     *
     * @param mixed $params
     *
     * @return StubMarshaler
     */
    public static function once($params = null)
    {
        return new StubMarshaler(
            new InvokedCount(1),
            self::closureIfNull($params)
        );
    }

    /**
     * Checks if a method has been invoked at least one
     * time.
     *
     * If the number of invocations is 0 it will throw an exception in verify.
     *
     * ``` php
     * <?php
     * $user = Stub::make(
     *     'User',
     *     array(
     *         'getName' => Expected::atLeastOnce(function() { return 'Davert'; }),
     *         'someMethod' => function() {}
     *     )
     * );
     * $user->getName();
     * $user->getName();
     * ?>
     * ```
     *
     * @param mixed $params
     *
     * @return StubMarshaler
     */
    public static function atLeastOnce($params = null)
    {
        return new StubMarshaler(
            new InvokedAtLeastOnce(),
            self::closureIfNull($params)
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
     * $user = Stub::make(
     *     'User',
     *     array(
     *         'getName' => Expected::exactly(3, function() { return 'Davert'; }),
     *         'someMethod' => function() {}
     *     )
     * );
     * $user->getName();
     * $user->getName();
     * $user->getName();
     * ?>
     * ```
     *
     * @param int $count
     * @param mixed $params
     *
     * @return StubMarshaler
     */
    public static function exactly($count, $params = null)
    {
        return new StubMarshaler(
            new InvokedCount($count),
            self::closureIfNull($params)
        );
    }

    private static function closureIfNull($params)
    {
        if ($params == null) {
            return function () {
            };
        } else {
            return $params;
        }
    }

}
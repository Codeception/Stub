<?php
if (!class_exists('PHPUnit_Framework_TestCase') && class_exists('PHPUnit\Framework\TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
    class_alias('PHPUnit\Runner\Version', 'PHPUnit_Runner_Version');
}

if (!class_exists('PHPUnit\Framework\MockObject\Generator')) {
    class_alias('PHPUnit\Framework\MockObject\Generator', 'PHPUnit_Framework_MockObject_Generator');
    class_alias('PHPUnit\Framework\MockObject\InvocationMocker', 'PHPUnit_Framework_MockObject_InvocationMocker');
    class_alias('PHPUnit\Framework\MockObject\Invokable', 'PHPUnit_Framework_MockObject_Invokable');
    class_alias('PHPUnit\Framework\MockObject\Matcher', 'PHPUnit_Framework_MockObject_Matcher');
    class_alias('PHPUnit\Framework\MockObject\MockBuilder', 'PHPUnit_Framework_MockObject_MockBuilder');
    if (!interface_exists('PHPUnit_Framework_MockObject_MockObject')) {
        /*
         * old name still exists in https://github.com/sebastianbergmann/phpunit-mock-objects/blob/master/src/MockObject.php
         * but namespaced alias is provided by https://github.com/sebastianbergmann/phpunit-mock-objects/blob/master/src/ForwardCompatibility/MockObject.php
         */
        class_alias('PHPUnit\Framework\MockObject\MockObject', 'PHPUnit_Framework_MockObject_MockObject');
    }
    class_alias('PHPUnit\Framework\MockObject\Stub', 'PHPUnit_Framework_MockObject_Stub');
    class_alias('PHPUnit\Framework\MockObject\Verifiable', 'PHPUnit_Framework_MockObject_Verifiable');
    class_alias('PHPUnit\Framework\MockObject\Matcher\AnyInvokedCount', 'PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount');
    class_alias('PHPUnit\Framework\MockObject\Matcher\ConsecutiveParameters', 'PHPUnit_Framework_MockObject_Matcher_ConsecutiveParameters');
    class_alias('PHPUnit\Framework\MockObject\Matcher\Invocation', 'PHPUnit_Framework_MockObject_Matcher_Invocation');
    class_alias('PHPUnit\Framework\MockObject\Matcher\InvokedAtIndex', 'PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex');
    class_alias('PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastCount', 'PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount');
    class_alias('PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastOnce', 'PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce');
    class_alias('PHPUnit\Framework\MockObject\Matcher\InvokedAtMostCount', 'PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount');
    class_alias('PHPUnit\Framework\MockObject\Matcher\InvokedCount', 'PHPUnit_Framework_MockObject_Matcher_InvokedCount');
    class_alias('PHPUnit\Framework\MockObject\Matcher\InvokedRecorder', 'PHPUnit_Framework_MockObject_Matcher_InvokedRecorder');
    class_alias('PHPUnit\Framework\MockObject\Matcher\MethodName', 'PHPUnit_Framework_MockObject_Matcher_MethodName');
    class_alias('PHPUnit\Framework\MockObject\Matcher\Parameters', 'PHPUnit_Framework_MockObject_Matcher_Parameters');
    class_alias('PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls', 'PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls');
    class_alias('PHPUnit\Framework\MockObject\Stub\Exception', 'PHPUnit_Framework_MockObject_Stub_Exception');
    class_alias('PHPUnit\Framework\MockObject\Stub\ReturnArgument', 'PHPUnit_Framework_MockObject_Stub_ReturnArgument');
    class_alias('PHPUnit\Framework\MockObject\Stub\ReturnCallback', 'PHPUnit_Framework_MockObject_Stub_ReturnCallback');
    class_alias('PHPUnit\Framework\MockObject\Stub\ReturnStub', 'PHPUnit_Framework_MockObject_Stub_Return');
}
<?php

namespace Redexperts\ErrbitBundle\Tests\EventListener;

use Redexperts\ErrbitBundle\EventListener\ErrbitExceptionListener;

class ErrbitExceptionListenerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->event = \Mockery::mock('Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent');
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @test
     */
    public function listenerShouldNotifyErrbitExceptionBecauseLogIsEnabled()
    {
        $errbit = \Mockery::mock('Errbit\Errbit', array('configure' => null));
        $errbit
            ->shouldReceive('notify')
            ->once()
            ->andReturnNull();
        $listener = new ErrbitExceptionListener($errbit, true);
        $this
            ->event
            ->shouldReceive('getException')
            ->once()
            ->withAnyArgs()
            ->andReturn(new \InvalidArgumentException());

        $listener->onKernelException($this->event);
    }

    /**
     * @test
     */
    public function listenerShouldNotNotifyErrbitExceptionBecauseLogIsDisabled()
    {
        $errbit = \Mockery::mock('Errbit\Errbit', array('configure' => null));
        $errbit
            ->shouldReceive('notify')
            ->never();
        $listener = new ErrbitExceptionListener($errbit, false);
        $listener->onKernelException($this->event);
    }
}

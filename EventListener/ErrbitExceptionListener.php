<?php

namespace Redexperts\ErrbitBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Errbit\Errbit;

class ErrbitExceptionListener
{
    /**
     * @var Errbit\Errbit
     */
    private $errbit;

    /**
     * @var boolean
     */
    private $enableLog;

    /**
     * Constructor
     *
     * @param Errbit\Errbit $errbit
     * @param boolean       $enableLog
     */
    public function __construct(Errbit $errbit, $enableLog)
    {
        $this->enableLog = $enableLog;
        $this->errbit = $errbit;
    }

    /**
     * Handle exception method
     *
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->enableLog) {
            // get exeption and send to errbit
            $this->errbit->notify($event->getException());
        }
    }
}

<?php

namespace Redexperts\ErrbitBundle\EventListener;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Errbit\Errbit;

class ErrbitExceptionListener
{
    /**
     * @var boolean
     */
    private $enableLog;

    /**
     * Constructor
     *
     * @param array $errbitParams
     */
    public function __construct(array $errbitParams)
    {
        $this->enableLog = $errbitParams['errbit_enable_log'];
        Errbit::instance()->configure($errbitParams);
    }

    /**
     * Handle exception method
     *
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->enableLog && !$event->getException() instanceof NotFoundHttpException) {
            // get exeption and send to errbit
            Errbit::instance()->notify($event->getException());
        }
    }
}

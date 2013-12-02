<?php

namespace Redexperts\ErrbitBundle\Tests\Errbit;

use Redexperts\ErrbitBundle\Errbit\ErrbitFactory;

class ErrbitFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function errbitFactoryShouldReturnsErrbitInstance()
    {
        $errbitParams = array(
            'api_key' => 'foo',
            'host' => 'localhost'
        );
        $instance = ErrbitFactory::get($errbitParams);
        $this->assertInstanceOf('Errbit\Errbit', $instance);
    }
}

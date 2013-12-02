<?php

namespace Redexperts\ErrbitBundle\Errbit;

use Errbit\Errbit;

class ErrbitFactory
{
    /**
     * Create errbit instance
     *
     * @param  array          $errbitParams
     * @return \Errbit\Errbit
     */
    public static function get(array $errbitParams)
    {
        $errbit = Errbit::instance();
        $errbit->configure($errbitParams);

        return $errbit;
    }
}

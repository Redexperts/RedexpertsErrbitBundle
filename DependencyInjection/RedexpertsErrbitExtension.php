<?php

namespace Redexperts\ErrbitBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class RedexpertsErrbitExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $errbitFactory = $container->getDefinition('redexperts.errbit');
        $errbitFactory->replaceArgument(0, $config['errbit']);

        $eventListener = $container->getDefinition('redexperts.errbit.exception.listener');
        $eventListener->replaceArgument(1, $config['errbit']['errbit_enable_log']);
    }
}

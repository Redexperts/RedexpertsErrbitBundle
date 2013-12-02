<?php

namespace Redexperts\ErrbitBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {
 *     @link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class
 * }
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('redexperts_errbit');

        $rootNode
            ->children()
                ->arrayNode('errbit')
                    ->isRequired()
                    ->children()
                        ->booleanNode('errbit_enable_log')
                            ->defaultTrue()
                            ->isRequired()
                        ->end()
                        ->scalarNode('api_key')
                            ->isRequired()
                        ->end()
                        ->scalarNode('host')
                            ->isRequired()
                        ->end()
                        ->integerNode('port')
                            ->defaultValue('80')
                            ->isRequired()
                        ->end()
                        ->scalarNode('environment_name')
                            ->defaultValue('local')
                            ->isRequired()
                        ->end()
                        ->arrayNode('skipped_exceptions')
                            ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}

<?php
namespace Zhil\UdpNotifierBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('udp_notifier');

        $rootNode
            ->children()
                ->arrayNode('servers')
                    ->isRequired()
                    ->children()
                        ->arrayNode('server')
                            ->isRequired()
                            ->children()
                                ->booleanNode('enabled')->isRequired()->end()
                                ->scalarNode('ip')->isRequired()->end()
                                ->integerNode('port')->isRequired()->end()
                                ->scalarNode('secret')->isRequired()->end()
                                ->scalarNode('handle')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

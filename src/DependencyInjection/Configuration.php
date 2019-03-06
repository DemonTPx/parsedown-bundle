<?php

namespace Demontpx\ParsedownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @copyright 2015 Bert Hekman
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('demontpx_parsedown');

        // For BC with symfony/config < 4.2
        if (method_exists($treeBuilder, 'getRootNode')) {
            /** @var ArrayNodeDefinition $rootNode */
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('demontpx_parsedown');
        }

        $rootNode
            ->children()
                ->booleanNode('breaks_enabled')->defaultFalse()->end()
                ->booleanNode('markup_escaped')->defaultFalse()->end()
                ->booleanNode('urls_linked')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }
}

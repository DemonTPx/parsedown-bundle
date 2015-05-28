<?php

namespace Demontpx\ParsedownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('demontpx_parsedown');

        $rootNode
            ->children()
                ->booleanNode('breaks_enabled')->defaultFalse()->end()
                ->booleanNode('markup_escaped')->defaultFalse()->end()
                ->booleanNode('urls_linked')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }
}

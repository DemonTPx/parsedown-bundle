<?php

namespace Demontpx\ParsedownBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class DemontpxParsedownExtension
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class DemontpxParsedownExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('demontpx_parsedown.breaks_enabled', $config['breaks_enabled']);
        $container->setParameter('demontpx_parsedown.markup_escaped', $config['markup_escaped']);
        $container->setParameter('demontpx_parsedown.urls_linked', $config['urls_linked']);
    }
}

<?php

namespace Demontpx\ParsedownBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DemontpxParsedownExtensionTest
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class DemontpxParsedownExtensionTest extends \PHPUnit_Framework_TestCase 
{
    public function testRoot()
    {
        $root = 'demontpx_parsedown.';

        $configs = [];

        $extension = new DemontpxParsedownExtension();
        $extension->load($configs, $container = new ContainerBuilder());

        foreach (array_keys($container->getDefinitions()) as $name) {
            $this->assertStringStartsWith($root, $name);
        }
        foreach (array_keys($container->getAliases()) as $name) {
            $this->assertStringStartsWith($root, $name);
        }
        foreach (array_keys($container->getParameterBag()->all()) as $name) {
            $this->assertStringStartsWith($root, $name);
        }
    }

    public function testDefaults()
    {
        $configs = [];

        $extension = new DemontpxParsedownExtension();
        $extension->load($configs, $container = new ContainerBuilder());

        $this->assertFalse($container->getParameter('demontpx_parsedown.breaks_enabled'));
        $this->assertFalse($container->getParameter('demontpx_parsedown.markup_escaped'));
        $this->assertTrue($container->getParameter('demontpx_parsedown.urls_linked'));
    }

    public function testDifferentSettings()
    {
        $configs = [[
            'breaks_enabled' => true,
            'markup_escaped' => true,
            'urls_linked' => false,
        ]];

        $extension = new DemontpxParsedownExtension();
        $extension->load($configs, $container = new ContainerBuilder());

        $this->assertTrue($container->getParameter('demontpx_parsedown.breaks_enabled'));
        $this->assertTrue($container->getParameter('demontpx_parsedown.markup_escaped'));
        $this->assertFalse($container->getParameter('demontpx_parsedown.urls_linked'));
    }
}

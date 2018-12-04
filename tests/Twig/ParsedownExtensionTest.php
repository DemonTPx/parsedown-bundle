<?php

namespace Demontpx\ParsedownBundle\Twig;

use Demontpx\ParsedownBundle\Parsedown;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;

/**
 * @copyright 2015 Bert Hekman
 */
class ParsedownExtensionTest extends TestCase
{
    /** @var ParsedownExtension */
    private $extension;
    /** @var Mock|Parsedown */
    private $parsedown;

    protected function setUp()
    {
        $this->parsedown = \Mockery::mock(Parsedown::class);
        $this->extension = new ParsedownExtension($this->parsedown);
    }

    public function testGetFilters()
    {
        $expectedResult = [
            new \Twig_Filter('markdown', [$this->parsedown, 'text'], ['is_safe' => ['html']]),
            new \Twig_Filter('strip_markdown', [$this->parsedown, 'strip'], ['is_safe' => ['html']]),
        ];

        $this->assertEquals($expectedResult, $this->extension->getFilters());
    }
}

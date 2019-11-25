<?php declare(strict_types=1);

namespace Demontpx\ParsedownBundle\Twig;

use Demontpx\ParsedownBundle\Parsedown;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\Mock;
use Twig\TwigFilter;

/**
 * @copyright 2015 Bert Hekman
 */
class ParsedownExtensionTest extends MockeryTestCase
{
    /** @var ParsedownExtension */
    private $extension;
    /** @var Mock|Parsedown */
    private $parsedown;

    protected function setUp(): void
    {
        $this->parsedown = \Mockery::mock(Parsedown::class);
        $this->extension = new ParsedownExtension($this->parsedown);
    }

    public function testGetFilters()
    {
        $expectedResult = [
            new TwigFilter('markdown', [$this->parsedown, 'text'], ['is_safe' => ['html']]),
            new TwigFilter('strip_markdown', [$this->parsedown, 'strip'], ['is_safe' => ['html']]),
        ];

        $this->assertEquals($expectedResult, $this->extension->getFilters());
    }
}

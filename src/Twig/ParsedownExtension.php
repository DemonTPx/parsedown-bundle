<?php declare(strict_types=1);

namespace Demontpx\ParsedownBundle\Twig;

use Demontpx\ParsedownBundle\Parsedown;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * @copyright 2015 Bert Hekman
 */
class ParsedownExtension extends AbstractExtension
{
    /** @var Parsedown */
    private $parser;

    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('markdown', [$this->parser, 'text'], ['is_safe' => ['html']]),
            new TwigFilter('strip_markdown', [$this->parser, 'strip'], ['is_safe' => ['html']]),
        ];
    }
}

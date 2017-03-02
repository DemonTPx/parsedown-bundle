<?php

namespace Demontpx\ParsedownBundle\Twig;

use Demontpx\ParsedownBundle\Parsedown;

/**
 * Class ParsedownExtension
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class ParsedownExtension extends \Twig_Extension
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
            new \Twig_SimpleFilter('markdown', [$this->parser, 'text'], ['is_safe' => ['html']]),
            new \Twig_SimpleFilter('strip_markdown', [$this->parser, 'strip'], ['is_safe' => ['html']]),
        ];
    }
}

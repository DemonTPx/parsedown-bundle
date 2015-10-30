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

    /**
     * @param Parsedown $parser
     */
    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('markdown', [$this, 'parsedown'], ['is_safe' => ['html']]),
            new \Twig_SimpleFilter('strip_markdown', [$this, 'strip'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function parsedown($text)
    {
        return $this->parser->text($text);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function strip($text)
    {
        return $this->parser->strip($text);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'demontpx_parsedown';
    }
}

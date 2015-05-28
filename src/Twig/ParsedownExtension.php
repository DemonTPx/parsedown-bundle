<?php

namespace Demontpx\ParsedownBundle\Twig;

/**
 * Class ParsedownExtension
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class ParsedownExtension extends \Twig_Extension
{
    /** @var \Parsedown */
    private $parser;

    /**
     * @param \Parsedown $parser
     */
    public function __construct(\Parsedown $parser)
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
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'demontpx_parsedown';
    }
}

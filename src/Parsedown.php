<?php

namespace Demontpx\ParsedownBundle;

/**
 * Class Parsedown
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class Parsedown extends \Parsedown
{
    /**
     * @param string $text
     *
     * @return string
     */
    public function strip($text)
    {
        return html_entity_decode(strip_tags($this->text($text)), null, 'UTF-8');
    }
}

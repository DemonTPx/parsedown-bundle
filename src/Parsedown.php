<?php declare(strict_types=1);

namespace Demontpx\ParsedownBundle;

use function html_entity_decode;
use function strip_tags;

/**
 * @copyright 2015 Bert Hekman
 */
class Parsedown extends \Parsedown
{
    public function strip(string $text): string
    {
        return html_entity_decode(strip_tags($this->text($text)), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}

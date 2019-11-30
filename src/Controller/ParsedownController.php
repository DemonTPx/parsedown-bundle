<?php declare(strict_types=1);

namespace Demontpx\ParsedownBundle\Controller;

use Parsedown;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @copyright 2015 Bert Hekman
 */
class ParsedownController
{
    private Parsedown $parsedown;

    public function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function parseAction(Request $request): Response
    {
        $parsed = $this->parsedown->text($request->getContent());

        return new Response($parsed);
    }
}

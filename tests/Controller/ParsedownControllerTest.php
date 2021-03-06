<?php declare(strict_types=1);

namespace Demontpx\ParsedownBundle\Controller;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\Mock;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @copyright 2015 Bert Hekman
 */
class ParsedownControllerTest extends MockeryTestCase
{
    public function test()
    {
        /** @var Mock|\Parsedown $parsedown */
        $parsedown = \Mockery::mock(\Parsedown::class);

        $controller = new ParsedownController($parsedown);

        $content = 'This is some unparsed content!';
        $parsedContent = '<p>This is some parsed content!</p>';

        /** @var Mock|Request $request */
        $request = \Mockery::mock(Request::class);
        $request->shouldReceive('getContent')
            ->andReturn($content);

        $parsedown->shouldReceive('text')
            ->with($content)
            ->andReturn($parsedContent);

        $result = $controller->parseAction($request);

        $this->assertInstanceOf(Response::class, $result);
        $this->assertSame($parsedContent, $result->getContent());
    }
}

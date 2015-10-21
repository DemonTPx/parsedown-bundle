<?php

namespace Demontpx\ParsedownBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class ParsedownControllerTest
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class ParsedownControllerTest extends \PHPUnit_Framework_TestCase 
{
    public function test()
    {
        $parsedown = $this->createMockParsedown();

        $controller = new ParsedownController($parsedown);

        $content = 'This is some unparsed content!';
        $parsedContent = '<p>This is some parsed content!</p>';

        $request = $this->createMockRequest();
        $request->expects($this->any())
            ->method('getContent')
            ->willReturn($content);

        $parsedown->expects($this->once())
            ->method('text')
            ->with($content)
            ->willReturn($parsedContent);

        $result = $controller->parseAction($request);

        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $result);
        $this->assertSame($parsedContent, $result->getContent());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Parsedown
     */
    public function createMockParsedown()
    {
        return $this->getMockBuilder('Parsedown')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Request
     */
    public function createMockRequest()
    {
        return $this->getMockBuilder('Symfony\Component\HttpFoundation\Request')
            ->disableOriginalConstructor()
            ->getMock();
    }
}

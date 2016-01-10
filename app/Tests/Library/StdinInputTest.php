<?php

namespace App\Tests\Library;


use App\Library\WordFrequency;

class StdinInputTest extends \PHPUnit_Framework_TestCase
{


    public function testRead() {

        $mockLogger = $this->getMockBuilder('\\App\\Library\\LoggerCLI')
            ->disableOriginalConstructor()
            ->setMethods(['info'])
            ->getMock();

        $mockInputStrategy = $this->getMockBuilder('\\App\\Library\\StdinInput')
            ->setConstructorArgs([$mockLogger])
            ->setMethods(null)
            ->getMock();

        

        $mockInputStrategy->open(__DIR__.'/../testsdir/stream1.txt');

        $output = $mockInputStrategy->read();

        $this->assertEquals("ten nine eight, seven six five four three two one\n", $output);

    }

}


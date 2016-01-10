<?php

namespace App\Tests\Library;


use App\Library\WordFrequency;

class FileInputTest extends \PHPUnit_Framework_TestCase
{


    public function testRead() {

        $filePath = __DIR__.'/../testsdir/stream2.txt';

        $mockLogger = $this->getMockBuilder('\\App\\Library\\LoggerCLI')
            ->disableOriginalConstructor()
            ->setMethods(['info'])
            ->getMock();

        $mockInputStrategy = $this->getMockBuilder('\\App\\Library\\FIleInput')
            ->setConstructorArgs([$filePath, $mockLogger])
            ->setMethods(null)
            ->getMock();

        $content = '';

        while($output = $mockInputStrategy->read()){

            $content .= $output;

        }


        $this->assertEquals(file_get_contents($filePath), $content);

    }

}


<?php

namespace App\Tests\Library;


use App\Library\WordFrequency;

class WordFrequencyTest extends \PHPUnit_Framework_TestCase
{


    public function testGetTableStream() {

    	$mockLogger = $this->getMockBuilder('\\App\\Library\\LoggerCLI')
            ->disableOriginalConstructor()
            ->setMethods(['info'])
            ->getMock();


        $mockInputStrategy = $this->getMockBuilder('\\App\\Library\\StdinInput')
            ->disableOriginalConstructor()
            ->setMethods(['read'])
            ->getMock();

        $mockInputStrategy->expects($this->at(0))
        				->method('read')
        				->willReturn("This is the first line.");

		$mockInputStrategy->expects($this->at(1))
        				->method('read')
        				->willReturn("This is the second line.");


        $wordFrequency = new WordFrequency($mockInputStrategy, $mockLogger);

        $table = $wordFrequency->getTable();

        $this->assertSame(['first'=>1, 'is'=>2, 'line'=>2, 'second'=>1, 'the'=>2, 'this'=>2], $table);

    }

    public function testGetTableSingle() {

    	$mockLogger = $this->getMockBuilder('\\App\\Library\\LoggerCLI')
            ->disableOriginalConstructor()
            ->setMethods(['info'])
            ->getMock();


        $mockInputStrategy = $this->getMockBuilder('\\App\\Library\\StdinInput')
            ->disableOriginalConstructor()
            ->setMethods(['read'])
            ->getMock();

        $mockInputStrategy->expects($this->at(0))
        				->method('read')
        				->willReturn("This is one line.");


        $wordFrequency = new WordFrequency($mockInputStrategy, $mockLogger);

        $table = $wordFrequency->getTable();

        $this->assertSame(['is'=>1, 'line'=>1, 'one'=>1, 'this'=>1], $table);

    }

}


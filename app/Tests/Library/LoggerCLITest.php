<?php

namespace App\Tests\Library;


use App\Library\LoggerCLI;

class LoggerCLITest extends \PHPUnit_Framework_TestCase
{


    public function testVerboseDisabled() {

        $this->expectOutputString(null);

        $logger = new LoggerCLI(LoggerCLI::LEVEL_DISABLED);

        $logger->error('Should be ignored');

        $logger->info('Should be ignored');


    }


    public function testVerboseErrors() {

        $message = 'Should be logged';

        $this->expectOutputString("[ERROR]\t{$message}\n");

        $logger = new LoggerCLI(LoggerCLI::LEVEL_ERRORS);

        $logger->error($message);

        $logger->info('Should be ignored');

    }


    public function testVerboseALL() {

        $message1 = 'Should be logged1';

        $message2 = 'Should be logged2';

        $this->expectOutputString("[ERROR]\t{$message1}\n[INFO]\t{$message2}\n");

        $logger = new LoggerCLI(LoggerCLI::LEVEL_ALL);

        $logger->error($message1);

        $logger->info($message2);

    }
}


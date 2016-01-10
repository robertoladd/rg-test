<?php

namespace App\Tests\Library;


use App\Library\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{


    public function testParamsSet() {

        $params = [
            'one' => 'valueOne',
            'two' => 'valueTwo',
        ];

        $config = new Config($params);

        $this->assertEquals($params['one'], $config->get('one'));

        $this->assertEquals($params['two'], $config->get('two'));

    }

}


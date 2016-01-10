<?php

namespace App\Library;


class Config
{
    protected $params = [];

    /**
     * @param array $params
     */

    public function __construct(Array $params) {

        $this->params = $params;

    }

    /**
     * @param $param
     * @return mixed
     * @throws \Exception
     */

    public function get($param){

        if(!isset($this->params[$param])){
            throw new \Exception('Attempt to access undefined configuration param: '.$param);
        }

        return $this->params[$param];

    }

}
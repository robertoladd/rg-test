<?php

namespace App\Library;


interface LoggerInterface
{

    public function error($message);

    public function info($message);

}
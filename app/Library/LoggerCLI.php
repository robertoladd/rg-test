<?php

namespace App\Library;


class LoggerCLI implements LoggerInterface
{

    const LEVEL_DISABLED = 0;

    const LEVEL_ERRORS = 1;

    const LEVEL_ALL = 2;

    /** @var INT $level */
    protected $level;

    /**
     * @param int $level
     */

    public function __construct($level = 2) {

        $this->level = (int) $level;

    }

    /**
     * @param int $level
     */
    
    public function setLevel($level) {

        $this->level = (int) $level;

    }

    public function error($message){

        if($this->level >= self::LEVEL_ERRORS) {

            echo "[ERROR]\t".$message."\n";

        }
    }

    public function info($message){

        if($this->level >= self::LEVEL_ALL) {

            echo "[INFO]\t".$message."\n";

        }
    }
}
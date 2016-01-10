<?php

namespace App\Cli;

use App\Library\CLI;

use App\Library\WordFrequency;

use App\Library\StdinInput;

use App\Library\FileInput;

use App\Library\URLInput;

class WordFrequencyTask extends CLI
{

    /**
     * Long Options that the cli task will use
     * @var string $options
     */
    public $longOptions = [
        'url::',
        'file::',
        'cleanhtml::',
    ];

    public function main(array $options) {


        switch(true) {
            case isset($options['url']):
                $inputStrategy = new URLInput($options['url'], $this->logger);
            break;
            case isset($options['file']):
                $inputStrategy = new FileInput($options['file'], $this->logger);
            break;
            default:

                $inputStrategy = new StdinInput($this->logger);

            break;
        }

        $cleanHTMLTags = isset($options['cleanhtml']) && $options['cleanhtml'] == true;

        $WordFrequency = new WordFrequency($inputStrategy, $this->logger, $cleanHTMLTags);

        print_r($WordFrequency->getTable());

    }


}
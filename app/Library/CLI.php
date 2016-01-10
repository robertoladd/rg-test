<?php
namespace App\Library;


use App\Library\LoggerInterface;


class CLI{

	const TASK_CLASS_SUFFIX = "Task";
	
	/** @var  LoggerInterface $logger */
	protected $logger;

	/**
     * Options that the cli task will use. Reserved for this class.
     * @var string $options
     */
	private $options = 't:';


	/**
     * Long Options that the cli task will use
     * @var string $options
     */
	public $longOptions = [];

	public function __construct(LoggerInterface $logger) {
		$this->logger = $logger;
	}


	/**
     * Central method to run the task.
     */

	public function main(array $params) {
		$this->logger->error('No main method defined for this task');
	}


	/**
     * Run task if it exists.
     */

	public function runTask(array $argv) {

		$options = getopt($this->options);

		if(!isset($options['t'])){

			$this->logger->error('No task defined, please define the desired task as first argument. Ej; ./cli.php -t WordFrequency');

		}else{

			$tasksNamespace = 'App\\CLI\\';
			$taskClass = $tasksNamespace.$options['t'].self::TASK_CLASS_SUFFIX;

		    if(class_exists($taskClass)){

		    	$taskInstance = new $taskClass($this->logger);

		    	$taskInstance->main(getopt($this->options, $taskInstance->longOptions));

		    }else{

		    	$this->logger->error("Unknown task {$taskClass}.");

		    }

		}

	}



}
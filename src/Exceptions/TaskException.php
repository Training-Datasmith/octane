<?php

namespace Laravel\Octane\Exceptions;

use Exception;

class TaskException extends Exception
{
    /**
     * Creates a new task exception.
     *
     * @param  string  $class
     * @param  string  $message
     * @param  int  $code
     * @param  string  $file
     * @param  int  $line
     */
    public function __construct(/**
     * The original throwable class name.
     */
    protected $class, $message, $code, $file, $line)
    {
        parent::__construct($message, $code);
        $this->file = $file;
        $this->line = $line;
    }

    /**
     * Returns the original throwable class name.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
}

<?php

namespace PHP_CodeSniffer\Console;

use PHP_CodeSniffer\Console\Commands\CsCommand;
use Symfony\Component\Console;

class Application extends Console\Application
{
    public const VERSION = '4.0.0';

    public function __construct()
    {
        parent::__construct('PHP_CodeSniffer', self::VERSION);

        $this->add(new Commands\CbfCommand());
        $this->add(new Commands\CsCommand());

        $this->setDefaultCommand(CsCommand::getDefaultName());
    }
}

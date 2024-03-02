<?php

namespace PHP_CodeSniffer\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CsCommand extends Command
{
    protected static $defaultName = 'cs';

    protected function configure()
    {
        $this->addOption('w', null, InputOption::VALUE_NONE, 'Print both warnings and errors (this is the default)');
        $this->addOption('no-recursion', 'l', InputOption::VALUE_NONE, 'Local directory only, no recursion');
        $this->addOption('s', null, InputOption::VALUE_NONE, 'Show error codes in all reports');
        $this->addOption('interactive', 'a', InputOption::VALUE_NONE, 'Run interactively');
        $this->addOption('explain', 'e', InputOption::VALUE_NONE, 'Explain a standard by showing the sniffs it includes');
        $this->addOption('progress', 'p', InputOption::VALUE_NONE, 'Show progress of the run');
        $this->addOption('quiet', 'q', InputOption::VALUE_NONE, 'Quiet mode; disables progress and verbose output');
        $this->addOption('m', null, InputOption::VALUE_NONE, 'Stop error messages from being recorded (saves a lot of memory, but stops many reports from being used)');
        $this->addOption('installed-standards', 'i', InputOption::VALUE_NONE, 'Show a list of installed coding standards');
        $this->addOption('d', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Set the [key] php.ini value to [value] or [true] if value is omitted');

        $this->addOption('cache', null, InputOption::VALUE_NONE, 'Cache results between runs');
        $this->addOption('no-cache', null, InputOption::VALUE_NONE, 'Do not cache results between runs (this is the default)');
        $this->addOption('ignore-annotations', null, InputOption::VALUE_NONE, 'Ignore all phpcs: annotations in code comments');

        $this->addOption('tab-width', null, InputOption::VALUE_REQUIRED, 'The number of spaces each tab represents');
        $this->addOption('report', null, InputOption::VALUE_REQUIRED,
            'Print either the "full", "xml", "checkstyle", "csv" '.
            '"json", "junit", "emacs", "source", "summary", "diff" '.
            '"svnblame", "gitblame", "hgblame", "notifysend" or "performance", '.
            'report or specify the path to a custom report class '.
            '(the "full" report is printed by default)', 'full');
        $this->addOption('report-file', null, InputOption::VALUE_REQUIRED, 'Write the report to the specified file');
        foreach (['full', 'xml', 'checkstyle', 'csv', 'json', 'junit', 'emacs', 'source', 'summary', 'diff', 'svnblame', 'gitblame', 'hgblame', 'notifysend', 'performance'] as $reportStyle) {
            $this->addOption(sprintf('report-%s', $reportStyle), null, InputOption::VALUE_REQUIRED, sprintf('Write the "%s" report to the specified file', $reportStyle));
        }
        $this->addOption('report-width', null, InputOption::VALUE_REQUIRED, 'How many columns wide screen reports should be printed or set to "auto" to use current screen width, where supported');
        $this->addOption('basepath', null, InputOption::VALUE_REQUIRED, 'A path to strip from the front of file paths inside reports');
        $this->addOption('bootstrap', null, InputOption::VALUE_REQUIRED, 'A comma separated list of files to run before processing begins');
        $this->addOption('severity', null, InputOption::VALUE_REQUIRED, 'The minimum severity required to display an error or warning');
        $this->addOption('error-severity', null, InputOption::VALUE_REQUIRED, 'The minimum severity required to display an error');
        $this->addOption('warning-severity', 'n', InputOption::VALUE_OPTIONAL, 'The minimum severity required to display a warning');
        $this->addOption('runtime-set', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, '???');
        $this->addOption('config-set', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, '???');
        $this->addOption('config-delete', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, '???');
        $this->addOption('config-show', null, InputOption::VALUE_NONE, '???');
        $this->addOption('standard', null, InputOption::VALUE_REQUIRED, 'The name or path of the coding standard to use');
        $this->addOption('sniffs', null, InputOption::VALUE_REQUIRED, 'A comma separated list of sniff codes to include checking (all sniffs must be part of the specified standard)');
        $this->addOption('exclude', null, InputOption::VALUE_REQUIRED, 'A comma separated list of sniff codes to exclude from checking (all sniffs must be part of the specified standard)');
        $this->addOption('parallel', null, InputOption::VALUE_REQUIRED, 'How many files should be checked simultaneously (default is 1)');
        $this->addOption('encoding', null, InputOption::VALUE_REQUIRED, 'The encoding of the files being checked (default is utf-8)');
        $this->addOption('generator', null, InputOption::VALUE_REQUIRED, 'Use either the "HTML", "Markdown" or "Text" generator (forces documentation generation instead of checking)');
        $this->addOption('extensions', null, InputOption::VALUE_REQUIRED, 'A comma separated list of file extensions to check e.g., php,inc,module');
        $this->addOption('ignore', null, InputOption::VALUE_REQUIRED, 'A comma separated list of patterns to ignore files and directories');
        $this->addOption('stdin-path', null, InputOption::VALUE_REQUIRED, 'If processing STDIN, the file path that STDIN will be processed as');
        $this->addOption('file-list', null, InputOption::VALUE_NONE, 'A file containing a list of files and/or directories to check (one per line)');
        $this->addOption('filter', null, InputOption::VALUE_NONE, 'Use either the "GitModified" or "GitStaged" filter, or specify the path to a custom filter class');

        $this->addArgument('file', InputArgument::IS_ARRAY, 'One or more files and/or directories to check. "-": Check STDIN instead of local files and directories');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return Command::SUCCESS;
    }
}

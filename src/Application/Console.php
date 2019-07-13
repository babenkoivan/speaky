<?php
declare(strict_types=1);

namespace Speaky\Application;

use Exception;
use Speaky\Application\Command\CommandInterface;
use Speaky\Application\Input\ConsoleInput;
use Speaky\Application\Output\ConsoleOutput;

final class Console
{
    /**
     * @var array
     */
    private $commands;

    /**
     * @param CommandInterface $command
     */
    public function register(CommandInterface $command): void
    {
        $this->commands[] = $command;
    }

    /**
     * @param array $argv
     */
    public function run(array $argv): void
    {
        $values = array_slice($argv, 1);
        $output = new ConsoleOutput();

        foreach ($this->commands as $command) {
            $keys = preg_split('/\s+/', trim($command->getDefinition()));

            if (count($keys) == count($values)) {
                try {
                    $input = new ConsoleInput($keys, $values);
                    $command->execute($input, $output);
                } catch (Exception $exception) {
                    $output->writeln($exception->getMessage());
                }

                return;
            }
        }

        $output->writeln('Invalid command');
    }
}

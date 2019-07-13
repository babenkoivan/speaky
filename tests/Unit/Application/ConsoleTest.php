<?php
declare(strict_types=1);

namespace Speaky\Unit\Application;

use PHPUnit\Framework\TestCase;
use Speaky\Application\Command\CommandInterface;
use Speaky\Application\Console;
use Speaky\Application\Input\InputInterface;
use Speaky\Application\Output\OutputInterface;

/**
 * @covers \Speaky\Application\Console
 * @uses   \Speaky\Application\Input\ConsoleInput
 * @uses   \Speaky\Application\Output\ConsoleOutput
 */
final class ConsoleTest extends TestCase
{
    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * @before
     */
    public function createCommand(): void
    {
        $this->command = new class implements CommandInterface
        {
            public function getDefinition(): string
            {
                return ' one two   three';
            }

            public function execute(InputInterface $input, OutputInterface $output): void
            {
                $output->writeln('one=' . $input->get('one'));
                $output->writeln('two=' . $input->get('two'));
                $output->writeln('three=' . $input->get('three'));
            }
        };
    }

    public function test_registered_command_can_be_executed(): void
    {
        $this->expectOutputString(
            'one=1' . PHP_EOL .
            'two=2' . PHP_EOL .
            'three=3' . PHP_EOL
        );

        $console = new Console();
        $console->register($this->command);
        $console->run(['bin/console', 1, 2, 3]);
    }

    public function test_default_message_returned_if_given_invalid_input(): void
    {
        $this->expectOutputString('Invalid command' . PHP_EOL);

        $console = new Console();
        $console->register($this->command);
        $console->run(['bin/console', 1, 2]);
    }
}

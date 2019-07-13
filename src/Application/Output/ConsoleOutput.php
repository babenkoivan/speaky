<?php
declare(strict_types=1);

namespace Speaky\Application\Output;

final class ConsoleOutput implements OutputInterface
{
    /**
     * @inheritdoc
     */
    public function writeln(string $string): void
    {
        echo $string, PHP_EOL;
    }
}

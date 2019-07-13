<?php
declare(strict_types=1);

namespace Speaky\Application\Output;

interface OutputInterface
{
    /**
     * @param string $string
     */
    public function writeln(string $string): void;
}

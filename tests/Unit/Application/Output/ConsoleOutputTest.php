<?php
declare(strict_types=1);

namespace Speaky\Unit\Application\Output;

use PHPUnit\Framework\TestCase;
use Speaky\Application\Output\ConsoleOutput;

/**
 * @covers \Speaky\Application\Output\ConsoleOutput
 */
final class ConsoleOutputTest extends TestCase
{
    public function test_a_string_can_be_printed(): void
    {
        $this->expectOutputString('foo bar' . PHP_EOL);
        (new ConsoleOutput())->writeln('foo bar');
    }
}

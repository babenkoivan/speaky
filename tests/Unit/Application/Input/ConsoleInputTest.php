<?php
declare(strict_types=1);

namespace Speaky\Unit\Application\Input;

use PHPUnit\Framework\TestCase;
use Speaky\Application\Input\ConsoleInput;

/**
 * @covers \Speaky\Application\Input\ConsoleInput
 */
final class ConsoleInputTest extends TestCase
{
    public function test_input_can_be_created_and_values_received_via_getter(): void
    {
        $input = new ConsoleInput(['firstCountry', 'secondCountry'], ['Austria', 'Germany']);

        $this->assertSame('Austria', $input->get('firstCountry'));
        $this->assertSame('Germany', $input->get('secondCountry'));
        $this->assertNull($input->get('thirdCountry'));
    }
}

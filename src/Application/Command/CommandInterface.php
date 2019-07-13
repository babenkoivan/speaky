<?php
declare(strict_types=1);

namespace Speaky\Application\Command;

use Speaky\Application\Input\InputInterface;
use Speaky\Application\Output\OutputInterface;

interface CommandInterface
{
    /**
     * @return string
     */
    public function getDefinition(): string;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output): void;
}

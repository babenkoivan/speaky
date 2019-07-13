<?php
declare(strict_types=1);

namespace Speaky\Application\Input;

final class ConsoleInput implements InputInterface
{
    /**
     * @var array
     */
    private $input;

    public function __construct(array $keys, array $values)
    {
        $this->input = array_combine($keys, $values);
    }

    /**
     * @inheritdoc
     */
    public function get(string $key)
    {
        return $this->input[$key] ?? null;
    }
}

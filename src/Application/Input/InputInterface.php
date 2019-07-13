<?php
declare(strict_types=1);

namespace Speaky\Application\Input;

interface InputInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);
}

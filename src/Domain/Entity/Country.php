<?php
declare(strict_types=1);

namespace Speaky\Domain\Entity;

final class Country
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $language;

    /**
     * @param string $id
     * @param string $name
     * @param string $language
     */
    public function __construct(string $id, string $name, string $language)
    {
        $this->id = $id;
        $this->name = $name;
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
}

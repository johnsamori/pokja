<?php

namespace PHPMaker2025\Pokja2025\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2025\Pokja2025\AdvancedUserInterface;
use PHPMaker2025\Pokja2025\AbstractEntity;
use PHPMaker2025\Pokja2025\AdvancedSecurity;
use PHPMaker2025\Pokja2025\UserProfile;
use PHPMaker2025\Pokja2025\UserRepository;
use function PHPMaker2025\Pokja2025\Config;
use function PHPMaker2025\Pokja2025\EntityManager;
use function PHPMaker2025\Pokja2025\RemoveXss;
use function PHPMaker2025\Pokja2025\HtmlDecode;
use function PHPMaker2025\Pokja2025\HashPassword;
use function PHPMaker2025\Pokja2025\Security;

/**
 * Entity class for "items" table
 */

#[Entity]
#[Table("items", options: ["dbId" => "DB"])]
class Item extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "name", type: "string")]
    private string $Name;

    #[Column(name: "description", type: "text", nullable: true)]
    private ?string $Description;

    #[Column(name: "quantity", type: "integer")]
    private int $Quantity;

    #[Column(name: "unit", type: "string", nullable: true)]
    private ?string $Unit;

    #[Column(name: "price", type: "decimal", nullable: true)]
    private ?string $Price;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    #[Column(name: "updated_at", type: "datetime")]
    private DateTime $UpdatedAt;

    public function getId(): int
    {
        return $this->Id;
    }

    public function setId(int $value): static
    {
        $this->Id = $value;
        return $this;
    }

    public function getName(): string
    {
        return HtmlDecode($this->Name);
    }

    public function setName(string $value): static
    {
        $this->Name = RemoveXss($value);
        return $this;
    }

    public function getDescription(): ?string
    {
        return HtmlDecode($this->Description);
    }

    public function setDescription(?string $value): static
    {
        $this->Description = RemoveXss($value);
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $value): static
    {
        $this->Quantity = $value;
        return $this;
    }

    public function getUnit(): ?string
    {
        return HtmlDecode($this->Unit);
    }

    public function setUnit(?string $value): static
    {
        $this->Unit = RemoveXss($value);
        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(?string $value): static
    {
        $this->Price = $value;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(DateTime $value): static
    {
        $this->CreatedAt = $value;
        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(DateTime $value): static
    {
        $this->UpdatedAt = $value;
        return $this;
    }
}

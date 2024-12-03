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
 * Entity class for "suppliers" table
 */

#[Entity]
#[Table("suppliers", options: ["dbId" => "DB"])]
class Supplier extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "name", type: "string")]
    private string $Name;

    #[Column(name: "address", type: "text", nullable: true)]
    private ?string $Address;

    #[Column(name: "phone", type: "string", nullable: true)]
    private ?string $Phone;

    #[Column(name: "email", type: "string", unique: true, nullable: true)]
    private ?string $Email;

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

    public function getAddress(): ?string
    {
        return HtmlDecode($this->Address);
    }

    public function setAddress(?string $value): static
    {
        $this->Address = RemoveXss($value);
        return $this;
    }

    public function getPhone(): ?string
    {
        return HtmlDecode($this->Phone);
    }

    public function setPhone(?string $value): static
    {
        $this->Phone = RemoveXss($value);
        return $this;
    }

    public function getEmail(): ?string
    {
        return HtmlDecode($this->Email);
    }

    public function setEmail(?string $value): static
    {
        $this->Email = RemoveXss($value);
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

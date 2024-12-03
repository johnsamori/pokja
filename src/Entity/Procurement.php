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
 * Entity class for "procurements" table
 */

#[Entity]
#[Table("procurements", options: ["dbId" => "DB"])]
class Procurement extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "item_id", type: "integer")]
    private int $ItemId;

    #[Column(name: "supplier_id", type: "integer")]
    private int $SupplierId;

    #[Column(name: "user_id", type: "integer")]
    private int $UserId;

    #[Column(name: "status", type: "string", nullable: true)]
    private ?string $Status;

    #[Column(name: "total_price", type: "decimal", nullable: true)]
    private ?string $TotalPrice;

    #[Column(name: "procurement_date", type: "date", nullable: true)]
    private ?DateTime $ProcurementDate;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    #[Column(name: "updated_at", type: "datetime")]
    private DateTime $UpdatedAt;

    public function __construct()
    {
        $this->Status = "draft";
    }

    public function getId(): int
    {
        return $this->Id;
    }

    public function setId(int $value): static
    {
        $this->Id = $value;
        return $this;
    }

    public function getItemId(): int
    {
        return $this->ItemId;
    }

    public function setItemId(int $value): static
    {
        $this->ItemId = $value;
        return $this;
    }

    public function getSupplierId(): int
    {
        return $this->SupplierId;
    }

    public function setSupplierId(int $value): static
    {
        $this->SupplierId = $value;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->UserId;
    }

    public function setUserId(int $value): static
    {
        $this->UserId = $value;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(?string $value): static
    {
        if (!in_array($value, ["draft", "submitted", "approved", "rejected", "completed"])) {
            throw new \InvalidArgumentException("Invalid 'status' value");
        }
        $this->Status = $value;
        return $this;
    }

    public function getTotalPrice(): ?string
    {
        return $this->TotalPrice;
    }

    public function setTotalPrice(?string $value): static
    {
        $this->TotalPrice = $value;
        return $this;
    }

    public function getProcurementDate(): ?DateTime
    {
        return $this->ProcurementDate;
    }

    public function setProcurementDate(?DateTime $value): static
    {
        $this->ProcurementDate = $value;
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

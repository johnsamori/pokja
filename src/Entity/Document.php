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
 * Entity class for "documents" table
 */

#[Entity]
#[Table("documents", options: ["dbId" => "DB"])]
class Document extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "procurement_id", type: "integer")]
    private int $ProcurementId;

    #[Column(name: "file_name", type: "string", nullable: true)]
    private ?string $FileName;

    #[Column(name: "file_path", type: "string", nullable: true)]
    private ?string $FilePath;

    #[Column(name: "uploaded_at", type: "datetime")]
    private DateTime $UploadedAt;

    public function getId(): int
    {
        return $this->Id;
    }

    public function setId(int $value): static
    {
        $this->Id = $value;
        return $this;
    }

    public function getProcurementId(): int
    {
        return $this->ProcurementId;
    }

    public function setProcurementId(int $value): static
    {
        $this->ProcurementId = $value;
        return $this;
    }

    public function getFileName(): ?string
    {
        return HtmlDecode($this->FileName);
    }

    public function setFileName(?string $value): static
    {
        $this->FileName = RemoveXss($value);
        return $this;
    }

    public function getFilePath(): ?string
    {
        return HtmlDecode($this->FilePath);
    }

    public function setFilePath(?string $value): static
    {
        $this->FilePath = RemoveXss($value);
        return $this;
    }

    public function getUploadedAt(): DateTime
    {
        return $this->UploadedAt;
    }

    public function setUploadedAt(DateTime $value): static
    {
        $this->UploadedAt = $value;
        return $this;
    }
}

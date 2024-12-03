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
 * Entity class for "userlevelpermissions" table
 */

#[Entity]
#[Table("userlevelpermissions", options: ["dbId" => "DB"])]
class Userlevelpermission extends AbstractEntity
{
    #[Id]
    #[Column(name: "`UserLevelID`", options: ["name" => "UserLevelID"], type: "integer")]
    private int $UserLevelId;

    #[Id]
    #[Column(type: "string")]
    private string $TableName;

    #[Column(type: "integer")]
    private int $Permission;

    public function __construct(int $UserLevelId, string $TableName)
    {
        $this->UserLevelId = $UserLevelId;
        $this->TableName = $TableName;
    }

    public function getUserLevelId(): int
    {
        return $this->UserLevelId;
    }

    public function setUserLevelId(int $value): static
    {
        $this->UserLevelId = $value;
        return $this;
    }

    public function getTableName(): string
    {
        return $this->TableName;
    }

    public function setTableName(string $value): static
    {
        $this->TableName = $value;
        return $this;
    }

    public function getPermission(): int
    {
        return $this->Permission;
    }

    public function setPermission(int $value): static
    {
        $this->Permission = $value;
        return $this;
    }
}
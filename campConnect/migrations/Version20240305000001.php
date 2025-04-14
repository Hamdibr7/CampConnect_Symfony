<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240305000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add online status fields to Utilisateur entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE utilisateur ADD is_online TINYINT(1) DEFAULT 0 NOT NULL, ADD last_activity_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE utilisateur DROP is_online, DROP last_activity_at');
    }
} 
<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240305000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add media fields to Publication entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE publication ADD media_url VARCHAR(255) DEFAULT NULL, ADD media_type VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE publication DROP media_url, DROP media_type');
    }
} 
<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609043408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quality_factor_work_performed ADD quality_factor1 VARCHAR(255) NOT NULL, ADD quality_factor2 VARCHAR(255) NOT NULL, ADD quality_factor3 VARCHAR(255) NOT NULL, ADD quality_factor4 VARCHAR(255) NOT NULL, ADD quality_factor5 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quality_factor_work_performed DROP quality_factor1, DROP quality_factor2, DROP quality_factor3, DROP quality_factor4, DROP quality_factor5');
    }
}

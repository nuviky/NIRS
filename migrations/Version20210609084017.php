<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609084017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenance_personnel (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quality_factor_work_performed (id INT AUTO_INCREMENT NOT NULL, maintenance_personnel_id INT NOT NULL, relation_id INT NOT NULL, quality_factor VARCHAR(255) NOT NULL, quality_factor1 VARCHAR(255) NOT NULL, quality_factor2 VARCHAR(255) NOT NULL, quality_factor3 VARCHAR(255) NOT NULL, quality_factor4 VARCHAR(255) NOT NULL, quality_factor5 VARCHAR(255) NOT NULL, INDEX IDX_91883E6454A881D7 (maintenance_personnel_id), INDEX IDX_91883E643256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers_qualification_coefficients (id INT AUTO_INCREMENT NOT NULL, maintenance_personnel_id INT NOT NULL, relation_id INT NOT NULL, qualification_coefficient VARCHAR(255) NOT NULL, INDEX IDX_8287188454A881D7 (maintenance_personnel_id), INDEX IDX_828718843256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers_skill_level (id INT AUTO_INCREMENT NOT NULL, maintenance_personnel_id INT NOT NULL, relation_id INT NOT NULL, skill_level VARCHAR(255) NOT NULL, INDEX IDX_CD72C0D054A881D7 (maintenance_personnel_id), INDEX IDX_CD72C0D03256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quality_factor_work_performed ADD CONSTRAINT FK_91883E6454A881D7 FOREIGN KEY (maintenance_personnel_id) REFERENCES maintenance_personnel (id)');
        $this->addSql('ALTER TABLE quality_factor_work_performed ADD CONSTRAINT FK_91883E643256915B FOREIGN KEY (relation_id) REFERENCES aggregates_wto (id)');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD CONSTRAINT FK_8287188454A881D7 FOREIGN KEY (maintenance_personnel_id) REFERENCES maintenance_personnel (id)');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD CONSTRAINT FK_828718843256915B FOREIGN KEY (relation_id) REFERENCES aggregates_wto (id)');
        $this->addSql('ALTER TABLE workers_skill_level ADD CONSTRAINT FK_CD72C0D054A881D7 FOREIGN KEY (maintenance_personnel_id) REFERENCES maintenance_personnel (id)');
        $this->addSql('ALTER TABLE workers_skill_level ADD CONSTRAINT FK_CD72C0D03256915B FOREIGN KEY (relation_id) REFERENCES types_of_wto (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quality_factor_work_performed DROP FOREIGN KEY FK_91883E6454A881D7');
        $this->addSql('ALTER TABLE workers_qualification_coefficients DROP FOREIGN KEY FK_8287188454A881D7');
        $this->addSql('ALTER TABLE workers_skill_level DROP FOREIGN KEY FK_CD72C0D054A881D7');
        $this->addSql('DROP TABLE maintenance_personnel');
        $this->addSql('DROP TABLE quality_factor_work_performed');
        $this->addSql('DROP TABLE workers_qualification_coefficients');
        $this->addSql('DROP TABLE workers_skill_level');
    }
}

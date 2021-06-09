<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609031409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenance_personnel (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quality_factor_work_performed (id INT AUTO_INCREMENT NOT NULL, maintenance_personnel_id INT NOT NULL, relation_id INT NOT NULL, quality_factor VARCHAR(255) NOT NULL, INDEX IDX_91883E6454A881D7 (maintenance_personnel_id), INDEX IDX_91883E643256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quality_factor_work_performed ADD CONSTRAINT FK_91883E6454A881D7 FOREIGN KEY (maintenance_personnel_id) REFERENCES maintenance_personnel (id)');
        $this->addSql('ALTER TABLE quality_factor_work_performed ADD CONSTRAINT FK_91883E643256915B FOREIGN KEY (relation_id) REFERENCES aggregates_wto (id)');
        $this->addSql('ALTER TABLE workers_qualification_coefficients DROP FOREIGN KEY FK_828718849E393793');
        $this->addSql('DROP INDEX IDX_828718849E393793 ON workers_qualification_coefficients');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD relation_id INT NOT NULL, CHANGE workers_skill_level_id maintenance_personnel_id INT NOT NULL, CHANGE worker_qualification_coefficients qualification_coefficient VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD CONSTRAINT FK_8287188454A881D7 FOREIGN KEY (maintenance_personnel_id) REFERENCES maintenance_personnel (id)');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD CONSTRAINT FK_828718843256915B FOREIGN KEY (relation_id) REFERENCES aggregates_wto (id)');
        $this->addSql('CREATE INDEX IDX_8287188454A881D7 ON workers_qualification_coefficients (maintenance_personnel_id)');
        $this->addSql('CREATE INDEX IDX_828718843256915B ON workers_qualification_coefficients (relation_id)');
        $this->addSql('ALTER TABLE workers_skill_level ADD maintenance_personnel_id INT NOT NULL, ADD relation_id INT NOT NULL, CHANGE worker_skill_level skill_level VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE workers_skill_level ADD CONSTRAINT FK_CD72C0D054A881D7 FOREIGN KEY (maintenance_personnel_id) REFERENCES maintenance_personnel (id)');
        $this->addSql('ALTER TABLE workers_skill_level ADD CONSTRAINT FK_CD72C0D03256915B FOREIGN KEY (relation_id) REFERENCES types_of_wto (id)');
        $this->addSql('CREATE INDEX IDX_CD72C0D054A881D7 ON workers_skill_level (maintenance_personnel_id)');
        $this->addSql('CREATE INDEX IDX_CD72C0D03256915B ON workers_skill_level (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quality_factor_work_performed DROP FOREIGN KEY FK_91883E6454A881D7');
        $this->addSql('ALTER TABLE workers_qualification_coefficients DROP FOREIGN KEY FK_8287188454A881D7');
        $this->addSql('ALTER TABLE workers_skill_level DROP FOREIGN KEY FK_CD72C0D054A881D7');
        $this->addSql('DROP TABLE maintenance_personnel');
        $this->addSql('DROP TABLE quality_factor_work_performed');
        $this->addSql('ALTER TABLE workers_qualification_coefficients DROP FOREIGN KEY FK_828718843256915B');
        $this->addSql('DROP INDEX IDX_8287188454A881D7 ON workers_qualification_coefficients');
        $this->addSql('DROP INDEX IDX_828718843256915B ON workers_qualification_coefficients');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD workers_skill_level_id INT NOT NULL, DROP maintenance_personnel_id, DROP relation_id, CHANGE qualification_coefficient worker_qualification_coefficients VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD CONSTRAINT FK_828718849E393793 FOREIGN KEY (workers_skill_level_id) REFERENCES workers_skill_level (id)');
        $this->addSql('CREATE INDEX IDX_828718849E393793 ON workers_qualification_coefficients (workers_skill_level_id)');
        $this->addSql('ALTER TABLE workers_skill_level DROP FOREIGN KEY FK_CD72C0D03256915B');
        $this->addSql('DROP INDEX IDX_CD72C0D054A881D7 ON workers_skill_level');
        $this->addSql('DROP INDEX IDX_CD72C0D03256915B ON workers_skill_level');
        $this->addSql('ALTER TABLE workers_skill_level DROP maintenance_personnel_id, DROP relation_id, CHANGE skill_level worker_skill_level VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

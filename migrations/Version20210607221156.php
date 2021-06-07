<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607221156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE workers_qualification_coefficients (id INT AUTO_INCREMENT NOT NULL, workers_skill_level_id INT NOT NULL, worker_qualification_coefficient VARCHAR(255) NOT NULL, INDEX IDX_828718849E393793 (workers_skill_level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers_skill_level (id INT AUTO_INCREMENT NOT NULL, worker_skill_lelvel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE workers_qualification_coefficients ADD CONSTRAINT FK_828718849E393793 FOREIGN KEY (workers_skill_level_id) REFERENCES workers_skill_level (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workers_qualification_coefficients DROP FOREIGN KEY FK_828718849E393793');
        $this->addSql('DROP TABLE workers_qualification_coefficients');
        $this->addSql('DROP TABLE workers_skill_level');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607213100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aggregates_wto (id INT AUTO_INCREMENT NOT NULL, types_of_wto_id INT NOT NULL, aggregate_wto VARCHAR(255) NOT NULL, INDEX IDX_F00277839AE38090 (types_of_wto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_of_emar (id INT AUTO_INCREMENT NOT NULL, aggregates_wto_id INT NOT NULL, type_of_emar VARCHAR(255) NOT NULL, INDEX IDX_D714F5ADB42EE04 (aggregates_wto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_of_wto (id INT AUTO_INCREMENT NOT NULL, type_wto VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_complexity_factors (id INT AUTO_INCREMENT NOT NULL, types_of_emar_id INT NOT NULL, work_complexity_factor VARCHAR(255) NOT NULL, INDEX IDX_CBD80281C4F0CA51 (types_of_emar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aggregates_wto ADD CONSTRAINT FK_F00277839AE38090 FOREIGN KEY (types_of_wto_id) REFERENCES types_of_wto (id)');
        $this->addSql('ALTER TABLE types_of_emar ADD CONSTRAINT FK_D714F5ADB42EE04 FOREIGN KEY (aggregates_wto_id) REFERENCES aggregates_wto (id)');
        $this->addSql('ALTER TABLE work_complexity_factors ADD CONSTRAINT FK_CBD80281C4F0CA51 FOREIGN KEY (types_of_emar_id) REFERENCES types_of_emar (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE types_of_emar DROP FOREIGN KEY FK_D714F5ADB42EE04');
        $this->addSql('ALTER TABLE work_complexity_factors DROP FOREIGN KEY FK_CBD80281C4F0CA51');
        $this->addSql('ALTER TABLE aggregates_wto DROP FOREIGN KEY FK_F00277839AE38090');
        $this->addSql('DROP TABLE aggregates_wto');
        $this->addSql('DROP TABLE types_of_emar');
        $this->addSql('DROP TABLE types_of_wto');
        $this->addSql('DROP TABLE work_complexity_factors');
    }
}

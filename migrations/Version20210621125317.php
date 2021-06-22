<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210621125317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE work_complexity_factors ADD type_of_emar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE work_complexity_factors ADD CONSTRAINT FK_CBD80281EC9AADE4 FOREIGN KEY (type_of_emar_id) REFERENCES types_of_emar (id)');
        $this->addSql('CREATE INDEX IDX_CBD80281EC9AADE4 ON work_complexity_factors (type_of_emar_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE work_complexity_factors DROP FOREIGN KEY FK_CBD80281EC9AADE4');
        $this->addSql('DROP INDEX IDX_CBD80281EC9AADE4 ON work_complexity_factors');
        $this->addSql('ALTER TABLE work_complexity_factors DROP type_of_emar_id');
    }
}

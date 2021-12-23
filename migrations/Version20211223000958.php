<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211223000958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department ADD chief_doctor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A930018CB FOREIGN KEY (chief_doctor_id) REFERENCES chief_doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CD1DE18A930018CB ON department (chief_doctor_id)');
        $this->addSql('ALTER TABLE doctor ALTER department_id DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE department DROP CONSTRAINT FK_CD1DE18A930018CB');
        $this->addSql('DROP INDEX UNIQ_CD1DE18A930018CB');
        $this->addSql('ALTER TABLE department DROP chief_doctor_id');
        $this->addSql('ALTER TABLE doctor ALTER department_id SET NOT NULL');
    }
}

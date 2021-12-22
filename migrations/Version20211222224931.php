<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211222224931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD patient_card_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ALTER account_id DROP NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB17AFCFCB FOREIGN KEY (patient_card_id) REFERENCES patient_card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB17AFCFCB ON patient (patient_card_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB17AFCFCB');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EB17AFCFCB');
        $this->addSql('ALTER TABLE patient DROP patient_card_id');
        $this->addSql('ALTER TABLE patient ALTER account_id SET NOT NULL');
    }
}

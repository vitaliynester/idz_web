<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220132414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP CONSTRAINT fk_7d3656a41bdad4ff');
        $this->addSql('DROP INDEX uniq_7d3656a41bdad4ff');
        $this->addSql('ALTER TABLE account RENAME COLUMN passport_id_id TO passport_id');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4ABF410D0 FOREIGN KEY (passport_id) REFERENCES passport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A4ABF410D0 ON account (passport_id)');
        $this->addSql('ALTER TABLE administrator DROP CONSTRAINT fk_58df065149cb4726');
        $this->addSql('DROP INDEX uniq_58df065149cb4726');
        $this->addSql('ALTER TABLE administrator RENAME COLUMN account_id_id TO account_id');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF06519B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58DF06519B6B5FBA ON administrator (account_id)');
        $this->addSql('ALTER TABLE card_reception DROP CONSTRAINT fk_24de667b5774fddc');
        $this->addSql('ALTER TABLE card_reception DROP CONSTRAINT fk_24de667bf1b0c97e');
        $this->addSql('DROP INDEX uniq_24de667b5774fddc');
        $this->addSql('DROP INDEX idx_24de667bf1b0c97e');
        $this->addSql('ALTER TABLE card_reception ADD ticket_id INT NOT NULL');
        $this->addSql('ALTER TABLE card_reception ADD patient_card_id INT NOT NULL');
        $this->addSql('ALTER TABLE card_reception DROP ticket_id_id');
        $this->addSql('ALTER TABLE card_reception DROP patient_card_id_id');
        $this->addSql('ALTER TABLE card_reception ADD CONSTRAINT FK_24DE667B700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_reception ADD CONSTRAINT FK_24DE667B17AFCFCB FOREIGN KEY (patient_card_id) REFERENCES patient_card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_24DE667B700047D2 ON card_reception (ticket_id)');
        $this->addSql('CREATE INDEX IDX_24DE667B17AFCFCB ON card_reception (patient_card_id)');
        $this->addSql('ALTER TABLE chief_doctor DROP CONSTRAINT fk_9813861064e7214b');
        $this->addSql('ALTER TABLE chief_doctor DROP CONSTRAINT fk_9813861049cb4726');
        $this->addSql('DROP INDEX uniq_9813861064e7214b');
        $this->addSql('DROP INDEX uniq_9813861049cb4726');
        $this->addSql('ALTER TABLE chief_doctor ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE chief_doctor ADD account_id INT NOT NULL');
        $this->addSql('ALTER TABLE chief_doctor DROP department_id_id');
        $this->addSql('ALTER TABLE chief_doctor DROP account_id_id');
        $this->addSql('ALTER TABLE chief_doctor ADD CONSTRAINT FK_98138610AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chief_doctor ADD CONSTRAINT FK_981386109B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98138610AE80F5DF ON chief_doctor (department_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_981386109B6B5FBA ON chief_doctor (account_id)');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT fk_1fc0f36a49cb4726');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT fk_1fc0f36a64e7214b');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT fk_1fc0f36adc32bb7b');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT fk_1fc0f36af3847a8a');
        $this->addSql('DROP INDEX idx_1fc0f36af3847a8a');
        $this->addSql('DROP INDEX idx_1fc0f36a64e7214b');
        $this->addSql('DROP INDEX idx_1fc0f36adc32bb7b');
        $this->addSql('DROP INDEX uniq_1fc0f36a49cb4726');
        $this->addSql('ALTER TABLE doctor ADD account_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD specialty_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD position_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor DROP account_id_id');
        $this->addSql('ALTER TABLE doctor DROP department_id_id');
        $this->addSql('ALTER TABLE doctor DROP specialty_id_id');
        $this->addSql('ALTER TABLE doctor DROP position_id_id');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36AAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36ADD842E46 FOREIGN KEY (position_id) REFERENCES position (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1FC0F36A9B6B5FBA ON doctor (account_id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36AAE80F5DF ON doctor (department_id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36A9A353316 ON doctor (specialty_id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36ADD842E46 ON doctor (position_id)');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT fk_906517445774fddc');
        $this->addSql('DROP INDEX uniq_906517445774fddc');
        $this->addSql('ALTER TABLE invoice RENAME COLUMN ticket_id_id TO ticket_id');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90651744700047D2 ON invoice (ticket_id)');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT fk_1adad7eb49cb4726');
        $this->addSql('DROP INDEX uniq_1adad7eb49cb4726');
        $this->addSql('ALTER TABLE patient RENAME COLUMN account_id_id TO account_id');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB9B6B5FBA ON patient (account_id)');
        $this->addSql('ALTER TABLE patient_card DROP CONSTRAINT fk_9f85d51bea724598');
        $this->addSql('DROP INDEX uniq_9f85d51bea724598');
        $this->addSql('ALTER TABLE patient_card RENAME COLUMN patient_id_id TO patient_id');
        $this->addSql('ALTER TABLE patient_card ADD CONSTRAINT FK_9F85D51B6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F85D51B6B899279 ON patient_card (patient_id)');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT fk_97a0ada3ea724598');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT fk_97a0ada332b07e31');
        $this->addSql('DROP INDEX idx_97a0ada3ea724598');
        $this->addSql('DROP INDEX idx_97a0ada332b07e31');
        $this->addSql('ALTER TABLE ticket ADD patient_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD doctor_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket DROP patient_id_id');
        $this->addSql('ALTER TABLE ticket DROP doctor_id_id');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA387F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_97A0ADA36B899279 ON ticket (patient_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA387F4FB17 ON ticket (doctor_id)');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT fk_6b1f67032b07e31');
        $this->addSql('DROP INDEX idx_6b1f67032b07e31');
        $this->addSql('ALTER TABLE timetable RENAME COLUMN doctor_id_id TO doctor_id');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F67087F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6B1F67087F4FB17 ON timetable (doctor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE account DROP CONSTRAINT FK_7D3656A4ABF410D0');
        $this->addSql('DROP INDEX UNIQ_7D3656A4ABF410D0');
        $this->addSql('ALTER TABLE account RENAME COLUMN passport_id TO passport_id_id');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT fk_7d3656a41bdad4ff FOREIGN KEY (passport_id_id) REFERENCES passport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_7d3656a41bdad4ff ON account (passport_id_id)');
        $this->addSql('ALTER TABLE administrator DROP CONSTRAINT FK_58DF06519B6B5FBA');
        $this->addSql('DROP INDEX UNIQ_58DF06519B6B5FBA');
        $this->addSql('ALTER TABLE administrator RENAME COLUMN account_id TO account_id_id');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT fk_58df065149cb4726 FOREIGN KEY (account_id_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_58df065149cb4726 ON administrator (account_id_id)');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA36B899279');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA387F4FB17');
        $this->addSql('DROP INDEX IDX_97A0ADA36B899279');
        $this->addSql('DROP INDEX IDX_97A0ADA387F4FB17');
        $this->addSql('ALTER TABLE ticket ADD patient_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD doctor_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket DROP patient_id');
        $this->addSql('ALTER TABLE ticket DROP doctor_id');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT fk_97a0ada3ea724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT fk_97a0ada332b07e31 FOREIGN KEY (doctor_id_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_97a0ada3ea724598 ON ticket (patient_id_id)');
        $this->addSql('CREATE INDEX idx_97a0ada332b07e31 ON ticket (doctor_id_id)');
        $this->addSql('ALTER TABLE card_reception DROP CONSTRAINT FK_24DE667B700047D2');
        $this->addSql('ALTER TABLE card_reception DROP CONSTRAINT FK_24DE667B17AFCFCB');
        $this->addSql('DROP INDEX UNIQ_24DE667B700047D2');
        $this->addSql('DROP INDEX IDX_24DE667B17AFCFCB');
        $this->addSql('ALTER TABLE card_reception ADD ticket_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE card_reception ADD patient_card_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE card_reception DROP ticket_id');
        $this->addSql('ALTER TABLE card_reception DROP patient_card_id');
        $this->addSql('ALTER TABLE card_reception ADD CONSTRAINT fk_24de667b5774fddc FOREIGN KEY (ticket_id_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_reception ADD CONSTRAINT fk_24de667bf1b0c97e FOREIGN KEY (patient_card_id_id) REFERENCES patient_card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_24de667b5774fddc ON card_reception (ticket_id_id)');
        $this->addSql('CREATE INDEX idx_24de667bf1b0c97e ON card_reception (patient_card_id_id)');
        $this->addSql('ALTER TABLE patient_card DROP CONSTRAINT FK_9F85D51B6B899279');
        $this->addSql('DROP INDEX UNIQ_9F85D51B6B899279');
        $this->addSql('ALTER TABLE patient_card RENAME COLUMN patient_id TO patient_id_id');
        $this->addSql('ALTER TABLE patient_card ADD CONSTRAINT fk_9f85d51bea724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_9f85d51bea724598 ON patient_card (patient_id_id)');
        $this->addSql('ALTER TABLE chief_doctor DROP CONSTRAINT FK_98138610AE80F5DF');
        $this->addSql('ALTER TABLE chief_doctor DROP CONSTRAINT FK_981386109B6B5FBA');
        $this->addSql('DROP INDEX UNIQ_98138610AE80F5DF');
        $this->addSql('DROP INDEX UNIQ_981386109B6B5FBA');
        $this->addSql('ALTER TABLE chief_doctor ADD department_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE chief_doctor ADD account_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE chief_doctor DROP department_id');
        $this->addSql('ALTER TABLE chief_doctor DROP account_id');
        $this->addSql('ALTER TABLE chief_doctor ADD CONSTRAINT fk_9813861064e7214b FOREIGN KEY (department_id_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chief_doctor ADD CONSTRAINT fk_9813861049cb4726 FOREIGN KEY (account_id_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_9813861064e7214b ON chief_doctor (department_id_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_9813861049cb4726 ON chief_doctor (account_id_id)');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36A9B6B5FBA');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36AAE80F5DF');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36A9A353316');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36ADD842E46');
        $this->addSql('DROP INDEX UNIQ_1FC0F36A9B6B5FBA');
        $this->addSql('DROP INDEX IDX_1FC0F36AAE80F5DF');
        $this->addSql('DROP INDEX IDX_1FC0F36A9A353316');
        $this->addSql('DROP INDEX IDX_1FC0F36ADD842E46');
        $this->addSql('ALTER TABLE doctor ADD account_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD department_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD specialty_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD position_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctor DROP account_id');
        $this->addSql('ALTER TABLE doctor DROP department_id');
        $this->addSql('ALTER TABLE doctor DROP specialty_id');
        $this->addSql('ALTER TABLE doctor DROP position_id');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT fk_1fc0f36a49cb4726 FOREIGN KEY (account_id_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT fk_1fc0f36a64e7214b FOREIGN KEY (department_id_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT fk_1fc0f36adc32bb7b FOREIGN KEY (specialty_id_id) REFERENCES specialty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT fk_1fc0f36af3847a8a FOREIGN KEY (position_id_id) REFERENCES "position" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1fc0f36af3847a8a ON doctor (position_id_id)');
        $this->addSql('CREATE INDEX idx_1fc0f36a64e7214b ON doctor (department_id_id)');
        $this->addSql('CREATE INDEX idx_1fc0f36adc32bb7b ON doctor (specialty_id_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_1fc0f36a49cb4726 ON doctor (account_id_id)');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT FK_90651744700047D2');
        $this->addSql('DROP INDEX UNIQ_90651744700047D2');
        $this->addSql('ALTER TABLE invoice RENAME COLUMN ticket_id TO ticket_id_id');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT fk_906517445774fddc FOREIGN KEY (ticket_id_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_906517445774fddc ON invoice (ticket_id_id)');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB9B6B5FBA');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EB9B6B5FBA');
        $this->addSql('ALTER TABLE patient RENAME COLUMN account_id TO account_id_id');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT fk_1adad7eb49cb4726 FOREIGN KEY (account_id_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_1adad7eb49cb4726 ON patient (account_id_id)');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F67087F4FB17');
        $this->addSql('DROP INDEX IDX_6B1F67087F4FB17');
        $this->addSql('ALTER TABLE timetable RENAME COLUMN doctor_id TO doctor_id_id');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT fk_6b1f67032b07e31 FOREIGN KEY (doctor_id_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_6b1f67032b07e31 ON timetable (doctor_id_id)');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224133752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caissier_compte (caissier_id INT NOT NULL, compte_id INT NOT NULL, INDEX IDX_56EAE243B514973B (caissier_id), INDEX IDX_56EAE243F2C56620 (compte_id), PRIMARY KEY(caissier_id, compte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_agence_transaction (user_agence_id INT NOT NULL, transaction_id INT NOT NULL, INDEX IDX_C8DBC3BAD7C5BEE9 (user_agence_id), INDEX IDX_C8DBC3BA2FC0CB0F (transaction_id), PRIMARY KEY(user_agence_id, transaction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caissier_compte ADD CONSTRAINT FK_56EAE243B514973B FOREIGN KEY (caissier_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caissier_compte ADD CONSTRAINT FK_56EAE243F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_agence_transaction ADD CONSTRAINT FK_C8DBC3BAD7C5BEE9 FOREIGN KEY (user_agence_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_agence_transaction ADD CONSTRAINT FK_C8DBC3BA2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE user_compte');
        $this->addSql('DROP TABLE user_transaction');
        $this->addSql('ALTER TABLE client DROP type');
        $this->addSql('ALTER TABLE compte ADD admin_system_id INT DEFAULT NULL, DROP type');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526039622A97 FOREIGN KEY (admin_system_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526039622A97 ON compte (admin_system_id)');
        $this->addSql('ALTER TABLE user ADD type_id INT NOT NULL, DROP roles');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, date_depot DATE NOT NULL, montant_depot VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_compte (user_id INT NOT NULL, compte_id INT NOT NULL, INDEX IDX_AAA4495DA76ED395 (user_id), INDEX IDX_AAA4495DF2C56620 (compte_id), PRIMARY KEY(user_id, compte_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_transaction (user_id INT NOT NULL, transaction_id INT NOT NULL, INDEX IDX_DB2CCC44A76ED395 (user_id), INDEX IDX_DB2CCC442FC0CB0F (transaction_id), PRIMARY KEY(user_id, transaction_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_compte ADD CONSTRAINT FK_AAA4495DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_compte ADD CONSTRAINT FK_AAA4495DF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_transaction ADD CONSTRAINT FK_DB2CCC442FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_transaction ADD CONSTRAINT FK_DB2CCC44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE caissier_compte');
        $this->addSql('DROP TABLE user_agence_transaction');
        $this->addSql('ALTER TABLE client ADD type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526039622A97');
        $this->addSql('DROP INDEX IDX_CFF6526039622A97 ON compte');
        $this->addSql('ALTER TABLE compte ADD type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP admin_system_id');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', DROP type_id');
    }
}

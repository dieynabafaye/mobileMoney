<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302085021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction ADD user_depot_id INT DEFAULT NULL, ADD user_retrait_id INT DEFAULT NULL, ADD client_envoi_id INT DEFAULT NULL, ADD client_retrait_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1659D30DE FOREIGN KEY (user_depot_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1D99F8396 FOREIGN KEY (user_retrait_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D11171DC20 FOREIGN KEY (client_envoi_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1EEAC783B FOREIGN KEY (client_retrait_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_723705D1659D30DE ON transaction (user_depot_id)');
        $this->addSql('CREATE INDEX IDX_723705D1D99F8396 ON transaction (user_retrait_id)');
        $this->addSql('CREATE INDEX IDX_723705D11171DC20 ON transaction (client_envoi_id)');
        $this->addSql('CREATE INDEX IDX_723705D1EEAC783B ON transaction (client_retrait_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1659D30DE');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1D99F8396');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D11171DC20');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1EEAC783B');
        $this->addSql('DROP INDEX IDX_723705D1659D30DE ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1D99F8396 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D11171DC20 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1EEAC783B ON transaction');
        $this->addSql('ALTER TABLE transaction DROP user_depot_id, DROP user_retrait_id, DROP client_envoi_id, DROP client_retrait_id');
    }
}

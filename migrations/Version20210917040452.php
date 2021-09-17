<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210917040452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherendezvous ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficherendezvous ADD CONSTRAINT FK_A68875DA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES ficheclient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A68875DA4AEAFEA ON ficherendezvous (entreprise_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherendezvous DROP FOREIGN KEY FK_A68875DA4AEAFEA');
        $this->addSql('DROP INDEX UNIQ_A68875DA4AEAFEA ON ficherendezvous');
        $this->addSql('ALTER TABLE ficherendezvous DROP entreprise_id');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
    }
}

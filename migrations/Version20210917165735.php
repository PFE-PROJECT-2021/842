<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210917165735 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherendezvous ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficherendezvous ADD CONSTRAINT FK_A68875DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A68875DA76ED395 ON ficherendezvous (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherendezvous DROP FOREIGN KEY FK_A68875DA76ED395');
        $this->addSql('DROP INDEX IDX_A68875DA76ED395 ON ficherendezvous');
        $this->addSql('ALTER TABLE ficherendezvous DROP user_id');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
    }
}

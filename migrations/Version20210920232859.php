<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920232859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE performanceagent_user');
        $this->addSql('ALTER TABLE ficherendezvous ADD CONSTRAINT FK_A68875DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE performanceagent ADD agent_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_B35562BB3414710B ON performanceagent (agent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE performanceagent_user (performanceagent_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8311B1FFE380782C (performanceagent_id), INDEX IDX_8311B1FFA76ED395 (user_id), PRIMARY KEY(performanceagent_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ficherendezvous DROP FOREIGN KEY FK_A68875DA76ED395');
        $this->addSql('ALTER TABLE performanceagent DROP FOREIGN KEY FK_B35562BB3414710B');
        $this->addSql('DROP INDEX IDX_B35562BB3414710B ON performanceagent');
        $this->addSql('ALTER TABLE performanceagent DROP agent_id');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
    }
}

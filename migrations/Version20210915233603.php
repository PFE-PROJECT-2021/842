<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210915233603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficheclient ADD ficheprospect_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficheclient ADD CONSTRAINT FK_37FC02F61C9FF285 FOREIGN KEY (ficheprospect_id) REFERENCES ficheprospect (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_37FC02F61C9FF285 ON ficheclient (ficheprospect_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficheclient DROP FOREIGN KEY FK_37FC02F61C9FF285');
        $this->addSql('DROP INDEX UNIQ_37FC02F61C9FF285 ON ficheclient');
        $this->addSql('ALTER TABLE ficheclient DROP ficheprospect_id');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
    }
}

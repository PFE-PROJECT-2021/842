<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916002727 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficheclient DROP FOREIGN KEY FK_37FC02F61C9FF285');
        $this->addSql('DROP INDEX UNIQ_37FC02F61C9FF285 ON ficheclient');
        $this->addSql('ALTER TABLE ficheclient DROP ficheprospect_id');
        $this->addSql('ALTER TABLE ficheprospect ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficheprospect ADD CONSTRAINT FK_A58736DA19EB6921 FOREIGN KEY (client_id) REFERENCES ficheclient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A58736DA19EB6921 ON ficheprospect (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficheclient ADD ficheprospect_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficheclient ADD CONSTRAINT FK_37FC02F61C9FF285 FOREIGN KEY (ficheprospect_id) REFERENCES ficheprospect (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_37FC02F61C9FF285 ON ficheclient (ficheprospect_id)');
        $this->addSql('ALTER TABLE ficheprospect DROP FOREIGN KEY FK_A58736DA19EB6921');
        $this->addSql('DROP INDEX UNIQ_A58736DA19EB6921 ON ficheprospect');
        $this->addSql('ALTER TABLE ficheprospect DROP client_id');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
    }
}

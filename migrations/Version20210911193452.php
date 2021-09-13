<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210911193452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cahierdecharge (id INT AUTO_INCREMENT NOT NULL, descriptproj LONGTEXT NOT NULL, infoproj VARCHAR(255) NOT NULL, media VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ficheclient (id INT AUTO_INCREMENT NOT NULL, nomclient VARCHAR(255) NOT NULL, telclient BIGINT NOT NULL, emailcli VARCHAR(255) NOT NULL, activite VARCHAR(255) NOT NULL, siteexistant VARCHAR(255) NOT NULL, referencement VARCHAR(255) NOT NULL, raisonsociale VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ficheprospect (id INT AUTO_INCREMENT NOT NULL, daterappel DATETIME NOT NULL, commentaireappel LONGTEXT NOT NULL, dateappel DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ficherendezvous (id INT AUTO_INCREMENT NOT NULL, datepriserdv DATETIME NOT NULL, daterdv DATETIME NOT NULL, engagement VARCHAR(255) NOT NULL, prix INT DEFAULT NULL, notequalif INT NOT NULL, commentaire VARCHAR(255) NOT NULL, rappel VARCHAR(255) NOT NULL, sms VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cahierdecharge');
        $this->addSql('DROP TABLE ficheclient');
        $this->addSql('DROP TABLE ficheprospect');
        $this->addSql('DROP TABLE ficherendezvous');
    }
}

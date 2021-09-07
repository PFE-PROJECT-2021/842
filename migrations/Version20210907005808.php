<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210907005808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ficheclient (id INT AUTO_INCREMENT NOT NULL, nomclient VARCHAR(255) NOT NULL, telclient BIGINT NOT NULL, emailcli VARCHAR(255) NOT NULL, activite VARCHAR(255) NOT NULL, siteexistant VARCHAR(255) NOT NULL, referencement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE fiche_client');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE user_app');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_client (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, tel_client BIGINT NOT NULL, email_client VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, raison_sociale VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, activite VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, site_web VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, referencement VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, hashed_token VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_app (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, is_verified TINYINT(1) NOT NULL, full_name VARCHAR(150) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, UNIQUE INDEX UNIQ_22781144E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE ficheclient');
    }
}

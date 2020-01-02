<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102201045 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE count DROP FOREIGN KEY FK_85D94462F68139D7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F68139D7');
        $this->addSql('ALTER TABLE adhesion DROP FOREIGN KEY FK_C50CA65A3DA5256D');
        $this->addSql('DROP TABLE adhesion');
        $this->addSql('DROP TABLE count');
        $this->addSql('DROP TABLE fpiunlyon');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE sectionfpi');
        $this->addSql('DROP TABLE smstext');
        $this->addSql('DROP INDEX UNIQ_8D93D649F68139D7 ON user');
        $this->addSql('ALTER TABLE user DROP adhesion_id, CHANGE username username VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adhesion (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, gender TINYINT(1) NOT NULL, statut TINYINT(1) NOT NULL, first_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, lieu_naissance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nationnalite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nature_identite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, number_identity VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, pays VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, codepostale VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, profession VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, birthday DATE DEFAULT NULL, dateadhesion DATETIME DEFAULT NULL, dateecheancebis DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_C50CA65A3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE count (id INT AUTO_INCREMENT NOT NULL, adhesion_id INT NOT NULL, ref VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, p_un_ht NUMERIC(10, 0) DEFAULT NULL, qte INT DEFAULT NULL, remise NUMERIC(10, 0) DEFAULT NULL, p_un_ht_rem NUMERIC(10, 0) DEFAULT NULL, prix_tot_ht NUMERIC(10, 0) DEFAULT NULL, tva NUMERIC(10, 0) DEFAULT NULL, date_bill DATETIME DEFAULT NULL, total_ttc NUMERIC(10, 0) DEFAULT NULL, tot_cumul NUMERIC(10, 0) DEFAULT NULL, date_cumul DATETIME DEFAULT NULL, date_echeance DATETIME DEFAULT NULL, INDEX IDX_85D94462F68139D7 (adhesion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fpiunlyon (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, mail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, fonction VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, username VARCHAR(191) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sectionfpi (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE smstext (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, author VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adhesion ADD CONSTRAINT FK_C50CA65A3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE count ADD CONSTRAINT FK_85D94462F68139D7 FOREIGN KEY (adhesion_id) REFERENCES adhesion (id)');
        $this->addSql('ALTER TABLE user ADD adhesion_id INT DEFAULT NULL, CHANGE username username VARCHAR(191) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE password password VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F68139D7 FOREIGN KEY (adhesion_id) REFERENCES adhesion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F68139D7 ON user (adhesion_id)');
    }
}

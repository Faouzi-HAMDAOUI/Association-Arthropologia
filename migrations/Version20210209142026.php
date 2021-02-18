<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209142026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diagnostic (id INT AUTO_INCREMENT NOT NULL, neme VARCHAR(255) NOT NULL, delimitation VARCHAR(255) NOT NULL, proprietaire VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, objectif VARCHAR(400) NOT NULL, date VARCHAR(255) NOT NULL, prenome VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone VARCHAR(100) NOT NULL, etape INT NOT NULL, score1 INT NOT NULL, score2 INT NOT NULL, score3 INT NOT NULL, score4 INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE diagnostic');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824011000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE diplomes CHANGE moisdebut moisdebut VARCHAR(255) DEFAULT NULL, CHANGE entreprise entreprise VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(1024) DEFAULT NULL');
        $this->addSql('ALTER TABLE experiences CHANGE description description VARCHAR(1024) DEFAULT NULL');
        $this->addSql('ALTER TABLE personnes ADD portrait VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE diplomes CHANGE moisdebut moisdebut VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE entreprise entreprise VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE experiences CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE personnes DROP portrait');
    }
}

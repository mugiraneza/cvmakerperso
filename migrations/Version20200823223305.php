<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200823223305 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competences_data (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_A9A17D3A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competencesprog (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_6F148833A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplomes (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, moisdebut VARCHAR(255) NOT NULL, anneedebut VARCHAR(255) DEFAULT NULL, moisfin VARCHAR(255) DEFAULT NULL, anneefin VARCHAR(255) DEFAULT NULL, entreprise VARCHAR(255) NOT NULL, ville VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_8A81EFD1A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, personnes_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_E7927C74146AD7BC (personnes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experiences (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, moisdebut VARCHAR(255) DEFAULT NULL, anneedebut VARCHAR(255) DEFAULT NULL, moisfin VARCHAR(255) DEFAULT NULL, anneefin VARCHAR(255) DEFAULT NULL, entreprise VARCHAR(255) NOT NULL, ville VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_82020E70A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, cvpdf VARCHAR(255) NOT NULL, apropos VARCHAR(255) NOT NULL, age INT NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, langues VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reseaux (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, INDEX IDX_49ABC811A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competences_data ADD CONSTRAINT FK_A9A17D3A21BD112 FOREIGN KEY (personne_id) REFERENCES personnes (id)');
        $this->addSql('ALTER TABLE competencesprog ADD CONSTRAINT FK_6F148833A21BD112 FOREIGN KEY (personne_id) REFERENCES personnes (id)');
        $this->addSql('ALTER TABLE diplomes ADD CONSTRAINT FK_8A81EFD1A21BD112 FOREIGN KEY (personne_id) REFERENCES personnes (id)');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C74146AD7BC FOREIGN KEY (personnes_id) REFERENCES personnes (id)');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70A21BD112 FOREIGN KEY (personne_id) REFERENCES personnes (id)');
        $this->addSql('ALTER TABLE reseaux ADD CONSTRAINT FK_49ABC811A21BD112 FOREIGN KEY (personne_id) REFERENCES personnes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competences_data DROP FOREIGN KEY FK_A9A17D3A21BD112');
        $this->addSql('ALTER TABLE competencesprog DROP FOREIGN KEY FK_6F148833A21BD112');
        $this->addSql('ALTER TABLE diplomes DROP FOREIGN KEY FK_8A81EFD1A21BD112');
        $this->addSql('ALTER TABLE email DROP FOREIGN KEY FK_E7927C74146AD7BC');
        $this->addSql('ALTER TABLE experiences DROP FOREIGN KEY FK_82020E70A21BD112');
        $this->addSql('ALTER TABLE reseaux DROP FOREIGN KEY FK_49ABC811A21BD112');
        $this->addSql('DROP TABLE competences_data');
        $this->addSql('DROP TABLE competencesprog');
        $this->addSql('DROP TABLE diplomes');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE personnes');
        $this->addSql('DROP TABLE reseaux');
    }
}

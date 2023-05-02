<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230502130257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE climats (id INT AUTO_INCREMENT NOT NULL, climat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieux (id INT AUTO_INCREMENT NOT NULL, commune VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peche (id INT AUTO_INCREMENT NOT NULL, poisson_id INT NOT NULL, pecheur_id INT NOT NULL, climat_id INT DEFAULT NULL, session_peche_id INT NOT NULL, temperature INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, taille DOUBLE PRECISION DEFAULT NULL, heure TIME DEFAULT NULL, INDEX IDX_E96511E25010D15C (poisson_id), INDEX IDX_E96511E2D43709BC (pecheur_id), INDEX IDX_E96511E277E87C9D (climat_id), INDEX IDX_E96511E2298A17B8 (session_peche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poissons (id INT AUTO_INCREMENT NOT NULL, poisson VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_peche (id INT AUTO_INCREMENT NOT NULL, lieu_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_3218A9346AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT FK_E96511E25010D15C FOREIGN KEY (poisson_id) REFERENCES poissons (id)');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT FK_E96511E2D43709BC FOREIGN KEY (pecheur_id) REFERENCES pecheurs (id)');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT FK_E96511E277E87C9D FOREIGN KEY (climat_id) REFERENCES climats (id)');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT FK_E96511E2298A17B8 FOREIGN KEY (session_peche_id) REFERENCES session_peche (id)');
        $this->addSql('ALTER TABLE session_peche ADD CONSTRAINT FK_3218A9346AB213CC FOREIGN KEY (lieu_id) REFERENCES lieux (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY FK_E96511E25010D15C');
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY FK_E96511E2D43709BC');
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY FK_E96511E277E87C9D');
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY FK_E96511E2298A17B8');
        $this->addSql('ALTER TABLE session_peche DROP FOREIGN KEY FK_3218A9346AB213CC');
        $this->addSql('DROP TABLE climats');
        $this->addSql('DROP TABLE lieux');
        $this->addSql('DROP TABLE peche');
        $this->addSql('DROP TABLE poissons');
        $this->addSql('DROP TABLE session_peche');
    }
}

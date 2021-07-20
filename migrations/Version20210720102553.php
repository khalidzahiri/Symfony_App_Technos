<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720102553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_tips (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outil (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, resume VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outil_techno (outil_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_7B98BA6F3ED89C80 (outil_id), INDEX IDX_7B98BA6F51F3C1BC (techno_id), PRIMARY KEY(outil_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techno (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, intro VARCHAR(1000) NOT NULL, doc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tips (id INT AUTO_INCREMENT NOT NULL, id_techno_id INT NOT NULL, id_user_id INT NOT NULL, id_categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, resume VARCHAR(1000) NOT NULL, INDEX IDX_642C4108D1C67D9B (id_techno_id), INDEX IDX_642C410879F37AE5 (id_user_id), INDEX IDX_642C41089F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutoriel (id INT AUTO_INCREMENT NOT NULL, id_techno_id INT NOT NULL, nom VARCHAR(255) NOT NULL, resume VARCHAR(500) NOT NULL, niveau INT NOT NULL, lien VARCHAR(255) NOT NULL, INDEX IDX_A2073AEDD1C67D9B (id_techno_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE outil_techno ADD CONSTRAINT FK_7B98BA6F3ED89C80 FOREIGN KEY (outil_id) REFERENCES outil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outil_techno ADD CONSTRAINT FK_7B98BA6F51F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108D1C67D9B FOREIGN KEY (id_techno_id) REFERENCES techno (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C410879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C41089F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie_tips (id)');
        $this->addSql('ALTER TABLE tutoriel ADD CONSTRAINT FK_A2073AEDD1C67D9B FOREIGN KEY (id_techno_id) REFERENCES techno (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C41089F34925F');
        $this->addSql('ALTER TABLE outil_techno DROP FOREIGN KEY FK_7B98BA6F3ED89C80');
        $this->addSql('ALTER TABLE outil_techno DROP FOREIGN KEY FK_7B98BA6F51F3C1BC');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108D1C67D9B');
        $this->addSql('ALTER TABLE tutoriel DROP FOREIGN KEY FK_A2073AEDD1C67D9B');
        $this->addSql('DROP TABLE categorie_tips');
        $this->addSql('DROP TABLE outil');
        $this->addSql('DROP TABLE outil_techno');
        $this->addSql('DROP TABLE techno');
        $this->addSql('DROP TABLE tips');
        $this->addSql('DROP TABLE tutoriel');
    }
}

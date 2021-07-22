<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721215625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE outils (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C410879F37AE5');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C41089F34925F');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108D1C67D9B');
        $this->addSql('DROP INDEX IDX_642C410879F37AE5 ON tips');
        $this->addSql('DROP INDEX IDX_642C4108D1C67D9B ON tips');
        $this->addSql('DROP INDEX IDX_642C41089F34925F ON tips');
        $this->addSql('ALTER TABLE tips ADD techno_id INT DEFAULT NULL, ADD id_categorie_tips_id INT DEFAULT NULL, DROP id_techno_id, DROP id_user_id, DROP id_categorie_id');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C410851F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C41081D5C40FE FOREIGN KEY (id_categorie_tips_id) REFERENCES categorie_tips (id)');
        $this->addSql('CREATE INDEX IDX_642C410851F3C1BC ON tips (techno_id)');
        $this->addSql('CREATE INDEX IDX_642C41081D5C40FE ON tips (id_categorie_tips_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE outils');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C410851F3C1BC');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C41081D5C40FE');
        $this->addSql('DROP INDEX IDX_642C410851F3C1BC ON tips');
        $this->addSql('DROP INDEX IDX_642C41081D5C40FE ON tips');
        $this->addSql('ALTER TABLE tips ADD id_techno_id INT NOT NULL, ADD id_user_id INT NOT NULL, ADD id_categorie_id INT NOT NULL, DROP techno_id, DROP id_categorie_tips_id');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C410879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C41089F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie_tips (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108D1C67D9B FOREIGN KEY (id_techno_id) REFERENCES techno (id)');
        $this->addSql('CREATE INDEX IDX_642C410879F37AE5 ON tips (id_user_id)');
        $this->addSql('CREATE INDEX IDX_642C4108D1C67D9B ON tips (id_techno_id)');
        $this->addSql('CREATE INDEX IDX_642C41089F34925F ON tips (id_categorie_id)');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826093003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences_users (id INT AUTO_INCREMENT NOT NULL, competences_id_id INT NOT NULL, users_id_id INT NOT NULL, INDEX IDX_DF457F81B482443F (competences_id_id), INDEX IDX_DF457F8198333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, contenue LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv_users (id INT AUTO_INCREMENT NOT NULL, cv_id_id INT NOT NULL, users_id_id INT NOT NULL, UNIQUE INDEX UNIQ_9B8775F6F0404E48 (cv_id_id), INDEX IDX_9B8775F698333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competences_users ADD CONSTRAINT FK_DF457F81B482443F FOREIGN KEY (competences_id_id) REFERENCES competences (id)');
        $this->addSql('ALTER TABLE competences_users ADD CONSTRAINT FK_DF457F8198333A1E FOREIGN KEY (users_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE cv_users ADD CONSTRAINT FK_9B8775F6F0404E48 FOREIGN KEY (cv_id_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE cv_users ADD CONSTRAINT FK_9B8775F698333A1E FOREIGN KEY (users_id_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences_users DROP FOREIGN KEY FK_DF457F81B482443F');
        $this->addSql('ALTER TABLE competences_users DROP FOREIGN KEY FK_DF457F8198333A1E');
        $this->addSql('ALTER TABLE cv_users DROP FOREIGN KEY FK_9B8775F6F0404E48');
        $this->addSql('ALTER TABLE cv_users DROP FOREIGN KEY FK_9B8775F698333A1E');
        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE competences_users');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE cv_users');
    }
}

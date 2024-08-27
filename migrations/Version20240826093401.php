<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826093401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences_users DROP FOREIGN KEY FK_DF457F8198333A1E');
        $this->addSql('ALTER TABLE competences_users DROP FOREIGN KEY FK_DF457F81B482443F');
        $this->addSql('DROP INDEX IDX_DF457F81B482443F ON competences_users');
        $this->addSql('DROP INDEX IDX_DF457F8198333A1E ON competences_users');
        $this->addSql('ALTER TABLE competences_users ADD competences_id INT NOT NULL, ADD users_id INT NOT NULL, DROP competences_id_id, DROP users_id_id');
        $this->addSql('ALTER TABLE competences_users ADD CONSTRAINT FK_DF457F81A660B158 FOREIGN KEY (competences_id) REFERENCES competences (id)');
        $this->addSql('ALTER TABLE competences_users ADD CONSTRAINT FK_DF457F8167B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_DF457F81A660B158 ON competences_users (competences_id)');
        $this->addSql('CREATE INDEX IDX_DF457F8167B3B43D ON competences_users (users_id)');
        $this->addSql('ALTER TABLE cv_users DROP FOREIGN KEY FK_9B8775F698333A1E');
        $this->addSql('ALTER TABLE cv_users DROP FOREIGN KEY FK_9B8775F6F0404E48');
        $this->addSql('DROP INDEX IDX_9B8775F698333A1E ON cv_users');
        $this->addSql('DROP INDEX UNIQ_9B8775F6F0404E48 ON cv_users');
        $this->addSql('ALTER TABLE cv_users ADD cv_id INT NOT NULL, ADD users_id INT NOT NULL, DROP cv_id_id, DROP users_id_id');
        $this->addSql('ALTER TABLE cv_users ADD CONSTRAINT FK_9B8775F6CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE cv_users ADD CONSTRAINT FK_9B8775F667B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B8775F6CFE419E2 ON cv_users (cv_id)');
        $this->addSql('CREATE INDEX IDX_9B8775F667B3B43D ON cv_users (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences_users DROP FOREIGN KEY FK_DF457F81A660B158');
        $this->addSql('ALTER TABLE competences_users DROP FOREIGN KEY FK_DF457F8167B3B43D');
        $this->addSql('DROP INDEX IDX_DF457F81A660B158 ON competences_users');
        $this->addSql('DROP INDEX IDX_DF457F8167B3B43D ON competences_users');
        $this->addSql('ALTER TABLE competences_users ADD competences_id_id INT NOT NULL, ADD users_id_id INT NOT NULL, DROP competences_id, DROP users_id');
        $this->addSql('ALTER TABLE competences_users ADD CONSTRAINT FK_DF457F8198333A1E FOREIGN KEY (users_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE competences_users ADD CONSTRAINT FK_DF457F81B482443F FOREIGN KEY (competences_id_id) REFERENCES competences (id)');
        $this->addSql('CREATE INDEX IDX_DF457F81B482443F ON competences_users (competences_id_id)');
        $this->addSql('CREATE INDEX IDX_DF457F8198333A1E ON competences_users (users_id_id)');
        $this->addSql('ALTER TABLE cv_users DROP FOREIGN KEY FK_9B8775F6CFE419E2');
        $this->addSql('ALTER TABLE cv_users DROP FOREIGN KEY FK_9B8775F667B3B43D');
        $this->addSql('DROP INDEX UNIQ_9B8775F6CFE419E2 ON cv_users');
        $this->addSql('DROP INDEX IDX_9B8775F667B3B43D ON cv_users');
        $this->addSql('ALTER TABLE cv_users ADD cv_id_id INT NOT NULL, ADD users_id_id INT NOT NULL, DROP cv_id, DROP users_id');
        $this->addSql('ALTER TABLE cv_users ADD CONSTRAINT FK_9B8775F698333A1E FOREIGN KEY (users_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE cv_users ADD CONSTRAINT FK_9B8775F6F0404E48 FOREIGN KEY (cv_id_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_9B8775F698333A1E ON cv_users (users_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B8775F6F0404E48 ON cv_users (cv_id_id)');
    }
}

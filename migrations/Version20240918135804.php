<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918135804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE law_domain (law_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_62AA71054EB478 (law_id), INDEX IDX_62AA710115F0EE5 (domain_id), PRIMARY KEY(law_id, domain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE law_domain ADD CONSTRAINT FK_62AA71054EB478 FOREIGN KEY (law_id) REFERENCES law (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE law_domain ADD CONSTRAINT FK_62AA710115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE law DROP FOREIGN KEY FK_C0B552F115F0EE5');
        $this->addSql('DROP INDEX IDX_C0B552F115F0EE5 ON law');
        $this->addSql('ALTER TABLE law DROP domain_id');
        $this->addSql('ALTER TABLE vote CHANGE law_id law_id INT NOT NULL, CHANGE value value TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE law_domain DROP FOREIGN KEY FK_62AA71054EB478');
        $this->addSql('ALTER TABLE law_domain DROP FOREIGN KEY FK_62AA710115F0EE5');
        $this->addSql('DROP TABLE law_domain');
        $this->addSql('ALTER TABLE law ADD domain_id INT NOT NULL');
        $this->addSql('ALTER TABLE law ADD CONSTRAINT FK_C0B552F115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C0B552F115F0EE5 ON law (domain_id)');
        $this->addSql('ALTER TABLE vote CHANGE law_id law_id INT DEFAULT NULL, CHANGE value value TINYINT(1) DEFAULT NULL');
    }
}

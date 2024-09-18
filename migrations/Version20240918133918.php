<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918133918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, law_id INT NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, publish_date DATE NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C54EB478 (law_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE law (id INT AUTO_INCREMENT NOT NULL, domain_id INT NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, publish_date DATE NOT NULL, INDEX IDX_C0B552F115F0EE5 (domain_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_law (user_id INT NOT NULL, law_id INT NOT NULL, INDEX IDX_E71D34A4A76ED395 (user_id), INDEX IDX_E71D34A454EB478 (law_id), PRIMARY KEY(user_id, law_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, law_id INT DEFAULT NULL, vote_date DATE NOT NULL, value TINYINT(1) DEFAULT NULL, INDEX IDX_5A108564A76ED395 (user_id), INDEX IDX_5A10856454EB478 (law_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C54EB478 FOREIGN KEY (law_id) REFERENCES law (id)');
        $this->addSql('ALTER TABLE law ADD CONSTRAINT FK_C0B552F115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id)');
        $this->addSql('ALTER TABLE user_law ADD CONSTRAINT FK_E71D34A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_law ADD CONSTRAINT FK_E71D34A454EB478 FOREIGN KEY (law_id) REFERENCES law (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A10856454EB478 FOREIGN KEY (law_id) REFERENCES law (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C54EB478');
        $this->addSql('ALTER TABLE law DROP FOREIGN KEY FK_C0B552F115F0EE5');
        $this->addSql('ALTER TABLE user_law DROP FOREIGN KEY FK_E71D34A4A76ED395');
        $this->addSql('ALTER TABLE user_law DROP FOREIGN KEY FK_E71D34A454EB478');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564A76ED395');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A10856454EB478');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE law');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_law');
        $this->addSql('DROP TABLE vote');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213110626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_name VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64924A232CF (user_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE questions CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE has_answer has_answer TINYINT(1) NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');

        $this->addSql("INSERT INTO user (user_name, roles, password) VALUES ('admin', '[\"ROLE_ADMIN\"]', '$2y$13\$JvTkGRUf1CvFNjv3MAt8YuMbjqD7T7.feq9F65tf1buCQ3K/kQpcG')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE questions CHANGE id id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE has_answer has_answer TINYINT(1) DEFAULT 0 NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

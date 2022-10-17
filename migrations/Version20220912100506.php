<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912100506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, type1_id INT NOT NULL, type2_id INT DEFAULT NULL, num_pokedex INT NOT NULL, name VARCHAR(255) NOT NULL, name_fr VARCHAR(255) DEFAULT NULL, stat_hp INT DEFAULT NULL, stat_atk INT DEFAULT NULL, stat_def INT DEFAULT NULL, stat_spa INT DEFAULT NULL, stat_spd INT DEFAULT NULL, stat_speed INT DEFAULT NULL, bst INT DEFAULT NULL, generation INT NOT NULL, is_final_evol TINYINT(1) NOT NULL, catch_rate INT DEFAULT NULL, is_legendary TINYINT(1) NOT NULL, is_form VARCHAR(255) DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, INDEX IDX_62DC90F3BFAFA3E1 (type1_id), INDEX IDX_62DC90F3AD1A0C0F (type2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, name_fr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3BFAFA3E1 FOREIGN KEY (type1_id) REFERENCES types (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3AD1A0C0F FOREIGN KEY (type2_id) REFERENCES types (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3BFAFA3E1');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3AD1A0C0F');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE types');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

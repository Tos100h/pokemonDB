<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017121053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokemon_in_teams (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, pokemon_id INT NOT NULL, INDEX IDX_5B53F588296CD8AE (team_id), INDEX IDX_5B53F5882FE71C3E (pokemon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C4E0A61FC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_in_teams ADD CONSTRAINT FK_5B53F588296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE pokemon_in_teams ADD CONSTRAINT FK_5B53F5882FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FC54C8C93 FOREIGN KEY (type_id) REFERENCES types (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon_in_teams DROP FOREIGN KEY FK_5B53F588296CD8AE');
        $this->addSql('ALTER TABLE pokemon_in_teams DROP FOREIGN KEY FK_5B53F5882FE71C3E');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FC54C8C93');
        $this->addSql('DROP TABLE pokemon_in_teams');
        $this->addSql('DROP TABLE team');
    }
}

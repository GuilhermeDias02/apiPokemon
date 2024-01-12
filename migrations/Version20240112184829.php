<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112184829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pc_box (id INT AUTO_INCREMENT NOT NULL, id_pokedex_id INT NOT NULL, id_trainer_id INT NOT NULL, level INT NOT NULL, captured TINYINT(1) NOT NULL, INDEX IDX_F42F238A6D9CE9 (id_pokedex_id), INDEX IDX_F42F235E826D21 (id_trainer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, region_id INT NOT NULL, name VARCHAR(255) NOT NULL, id_pokedex INT NOT NULL, description LONGTEXT NOT NULL, sprite_path VARCHAR(255) DEFAULT NULL, INDEX IDX_62DC90F3C54C8C93 (type_id), INDEX IDX_62DC90F398260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trainer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pc_box ADD CONSTRAINT FK_F42F238A6D9CE9 FOREIGN KEY (id_pokedex_id) REFERENCES pokedex (id)');
        $this->addSql('ALTER TABLE pc_box ADD CONSTRAINT FK_F42F235E826D21 FOREIGN KEY (id_trainer_id) REFERENCES trainer (id)');
        $this->addSql('ALTER TABLE pokedex ADD CONSTRAINT FK_62DC90F3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pokedex ADD CONSTRAINT FK_62DC90F398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pc_box DROP FOREIGN KEY FK_F42F238A6D9CE9');
        $this->addSql('ALTER TABLE pc_box DROP FOREIGN KEY FK_F42F235E826D21');
        $this->addSql('ALTER TABLE pokedex DROP FOREIGN KEY FK_62DC90F3C54C8C93');
        $this->addSql('ALTER TABLE pokedex DROP FOREIGN KEY FK_62DC90F398260155');
        $this->addSql('DROP TABLE pc_box');
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE trainer');
        $this->addSql('DROP TABLE type');
    }
}

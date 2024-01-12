<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112192411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pc_box DROP FOREIGN KEY FK_F42F238A6D9CE9');
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, region_id INT NOT NULL, name VARCHAR(255) NOT NULL, id_pokedex INT NOT NULL, description LONGTEXT NOT NULL, sprite_path VARCHAR(255) DEFAULT NULL, INDEX IDX_6336F6A7C54C8C93 (type_id), INDEX IDX_6336F6A798260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokedex ADD CONSTRAINT FK_6336F6A7C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pokedex ADD CONSTRAINT FK_6336F6A798260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F398260155');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3C54C8C93');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP INDEX IDX_F42F238A6D9CE9 ON pc_box');
        $this->addSql('ALTER TABLE pc_box CHANGE id_pokemon_id id_pokedex_id INT NOT NULL');
        $this->addSql('ALTER TABLE pc_box ADD CONSTRAINT FK_F42F2392A0DDC3 FOREIGN KEY (id_pokedex_id) REFERENCES pokedex (id)');
        $this->addSql('CREATE INDEX IDX_F42F2392A0DDC3 ON pc_box (id_pokedex_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pc_box DROP FOREIGN KEY FK_F42F2392A0DDC3');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, region_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, id_pokedex INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sprite_path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_62DC90F3C54C8C93 (type_id), INDEX IDX_62DC90F398260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pokedex DROP FOREIGN KEY FK_6336F6A7C54C8C93');
        $this->addSql('ALTER TABLE pokedex DROP FOREIGN KEY FK_6336F6A798260155');
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP INDEX IDX_F42F2392A0DDC3 ON pc_box');
        $this->addSql('ALTER TABLE pc_box CHANGE id_pokedex_id id_pokemon_id INT NOT NULL');
        $this->addSql('ALTER TABLE pc_box ADD CONSTRAINT FK_F42F238A6D9CE9 FOREIGN KEY (id_pokemon_id) REFERENCES pokemon (id)');
        $this->addSql('CREATE INDEX IDX_F42F238A6D9CE9 ON pc_box (id_pokemon_id)');
    }
}

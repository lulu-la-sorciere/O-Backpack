<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210807145816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weather_country (weather_id INT NOT NULL, country_id INT NOT NULL, INDEX IDX_F74C2A2D8CE675E (weather_id), INDEX IDX_F74C2A2DF92F3E70 (country_id), PRIMARY KEY(weather_id, country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE weather_country ADD CONSTRAINT FK_F74C2A2D8CE675E FOREIGN KEY (weather_id) REFERENCES weather (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE weather_country ADD CONSTRAINT FK_F74C2A2DF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE weather DROP FOREIGN KEY FK_4CD0D36EF92F3E70');
        $this->addSql('DROP INDEX UNIQ_4CD0D36EF92F3E70 ON weather');
        $this->addSql('ALTER TABLE weather DROP country_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE weather_country');
        $this->addSql('ALTER TABLE weather ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE weather ADD CONSTRAINT FK_4CD0D36EF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4CD0D36EF92F3E70 ON weather (country_id)');
    }
}

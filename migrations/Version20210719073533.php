<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719073533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tv_show_category DROP FOREIGN KEY FK_82897B5212469DE2');
        $this->addSql('ALTER TABLE tv_show_character DROP FOREIGN KEY FK_FAF8B7A81136BE75');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA95E3A35BB');
        $this->addSql('ALTER TABLE tv_show_category DROP FOREIGN KEY FK_82897B525E3A35BB');
        $this->addSql('ALTER TABLE tv_show_character DROP FOREIGN KEY FK_FAF8B7A85E3A35BB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, post_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, continent_id INT NOT NULL, name VARCHAR(100) NOT NULL, language VARCHAR(30) NOT NULL, money VARCHAR(50) NOT NULL, visa TINYINT(1) NOT NULL, vaccine VARCHAR(255) NOT NULL, events VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5373C966921F4C77 (continent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_stuff (country_id INT NOT NULL, stuff_id INT NOT NULL, INDEX IDX_FEA1EDD4F92F3E70 (country_id), INDEX IDX_FEA1EDD4950A1740 (stuff_id), PRIMARY KEY(country_id, stuff_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_subject (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(150) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A02730BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(150) NOT NULL, content LONGTEXT DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5A8A6C8DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_continent (post_id INT NOT NULL, continent_id INT NOT NULL, INDEX IDX_CDA9728B4B89032C (post_id), INDEX IDX_CDA9728B921F4C77 (continent_id), PRIMARY KEY(post_id, continent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_country (post_id INT NOT NULL, country_id INT NOT NULL, INDEX IDX_6E9B7E554B89032C (post_id), INDEX IDX_6E9B7E55F92F3E70 (country_id), PRIMARY KEY(post_id, country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE response (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, forum_subject_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_3E7B0BFBA76ED395 (user_id), INDEX IDX_3E7B0BFB800861C2 (forum_subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE country_stuff ADD CONSTRAINT FK_FEA1EDD4F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_stuff ADD CONSTRAINT FK_FEA1EDD4950A1740 FOREIGN KEY (stuff_id) REFERENCES stuff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_subject ADD CONSTRAINT FK_A02730BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post_continent ADD CONSTRAINT FK_CDA9728B4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_continent ADD CONSTRAINT FK_CDA9728B921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_country ADD CONSTRAINT FK_6E9B7E554B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_country ADD CONSTRAINT FK_6E9B7E55F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFB800861C2 FOREIGN KEY (forum_subject_id) REFERENCES forum_subject (id)');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE tv_show');
        $this->addSql('DROP TABLE tv_show_category');
        $this->addSql('DROP TABLE tv_show_character');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD nickname VARCHAR(100) NOT NULL, ADD picture VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(100) NOT NULL, ADD date_of_birth DATE NOT NULL, ADD role VARCHAR(50) NOT NULL, ADD created_at DATETIME NOT NULL, ADD published_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, DROP roles, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(150) NOT NULL, CHANGE firstname firstname VARCHAR(100) NOT NULL, CHANGE lastname lastname VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966921F4C77');
        $this->addSql('ALTER TABLE post_continent DROP FOREIGN KEY FK_CDA9728B921F4C77');
        $this->addSql('ALTER TABLE country_stuff DROP FOREIGN KEY FK_FEA1EDD4F92F3E70');
        $this->addSql('ALTER TABLE post_country DROP FOREIGN KEY FK_6E9B7E55F92F3E70');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFB800861C2');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4B89032C');
        $this->addSql('ALTER TABLE post_continent DROP FOREIGN KEY FK_CDA9728B4B89032C');
        $this->addSql('ALTER TABLE post_country DROP FOREIGN KEY FK_6E9B7E554B89032C');
        $this->addSql('ALTER TABLE country_stuff DROP FOREIGN KEY FK_FEA1EDD4950A1740');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, gender VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, bio LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, age SMALLINT DEFAULT NULL, picture_filename VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id INT NOT NULL, episode_number SMALLINT NOT NULL, title VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, published_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_DDAA1CDA4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, tv_show_id INT NOT NULL, season_number SMALLINT NOT NULL, published_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_F0E45BA95E3A35BB (tv_show_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tv_show (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, synopsis LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nb_likes INT DEFAULT NULL, published_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, poster VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tv_show_category (tv_show_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_82897B525E3A35BB (tv_show_id), INDEX IDX_82897B5212469DE2 (category_id), PRIMARY KEY(tv_show_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tv_show_character (tv_show_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_FAF8B7A85E3A35BB (tv_show_id), INDEX IDX_FAF8B7A81136BE75 (character_id), PRIMARY KEY(tv_show_id, character_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA95E3A35BB FOREIGN KEY (tv_show_id) REFERENCES tv_show (id)');
        $this->addSql('ALTER TABLE tv_show_category ADD CONSTRAINT FK_82897B5212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tv_show_category ADD CONSTRAINT FK_82897B525E3A35BB FOREIGN KEY (tv_show_id) REFERENCES tv_show (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tv_show_character ADD CONSTRAINT FK_FAF8B7A81136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tv_show_character ADD CONSTRAINT FK_FAF8B7A85E3A35BB FOREIGN KEY (tv_show_id) REFERENCES tv_show (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE country_stuff');
        $this->addSql('DROP TABLE forum_subject');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_continent');
        $this->addSql('DROP TABLE post_country');
        $this->addSql('DROP TABLE response');
        $this->addSql('DROP TABLE stuff');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', DROP nickname, DROP picture, DROP country, DROP date_of_birth, DROP role, DROP created_at, DROP published_at, DROP updated_at, CHANGE firstname firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }
}

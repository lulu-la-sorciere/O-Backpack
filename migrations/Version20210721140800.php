<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721140800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
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
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, nickname VARCHAR(100) NOT NULL, picture VARCHAR(255) DEFAULT NULL, country VARCHAR(100) NOT NULL, date_of_birth DATE NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME NOT NULL, update_at DATETIME NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE forum_subject DROP FOREIGN KEY FK_A02730BA76ED395');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA76ED395');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFBA76ED395');
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
        $this->addSql('DROP TABLE user');
    }
}

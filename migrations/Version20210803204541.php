<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803204541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE forum_subject ADD continents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_subject ADD CONSTRAINT FK_A02730B298246F6 FOREIGN KEY (continents_id) REFERENCES continent (id)');
        $this->addSql('CREATE INDEX IDX_A02730B298246F6 ON forum_subject (continents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE forum_subject DROP FOREIGN KEY FK_A02730B298246F6');
        $this->addSql('DROP INDEX IDX_A02730B298246F6 ON forum_subject');
        $this->addSql('ALTER TABLE forum_subject DROP continents_id');
    }
}

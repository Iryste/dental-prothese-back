<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241024082015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adjointe DROP prix');
        $this->addSql('ALTER TABLE adjointe DROP prix2');
        $this->addSql('ALTER TABLE adjointe DROP prix3');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE adjointe ADD prix VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE adjointe ADD prix2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE adjointe ADD prix3 VARCHAR(255) DEFAULT NULL');
    }
}

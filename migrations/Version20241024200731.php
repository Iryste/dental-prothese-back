<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241024200731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adjointe ADD materiau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adjointe ADD CONSTRAINT FK_C67BAC9CCE19B47A FOREIGN KEY (materiau_id) REFERENCES materiau (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C67BAC9CCE19B47A ON adjointe (materiau_id)');
        $this->addSql('ALTER TABLE conjointe ADD materiau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE conjointe ADD CONSTRAINT FK_91449746CE19B47A FOREIGN KEY (materiau_id) REFERENCES materiau (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_91449746CE19B47A ON conjointe (materiau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE adjointe DROP CONSTRAINT FK_C67BAC9CCE19B47A');
        $this->addSql('DROP INDEX IDX_C67BAC9CCE19B47A');
        $this->addSql('ALTER TABLE adjointe DROP materiau_id');
        $this->addSql('ALTER TABLE conjointe DROP CONSTRAINT FK_91449746CE19B47A');
        $this->addSql('DROP INDEX IDX_91449746CE19B47A');
        $this->addSql('ALTER TABLE conjointe DROP materiau_id');
    }
}

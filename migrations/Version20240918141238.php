<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918141238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE conjointes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE adjointes_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE adjointe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE conjointe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adjointe (id INT NOT NULL, title VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, prix2 VARCHAR(255) DEFAULT NULL, prix3 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE conjointe (id INT NOT NULL, title VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE adjointes');
        $this->addSql('DROP TABLE conjointes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE adjointe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE conjointe_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE conjointes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE adjointes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adjointes (id INT NOT NULL, title VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, prix2 VARCHAR(255) DEFAULT NULL, prix3 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE conjointes (id INT NOT NULL, title VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE adjointe');
        $this->addSql('DROP TABLE conjointe');
    }
}

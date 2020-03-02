<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180228125226 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__hans AS SELECT id, hans_id, title, content, kalliope FROM hans');
        $this->addSql('DROP TABLE hans');
        $this->addSql('CREATE TABLE hans (id INTEGER NOT NULL, author_id INTEGER DEFAULT NULL, hans_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, content CLOB NOT NULL COLLATE BINARY, kalliope CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , PRIMARY KEY(id), CONSTRAINT FK_A4B1C748F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO hans (id, hans_id, title, content, kalliope) SELECT id, hans_id, title, content, kalliope FROM __temp__hans');
        $this->addSql('DROP TABLE __temp__hans');
        $this->addSql('CREATE INDEX IDX_A4B1C748F675F31B ON hans (author_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_A4B1C748F675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__hans AS SELECT id, hans_id, title, content, kalliope FROM hans');
        $this->addSql('DROP TABLE hans');
        $this->addSql('CREATE TABLE hans (id INTEGER NOT NULL, hans_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL, kalliope CLOB NOT NULL --(DC2Type:array)
        , PRIMARY KEY(id))');
        $this->addSql('INSERT INTO hans (id, hans_id, title, content, kalliope) SELECT id, hans_id, title, content, kalliope FROM __temp__hans');
        $this->addSql('DROP TABLE __temp__hans');
    }
}

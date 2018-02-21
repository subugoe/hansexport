<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180221103230 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__hans AS SELECT id, hans_id, content, kalliope FROM hans');
        $this->addSql('DROP TABLE hans');
        $this->addSql('CREATE TABLE hans (id INTEGER NOT NULL, hans_id INTEGER NOT NULL, content CLOB NOT NULL COLLATE BINARY, kalliope CLOB NOT NULL --(DC2Type:array)
        , PRIMARY KEY(id))');
        $this->addSql('INSERT INTO hans (id, hans_id, content, kalliope) SELECT id, hans_id, content, kalliope FROM __temp__hans');
        $this->addSql('DROP TABLE __temp__hans');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__hans AS SELECT id, hans_id, content, kalliope FROM hans');
        $this->addSql('DROP TABLE hans');
        $this->addSql('CREATE TABLE hans (id INTEGER NOT NULL, hans_id INTEGER NOT NULL, content CLOB NOT NULL, kalliope CLOB NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO hans (id, hans_id, content, kalliope) SELECT id, hans_id, content, kalliope FROM __temp__hans');
        $this->addSql('DROP TABLE __temp__hans');
    }
}

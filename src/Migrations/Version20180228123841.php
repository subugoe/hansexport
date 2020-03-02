<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180228123841 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_BDAFD8C82015DB7F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__author AS SELECT id, author, born FROM author');
        $this->addSql('DROP TABLE author');
        $this->addSql('CREATE TABLE author (id INTEGER NOT NULL, author VARCHAR(255) NOT NULL COLLATE BINARY, born DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO author (id, author, born) SELECT id, author, born FROM __temp__author');
        $this->addSql('DROP TABLE __temp__author');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('sqlite' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__author AS SELECT id, author, born FROM author');
        $this->addSql('DROP TABLE author');
        $this->addSql('CREATE TABLE author (id INTEGER NOT NULL, author VARCHAR(255) NOT NULL, born DATETIME NOT NULL, hans_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO author (id, author, born) SELECT id, author, born FROM __temp__author');
        $this->addSql('DROP TABLE __temp__author');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDAFD8C82015DB7F ON author (hans_id)');
    }
}

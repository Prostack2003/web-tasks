<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315145058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $clients = $schema->createTable('clients');

        $clients->addColumn('id', 'integer', ['autoincrement' => true]);
        $clients->addColumn('model', 'string', ['notnull' => true]);
        $clients->addColumn('version', 'string', ['notnull' => true]);
        $clients->addColumn('created_at', 'date', ['notnull' => true]);

        $clients->setPrimaryKey(['id']);

    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('clients');
    }
}

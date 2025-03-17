<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250316111556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoices CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoices RENAME INDEX user_id TO IDX_6A2F2F95A76ED395');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoices CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE invoices RENAME INDEX idx_6a2f2f95a76ed395 TO user_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211102643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('questions');
        $table->addColumn('id', Types::BIGINT, [
            'autoincrement' => true,
            'unsigned' => true,
        ]);
        $table->addColumn('asker_name', Types::STRING, ['length' => 255]);
        $table->addColumn('email', Types::STRING, ['length' => 255]);
        $table->addColumn('question', Types::TEXT);
        $table->addColumn('has_answer', Types::BOOLEAN, ['default' => false]);
        $table->addColumn('created_at', Types::DATETIME_MUTABLE);
        $table->addColumn('updated_at', Types::DATETIME_MUTABLE, ['notnull' => false]);
        $table->addColumn('deleted_at', Types::DATETIME_MUTABLE, ['notnull' => false]);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('questions');
    }
}

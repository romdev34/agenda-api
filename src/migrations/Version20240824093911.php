<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240824093911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD hour_time_slot_start VARCHAR(255) DEFAULT NULL, ADD minute_time_slot_start VARCHAR(255) DEFAULT NULL, ADD hour_time_slot_end VARCHAR(255) DEFAULT NULL, ADD minute_time_slot_end VARCHAR(255) DEFAULT NULL, DROP time_slot_start, DROP time_slot_end');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD time_slot_start VARCHAR(255) DEFAULT NULL, ADD time_slot_end VARCHAR(255) DEFAULT NULL, DROP hour_time_slot_start, DROP minute_time_slot_start, DROP hour_time_slot_end, DROP minute_time_slot_end');
    }
}

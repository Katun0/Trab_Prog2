<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241123184419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veterinario ADD CONSTRAINT FK_B0490CADA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B0490CADA76ED395 ON veterinario (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veterinario DROP FOREIGN KEY FK_B0490CADA76ED395');
        $this->addSql('DROP INDEX UNIQ_B0490CADA76ED395 ON veterinario');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241124053357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veterinario CHANGE user_id user_id INT NOT NULL, CHANGE cpf cpf VARCHAR(11) NOT NULL, CHANGE crmv crmv VARCHAR(10) NOT NULL, CHANGE contato contato VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veterinario CHANGE user_id user_id INT DEFAULT NULL, CHANGE cpf cpf VARCHAR(11) DEFAULT NULL, CHANGE crmv crmv VARCHAR(10) DEFAULT NULL, CHANGE contato contato VARCHAR(20) DEFAULT NULL');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241123212035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tutor DROP FOREIGN KEY FK_99074648A76ED395');
        $this->addSql('DROP INDEX UNIQ_99074648A76ED395 ON tutor');
        $this->addSql('ALTER TABLE user ADD type VARCHAR(20) NOT NULL, ADD dtype VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tutor ADD CONSTRAINT FK_99074648A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_99074648A76ED395 ON tutor (user_id)');
        $this->addSql('ALTER TABLE `user` DROP type, DROP dtype');
    }
}

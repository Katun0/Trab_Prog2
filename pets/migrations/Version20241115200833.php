<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241115200833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FE13B435A');
        $this->addSql('DROP INDEX fk_6aab231fe13b435a ON animal');
        $this->addSql('CREATE INDEX IDX_6AAB231FE13B435A ON animal (raca_id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FE13B435A FOREIGN KEY (raca_id) REFERENCES raca (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FE13B435A');
        $this->addSql('DROP INDEX idx_6aab231fe13b435a ON animal');
        $this->addSql('CREATE INDEX FK_6AAB231FE13B435A ON animal (raca_id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FE13B435A FOREIGN KEY (raca_id) REFERENCES raca (id) ON DELETE CASCADE');
    }
}

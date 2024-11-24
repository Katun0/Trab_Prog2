<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241124012851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agendamento (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, servico_id INT DEFAULT NULL, data_agendamento DATETIME DEFAULT NULL, descricao LONGTEXT DEFAULT NULL, INDEX IDX_1F6FB7AAA76ED395 (user_id), INDEX IDX_1F6FB7AA82E14982 (servico_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servico (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, descricao LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agendamento ADD CONSTRAINT FK_1F6FB7AAA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE agendamento ADD CONSTRAINT FK_1F6FB7AA82E14982 FOREIGN KEY (servico_id) REFERENCES servico (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agendamento DROP FOREIGN KEY FK_1F6FB7AAA76ED395');
        $this->addSql('ALTER TABLE agendamento DROP FOREIGN KEY FK_1F6FB7AA82E14982');
        $this->addSql('DROP TABLE agendamento');
        $this->addSql('DROP TABLE servico');
    }
}

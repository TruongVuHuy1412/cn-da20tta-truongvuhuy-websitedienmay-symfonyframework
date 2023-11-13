<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113070909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dien_thoai_user (dien_thoai_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_19F5072251EFAFC (dien_thoai_id), INDEX IDX_19F5072A76ED395 (user_id), PRIMARY KEY(dien_thoai_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dien_thoai_user ADD CONSTRAINT FK_19F5072251EFAFC FOREIGN KEY (dien_thoai_id) REFERENCES dien_thoai (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dien_thoai_user ADD CONSTRAINT FK_19F5072A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dien_thoai_user DROP FOREIGN KEY FK_19F5072251EFAFC');
        $this->addSql('ALTER TABLE dien_thoai_user DROP FOREIGN KEY FK_19F5072A76ED395');
        $this->addSql('DROP TABLE dien_thoai_user');
    }
}

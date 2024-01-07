<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103065707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE order_cart CHANGE status status VARCHAR(255) NOT NULL');
        // $this->addSql('ALTER TABLE order_item CHANGE ordered_id ordered_id INT NOT NULL');
        // $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09E238517C FOREIGN KEY (order_ref_id) REFERENCES order_cart (id)');
        // $this->addSql('CREATE INDEX IDX_52EA1F09E238517C ON order_item (order_ref_id)');
        // $this->addSql('ALTER TABLE product CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_cart CHANGE status status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09E238517C');
        $this->addSql('DROP INDEX IDX_52EA1F09E238517C ON order_item');
        $this->addSql('ALTER TABLE order_item CHANGE ordered_id ordered_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE description description VARCHAR(10000) NOT NULL');
        $this->addSql('ALTER TABLE user DROP image');
    }
}

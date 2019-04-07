<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190320100242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE element_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_value (id INT AUTO_INCREMENT NOT NULL, form_element_id INT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_D9552CAD16D866B0 (form_element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, services_list_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_5288FD4FD455DD7C (services_list_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_element (id INT AUTO_INCREMENT NOT NULL, form_id INT DEFAULT NULL, element_type_id INT NOT NULL, caption VARCHAR(255) NOT NULL, INDEX IDX_702C3E025FF69B7D (form_id), INDEX IDX_702C3E0232A7CCC7 (element_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_list (id INT AUTO_INCREMENT NOT NULL, sous_category_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_C0F1A0A9527FEED1 (sous_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE element_value ADD CONSTRAINT FK_D9552CAD16D866B0 FOREIGN KEY (form_element_id) REFERENCES form_element (id)');
        $this->addSql('ALTER TABLE form ADD CONSTRAINT FK_5288FD4FD455DD7C FOREIGN KEY (services_list_id) REFERENCES services_list (id)');
        $this->addSql('ALTER TABLE form_element ADD CONSTRAINT FK_702C3E025FF69B7D FOREIGN KEY (form_id) REFERENCES form (id)');
        $this->addSql('ALTER TABLE form_element ADD CONSTRAINT FK_702C3E0232A7CCC7 FOREIGN KEY (element_type_id) REFERENCES element_type (id)');
        $this->addSql('ALTER TABLE services_list ADD CONSTRAINT FK_C0F1A0A9527FEED1 FOREIGN KEY (sous_category_id) REFERENCES services_sous_category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE form_element DROP FOREIGN KEY FK_702C3E0232A7CCC7');
        $this->addSql('ALTER TABLE form_element DROP FOREIGN KEY FK_702C3E025FF69B7D');
        $this->addSql('ALTER TABLE element_value DROP FOREIGN KEY FK_D9552CAD16D866B0');
        $this->addSql('ALTER TABLE form DROP FOREIGN KEY FK_5288FD4FD455DD7C');
        $this->addSql('DROP TABLE element_type');
        $this->addSql('DROP TABLE element_value');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE form_element');
        $this->addSql('DROP TABLE services_list');
    }
}

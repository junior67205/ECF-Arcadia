<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240508141337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, habitats_id INT DEFAULT NULL, race_id INT DEFAULT NULL, name VARCHAR(70) NOT NULL, state VARCHAR(30) NOT NULL, weight NUMERIC(6, 2) NOT NULL, size NUMERIC(5, 2) NOT NULL, gender VARCHAR(25) NOT NULL, age VARCHAR(100) NOT NULL, INDEX IDX_966C69DD35D3C6F5 (habitats_id), INDEX IDX_966C69DD6E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food_animal (id INT AUTO_INCREMENT NOT NULL, animals_id INT DEFAULT NULL, aliment VARCHAR(100) NOT NULL, quantity INT NOT NULL, INDEX IDX_2A8549BC132B9E58 (animals_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitats (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', label VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messaging (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, last_name VARCHAR(150) NOT NULL, first_name VARCHAR(150) NOT NULL, subject VARCHAR(50) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_shedule (id INT AUTO_INCREMENT NOT NULL, days VARCHAR(32) NOT NULL, hours_open TIME DEFAULT NULL, hours_close TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_animals (id INT AUTO_INCREMENT NOT NULL, animals_id INT NOT NULL, name VARCHAR(100) DEFAULT NULL, size INT DEFAULT NULL, update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8B4A9D0F132B9E58 (animals_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, animals_id INT DEFAULT NULL, date DATETIME NOT NULL, food VARCHAR(150) NOT NULL, quantity INT NOT NULL, detail LONGTEXT DEFAULT NULL, INDEX IDX_C42F7784132B9E58 (animals_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, typeofservices_id INT NOT NULL, label VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image_name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7332E169F9F24F80 (typeofservices_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_services (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', label VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visitor_review (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(150) NOT NULL, first_name VARCHAR(150) NOT NULL, review LONGTEXT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD35D3C6F5 FOREIGN KEY (habitats_id) REFERENCES habitats (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE food_animal ADD CONSTRAINT FK_2A8549BC132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE picture_animals ADD CONSTRAINT FK_8B4A9D0F132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169F9F24F80 FOREIGN KEY (typeofservices_id) REFERENCES type_of_services (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD35D3C6F5');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD6E59D40D');
        $this->addSql('ALTER TABLE food_animal DROP FOREIGN KEY FK_2A8549BC132B9E58');
        $this->addSql('ALTER TABLE picture_animals DROP FOREIGN KEY FK_8B4A9D0F132B9E58');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784132B9E58');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169F9F24F80');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP TABLE food_animal');
        $this->addSql('DROP TABLE habitats');
        $this->addSql('DROP TABLE messaging');
        $this->addSql('DROP TABLE opening_shedule');
        $this->addSql('DROP TABLE picture_animals');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE type_of_services');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE visitor_review');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231223135329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE county (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, fips_code VARCHAR(10) NOT NULL, state_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disaster (id INT AUTO_INCREMENT NOT NULL, fema_declaration_string VARCHAR(255) DEFAULT NULL, disaster_number SMALLINT DEFAULT NULL, state_id INT NOT NULL, county_id INT NOT NULL, declaration_type VARCHAR(10) DEFAULT NULL, declaration_date DATETIME DEFAULT NULL, fiscal_year_declared SMALLINT DEFAULT NULL, incident_type_id INT NOT NULL, declaration_title VARCHAR(255) NOT NULL, ih_program_declared TINYINT(1) DEFAULT NULL, ia_program_declared TINYINT(1) DEFAULT NULL, pa_program_declared TINYINT(1) DEFAULT NULL, hm_program_declared TINYINT(1) DEFAULT NULL, incident_begin_date DATETIME DEFAULT NULL, incident_end_date DATETIME DEFAULT NULL, disaster_closeout_date DATETIME DEFAULT NULL, tribal_request TINYINT(1) DEFAULT NULL, place_code VARCHAR(10) DEFAULT NULL, designated_area VARCHAR(255) DEFAULT NULL, declaration_request_number VARCHAR(20) DEFAULT NULL, last_iafiling_date DATETIME DEFAULT NULL, fema_id VARCHAR(255) NOT NULL, fema_hash VARCHAR(255) DEFAULT NULL, fema_last_refresh DATETIME DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, short_name VARCHAR(10) NOT NULL, fips_code VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE county');
        $this->addSql('DROP TABLE disaster');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

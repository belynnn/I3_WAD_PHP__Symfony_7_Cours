<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240911101142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aeroport (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code VARCHAR(5) NOT NULL, description LONGTEXT DEFAULT NULL, date_mise_en_service DATE DEFAULT NULL, heure_mise_en_service TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) DEFAULT NULL, nationalite VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, email LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, exemplaire_id INT NOT NULL, date_emprunt DATE DEFAULT NULL, date_retour DATE DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, INDEX IDX_364071D719EB6921 (client_id), INDEX IDX_364071D75843AA21 (exemplaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exemplaire (id INT AUTO_INCREMENT NOT NULL, livre_id INT NOT NULL, etat VARCHAR(10) DEFAULT NULL, INDEX IDX_5EF83C9237D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(150) NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, description LONGTEXT DEFAULT NULL, date_publication DATE DEFAULT NULL, isbn VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_auteur (livre_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_A11876B537D925CB (livre_id), INDEX IDX_A11876B560BB6FE6 (auteur_id), PRIMARY KEY(livre_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D75843AA21 FOREIGN KEY (exemplaire_id) REFERENCES exemplaire (id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C9237D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B537D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B560BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D719EB6921');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D75843AA21');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C9237D925CB');
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B537D925CB');
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B560BB6FE6');
        $this->addSql('DROP TABLE aeroport');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE emprunt');
        $this->addSql('DROP TABLE exemplaire');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_auteur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

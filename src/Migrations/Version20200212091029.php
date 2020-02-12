<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200212091029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alumno (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, apellidos VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE alumnoxpi (id INT AUTO_INCREMENT NOT NULL, pi_id_id INT DEFAULT NULL, alumno_id INT NOT NULL, INDEX IDX_249B602E93E294A7 (pi_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, pi_id_id INT DEFAULT NULL, nombre VARCHAR(50) NOT NULL, formato VARCHAR(50) NOT NULL, INDEX IDX_B6B12EC793E294A7 (pi_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, curso_escolar VARCHAR(50) NOT NULL, profesor_responsable VARCHAR(25) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titulacion (id INT AUTO_INCREMENT NOT NULL, pi_id_id INT DEFAULT NULL, titulo VARCHAR(50) NOT NULL, curso VARCHAR(50) NOT NULL, INDEX IDX_873C182493E294A7 (pi_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, roles TINYINT(1) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnoxpi ADD CONSTRAINT FK_249B602E93E294A7 FOREIGN KEY (pi_id_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC793E294A7 FOREIGN KEY (pi_id_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE titulacion ADD CONSTRAINT FK_873C182493E294A7 FOREIGN KEY (pi_id_id) REFERENCES proyecto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnoxpi DROP FOREIGN KEY FK_249B602E93E294A7');
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC793E294A7');
        $this->addSql('ALTER TABLE titulacion DROP FOREIGN KEY FK_873C182493E294A7');
        $this->addSql('DROP TABLE alumno');
        $this->addSql('DROP TABLE alumnoxpi');
        $this->addSql('DROP TABLE documento');
        $this->addSql('DROP TABLE proyecto');
        $this->addSql('DROP TABLE titulacion');
        $this->addSql('DROP TABLE user');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200217194554 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, admin_name VARCHAR(20) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE alumno (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, apellidos VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE alumnoxpi (id INT AUTO_INCREMENT NOT NULL, pi_id_id INT DEFAULT NULL, alumno_id_id INT DEFAULT NULL, INDEX IDX_249B602E93E294A7 (pi_id_id), INDEX IDX_249B602ED3819735 (alumno_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, pi_id_id INT DEFAULT NULL, nombre VARCHAR(50) NOT NULL, formato VARCHAR(50) NOT NULL, INDEX IDX_B6B12EC793E294A7 (pi_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prof (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id INT AUTO_INCREMENT NOT NULL, prof_id INT DEFAULT NULL, titulacion_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, curso_escolar VARCHAR(50) NOT NULL, descripcion VARCHAR(255) NOT NULL, INDEX IDX_6FD202B9ABC1F7FE (prof_id), INDEX IDX_6FD202B9F471CF55 (titulacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titulacion (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, roles TINYINT(1) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, contrasenya VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnoxpi ADD CONSTRAINT FK_249B602E93E294A7 FOREIGN KEY (pi_id_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE alumnoxpi ADD CONSTRAINT FK_249B602ED3819735 FOREIGN KEY (alumno_id_id) REFERENCES alumno (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC793E294A7 FOREIGN KEY (pi_id_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B9ABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B9F471CF55 FOREIGN KEY (titulacion_id) REFERENCES titulacion (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnoxpi DROP FOREIGN KEY FK_249B602ED3819735');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B9ABC1F7FE');
        $this->addSql('ALTER TABLE alumnoxpi DROP FOREIGN KEY FK_249B602E93E294A7');
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC793E294A7');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B9F471CF55');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE alumno');
        $this->addSql('DROP TABLE alumnoxpi');
        $this->addSql('DROP TABLE documento');
        $this->addSql('DROP TABLE prof');
        $this->addSql('DROP TABLE proyecto');
        $this->addSql('DROP TABLE titulacion');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE usuario');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240404171626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detalle_rutina (id INT AUTO_INCREMENT NOT NULL, rutina_id INT NOT NULL, ejercicio_id INT NOT NULL, peso INT NOT NULL, series INT NOT NULL, repeticiones_por_serie INT NOT NULL, INDEX IDX_C85251F2D7A88FCB (rutina_id), INDEX IDX_C85251F230890A7D (ejercicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ejercicio (id INT AUTO_INCREMENT NOT NULL, maquina_id INT DEFAULT NULL, grupo_muscular_id INT NOT NULL, nombre_ejercicio VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, INDEX IDX_95ADCFF441420729 (maquina_id), INDEX IDX_95ADCFF45BEE8638 (grupo_muscular_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grupo_muscular (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, imagen VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maquina (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, marca VARCHAR(255) NOT NULL, imagen VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rutina (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, fecha_creacion DATE NOT NULL, INDEX IDX_A48AB255DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detalle_rutina ADD CONSTRAINT FK_C85251F2D7A88FCB FOREIGN KEY (rutina_id) REFERENCES rutina (id)');
        $this->addSql('ALTER TABLE detalle_rutina ADD CONSTRAINT FK_C85251F230890A7D FOREIGN KEY (ejercicio_id) REFERENCES ejercicio (id)');
        $this->addSql('ALTER TABLE ejercicio ADD CONSTRAINT FK_95ADCFF441420729 FOREIGN KEY (maquina_id) REFERENCES maquina (id)');
        $this->addSql('ALTER TABLE ejercicio ADD CONSTRAINT FK_95ADCFF45BEE8638 FOREIGN KEY (grupo_muscular_id) REFERENCES grupo_muscular (id)');
        $this->addSql('ALTER TABLE rutina ADD CONSTRAINT FK_A48AB255DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detalle_rutina DROP FOREIGN KEY FK_C85251F2D7A88FCB');
        $this->addSql('ALTER TABLE detalle_rutina DROP FOREIGN KEY FK_C85251F230890A7D');
        $this->addSql('ALTER TABLE ejercicio DROP FOREIGN KEY FK_95ADCFF441420729');
        $this->addSql('ALTER TABLE ejercicio DROP FOREIGN KEY FK_95ADCFF45BEE8638');
        $this->addSql('ALTER TABLE rutina DROP FOREIGN KEY FK_A48AB255DB38439E');
        $this->addSql('DROP TABLE detalle_rutina');
        $this->addSql('DROP TABLE ejercicio');
        $this->addSql('DROP TABLE grupo_muscular');
        $this->addSql('DROP TABLE maquina');
        $this->addSql('DROP TABLE rutina');
        $this->addSql('DROP TABLE user');
    }
}

<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180516015909 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE career (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(5000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, idpost_id INT NOT NULL, iduser_id INT NOT NULL, commentary VARCHAR(5000) NOT NULL, INDEX IDX_5F9E962A948D5142 (idpost_id), INDEX IDX_5F9E962A786A81FB (iduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friends (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, idfriends_id INT NOT NULL, INDEX IDX_21EE7069786A81FB (iduser_id), INDEX IDX_21EE706984639E0D (idfriends_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, idpost_id INT NOT NULL, INDEX IDX_AC6340B3786A81FB (iduser_id), INDEX IDX_AC6340B3948D5142 (idpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, idusersent_id INT NOT NULL, iduserreceiver_id INT NOT NULL, message VARCHAR(5500) DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_DB021E96192AE5F5 (idusersent_id), INDEX IDX_DB021E96E8603BAB (iduserreceiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, iduseraction_id INT NOT NULL, idpost_id INT NOT NULL, notificacion VARCHAR(3000) NOT NULL, date DATETIME NOT NULL, INDEX IDX_BF5476CA786A81FB (iduser_id), INDEX IDX_BF5476CA2AE5468E (iduseraction_id), INDEX IDX_BF5476CA948D5142 (idpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, idcareer_id INT NOT NULL, idtypeperson_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, birthday DATE DEFAULT NULL, address VARCHAR(500) NOT NULL, phonenumber INT NOT NULL, INDEX IDX_34DCD176CB9773FC (idcareer_id), INDEX IDX_34DCD176BBDECE00 (idtypeperson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, content VARCHAR(3000) NOT NULL, date DATETIME NOT NULL, INDEX IDX_5A8A6C8D786A81FB (iduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeperson (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_person_id INT NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(300) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649A14E0760 (id_person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A948D5142 FOREIGN KEY (idpost_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE7069786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE706984639E0D FOREIGN KEY (idfriends_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3948D5142 FOREIGN KEY (idpost_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96192AE5F5 FOREIGN KEY (idusersent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96E8603BAB FOREIGN KEY (iduserreceiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA2AE5468E FOREIGN KEY (iduseraction_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA948D5142 FOREIGN KEY (idpost_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176CB9773FC FOREIGN KEY (idcareer_id) REFERENCES career (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176BBDECE00 FOREIGN KEY (idtypeperson_id) REFERENCES typeperson (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A14E0760 FOREIGN KEY (id_person_id) REFERENCES person (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176CB9773FC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A14E0760');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A948D5142');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3948D5142');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA948D5142');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176BBDECE00');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A786A81FB');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE7069786A81FB');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE706984639E0D');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3786A81FB');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96192AE5F5');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96E8603BAB');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA786A81FB');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA2AE5468E');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D786A81FB');
        $this->addSql('DROP TABLE career');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE friends');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE typeperson');
        $this->addSql('DROP TABLE user');
    }
}

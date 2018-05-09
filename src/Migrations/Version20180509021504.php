<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180509021504 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE career (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(5000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, commentary VARCHAR(5000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friends (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(5500) DEFAULT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, notificacion VARCHAR(3000) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, id_tipo_id INT NOT NULL, idcareer_id INT NOT NULL, idtypeperson_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, birthday DATE DEFAULT NULL, address VARCHAR(500) NOT NULL, phonenumber INT NOT NULL, career INT NOT NULL, INDEX IDX_34DCD17677BAC71C (id_tipo_id), INDEX IDX_34DCD176CB9773FC (idcareer_id), INDEX IDX_34DCD176BBDECE00 (idtypeperson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(3000) NOT NULL, datetime DATETIME NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeperson (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_person_id INT NOT NULL, iduser_id INT DEFAULT NULL, idfriend_id INT NOT NULL, idnotification_id INT NOT NULL, idlike_id INT NOT NULL, idmessages_id INT NOT NULL, idcommentary_id INT NOT NULL, idpost_id INT NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(300) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649A14E0760 (id_person_id), INDEX IDX_8D93D649786A81FB (iduser_id), INDEX IDX_8D93D649144FF11D (idfriend_id), UNIQUE INDEX UNIQ_8D93D649E057D0D (idnotification_id), UNIQUE INDEX UNIQ_8D93D6495A9FA85C (idlike_id), UNIQUE INDEX UNIQ_8D93D64963512FF5 (idmessages_id), INDEX IDX_8D93D64924775E71 (idcommentary_id), INDEX IDX_8D93D649948D5142 (idpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD17677BAC71C FOREIGN KEY (id_tipo_id) REFERENCES typeperson (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176CB9773FC FOREIGN KEY (idcareer_id) REFERENCES career (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176BBDECE00 FOREIGN KEY (idtypeperson_id) REFERENCES typeperson (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A14E0760 FOREIGN KEY (id_person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649786A81FB FOREIGN KEY (iduser_id) REFERENCES friends (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649144FF11D FOREIGN KEY (idfriend_id) REFERENCES friends (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E057D0D FOREIGN KEY (idnotification_id) REFERENCES notification (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495A9FA85C FOREIGN KEY (idlike_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64963512FF5 FOREIGN KEY (idmessages_id) REFERENCES messages (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64924775E71 FOREIGN KEY (idcommentary_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649948D5142 FOREIGN KEY (idpost_id) REFERENCES post (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176CB9773FC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64924775E71');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649786A81FB');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649144FF11D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495A9FA85C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64963512FF5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E057D0D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A14E0760');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649948D5142');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD17677BAC71C');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176BBDECE00');
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

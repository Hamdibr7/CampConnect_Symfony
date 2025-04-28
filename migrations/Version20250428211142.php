<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428211142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE camping DROP FOREIGN KEY camping_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY amis_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY amis_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation DROP FOREIGN KEY conversation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation DROP FOREIGN KEY historiquereclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY likes_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY likes_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY message_ibfk_3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY message_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY message_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication DROP FOREIGN KEY publication_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY ticket_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE amis
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE avis
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE commentaire
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE conversation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE equipement
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE historiquereclamation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE likes
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE message
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE panier
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE publication
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reclamation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE utilisateur
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE badge CHANGE description description LONGTEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON camping
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation CHANGE montant montant DOUBLE PRECISION NOT NULL, CHANGE deletedAt deleted_at DATETIME DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX campingid ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_42C8495582461408 ON reservation (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE amis (id INT AUTO_INCREMENT NOT NULL, utilisateurid1 INT NOT NULL, utilisateurid2 INT NOT NULL, date_ajout DATE NOT NULL, status VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX utilisateurid1 (utilisateurid1), INDEX utilisateurid2 (utilisateurid2), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, utilisateurid INT NOT NULL, campingid INT NOT NULL, evaluation INT NOT NULL, avis TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX campingid (campingid), INDEX utilisateurid (utilisateurid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, publicationid INT NOT NULL, utilisateurid INT NOT NULL, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE DEFAULT 'CURRENT_TIMESTAMP' NOT NULL, INDEX utilisateurid (utilisateurid), INDEX publicationid (publicationid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, utilisateurid INT NOT NULL, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE NOT NULL, conversationid INT DEFAULT NULL, INDEX utilisateurid (utilisateurid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, nomEquip VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, qte_dispo INT NOT NULL, prix DOUBLE PRECISION NOT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE historiquereclamation (id_reclamation INT DEFAULT NULL, date DATE NOT NULL, heure TIME NOT NULL, details TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX id_reclamation (id_reclamation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE likes (id INT AUTO_INCREMENT NOT NULL, publicationid INT NOT NULL, utilisateurid INT NOT NULL, date DATE DEFAULT 'CURRENT_TIMESTAMP' NOT NULL, INDEX publicationid (publicationid), INDEX utilisateurid (utilisateurid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, ticket_id INT DEFAULT NULL, conversation_id INT DEFAULT NULL, utilisateurid INT NOT NULL, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_envoi DATE NOT NULL, INDEX conversation_id (conversation_id), INDEX utilisateurid (utilisateurid), INDEX ticket_id (ticket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, id_Equip INT NOT NULL, qte_com INT NOT NULL, prix_total DOUBLE PRECISION NOT NULL, INDEX id_Equip (id_Equip), INDEX id_utilisateur (id_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, utilisateurid INT NOT NULL, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, type_pub VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE DEFAULT 'CURRENT_TIMESTAMP' NOT NULL, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX utilisateurid (utilisateurid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, utilisateurid INT NOT NULL, campingid INT NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE DEFAULT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX campingid (campingid), INDEX utilisateurid (utilisateurid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, id_reclamation INT DEFAULT NULL, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_creat DATE NOT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX id_reclamation (id_reclamation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mdp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, age INT DEFAULT NULL, pdp VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, bio TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, badges JSON DEFAULT NULL COMMENT '(DC2Type:json)', INDEX idx_utilisateurid (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT amis_ibfk_2 FOREIGN KEY (utilisateurid2) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT amis_ibfk_1 FOREIGN KEY (utilisateurid1) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT avis_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT avis_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (publicationid) REFERENCES publication (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_2 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation ADD CONSTRAINT conversation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation ADD CONSTRAINT historiquereclamation_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT likes_ibfk_2 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT likes_ibfk_1 FOREIGN KEY (publicationid) REFERENCES publication (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT message_ibfk_3 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT message_ibfk_1 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT message_ibfk_2 FOREIGN KEY (conversation_id) REFERENCES conversation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT panier_ibfk_1 FOREIGN KEY (id_Equip) REFERENCES equipement (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT panier_ibfk_2 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication ADD CONSTRAINT publication_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT ticket_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE badge CHANGE description description TEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping CHANGE description description TEXT DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping ADD CONSTRAINT camping_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON camping (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495582461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation CHANGE montant montant DOUBLE PRECISION DEFAULT '0' NOT NULL, CHANGE deleted_at deletedAt DATETIME DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON reservation (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_42c8495582461408 ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX campingid ON reservation (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C8495582461408 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
    }
}

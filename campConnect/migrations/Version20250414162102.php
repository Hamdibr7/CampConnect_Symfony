<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250414162102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY amis_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY amis_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY amis_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY amis_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis CHANGE id id INT NOT NULL, CHANGE utilisateurid1 utilisateurid1 INT DEFAULT NULL, CHANGE utilisateurid2 utilisateurid2 INT DEFAULT NULL, CHANGE status status VARCHAR(50) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT FK_9FE2E76175C1A35B FOREIGN KEY (utilisateurid1) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT FK_9FE2E761ECC8F2E1 FOREIGN KEY (utilisateurid2) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid1 ON amis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9FE2E76175C1A35B ON amis (utilisateurid1)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid2 ON amis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9FE2E761ECC8F2E1 ON amis (utilisateurid2)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT amis_ibfk_1 FOREIGN KEY (utilisateurid1) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT amis_ibfk_2 FOREIGN KEY (utilisateurid2) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis CHANGE id id INT NOT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE campingid campingid INT DEFAULT NULL, CHANGE avis avis LONGTEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF082461408 FOREIGN KEY (campingid) REFERENCES camping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON avis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8F91ABF0A46AB7D5 ON avis (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX campingid ON avis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8F91ABF082461408 ON avis (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT avis_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT avis_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE badge CHANGE id id INT NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE image image VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping DROP FOREIGN KEY camping_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping DROP FOREIGN KEY camping_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping CHANGE id id INT NOT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE adresse adresse LONGTEXT NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE ville ville VARCHAR(255) NOT NULL, CHANGE pays pays VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping ADD CONSTRAINT FK_81A904E4A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON camping
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_81A904E4A46AB7D5 ON camping (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping ADD CONSTRAINT camping_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX user1 ON chat
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat CHANGE id id INT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat_message DROP FOREIGN KEY fk_chat
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat_message CHANGE id id INT NOT NULL, CHANGE chat_id chat_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE sent_at sent_at DATETIME NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX chat_id ON chat_message
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FAB3FC161A9A7125 ON chat_message (chat_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat_message ADD CONSTRAINT fk_chat FOREIGN KEY (chat_id) REFERENCES chat (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire CHANGE id id INT NOT NULL, CHANGE publicationid publicationid INT DEFAULT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE contenu contenu LONGTEXT NOT NULL, CHANGE date date DATETIME NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX publicationid ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_67F068BC9212FE28 ON commentaire (publicationid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_67F068BCA46AB7D5 ON commentaire (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (publicationid) REFERENCES publication (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_2 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation DROP FOREIGN KEY fk_conversation_ticket
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON conversation
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation DROP FOREIGN KEY fk_conversation_ticket
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation CHANGE id id INT NOT NULL, CHANGE ticketid ticketid INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E99274C08F FOREIGN KEY (ticketid) REFERENCES ticket (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_conversation_ticket ON conversation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8A8E26E99274C08F ON conversation (ticketid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation ADD CONSTRAINT fk_conversation_ticket FOREIGN KEY (ticketid) REFERENCES ticket (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement CHANGE id id INT NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE nomEquip nom_equip VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX id_utilisateur ON historique
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX historique_ibfk_1 ON historique
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historique CHANGE id id INT NOT NULL, CHANGE date_achat date_achat DATETIME NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation DROP FOREIGN KEY historiquereclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation DROP FOREIGN KEY fk_id_reclamation
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation DROP FOREIGN KEY historiquereclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation CHANGE id id INT NOT NULL, CHANGE heure heure VARCHAR(255) NOT NULL, CHANGE details details LONGTEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX id_reclamation ON historiquereclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D57F2E95D672A9F3 ON historiquereclamation (id_reclamation)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation ADD CONSTRAINT fk_id_reclamation FOREIGN KEY (id_reclamation) REFERENCES reclamation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation ADD CONSTRAINT historiquereclamation_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX unique_reaction ON likes
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY likes_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY likes_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes CHANGE id id INT NOT NULL, CHANGE publicationid publicationid INT DEFAULT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE reaction_type reaction_type TINYINT(1) NOT NULL, CHANGE date date DATE NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX publicationid ON likes
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_49CA4E7D9212FE28 ON likes (publicationid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON likes
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_49CA4E7DA46AB7D5 ON likes (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT likes_ibfk_1 FOREIGN KEY (publicationid) REFERENCES publication (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT likes_ibfk_2 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY message_ibfk_3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY message_ibfk_3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY message_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message CHANGE id id INT NOT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE contenu contenu LONGTEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX conversation_id ON message
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B6BD307F9AC0396 ON message (conversation_id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON message
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B6BD307FA46AB7D5 ON message (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT message_ibfk_3 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT message_ibfk_2 FOREIGN KEY (conversation_id) REFERENCES conversation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier CHANGE id id INT NOT NULL, CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL, CHANGE id_Equip id_Equip INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF250EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2DD37AD84 FOREIGN KEY (id_Equip) REFERENCES equipement (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX id_utilisateur ON panier
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_24CC0DF250EAE44 ON panier (id_utilisateur)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX id_equip ON panier
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_24CC0DF2DD37AD84 ON panier (id_Equip)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT panier_ibfk_1 FOREIGN KEY (id_Equip) REFERENCES equipement (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT panier_ibfk_2 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication DROP FOREIGN KEY publication_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication CHANGE id id INT NOT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE contenu contenu LONGTEXT NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE description description LONGTEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON publication
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_AF3C6779A46AB7D5 ON publication (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication ADD CONSTRAINT publication_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation CHANGE id id INT NOT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE campingid campingid INT DEFAULT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE date date DATE NOT NULL, CHANGE status status VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640482461408 FOREIGN KEY (campingid) REFERENCES camping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CE606404A46AB7D5 ON reclamation (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX campingid ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CE60640482461408 ON reclamation (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation CHANGE id id INT NOT NULL, CHANGE utilisateurid utilisateurid INT DEFAULT NULL, CHANGE campingid campingid INT DEFAULT NULL, CHANGE montant montant DOUBLE PRECISION NOT NULL, CHANGE statut statut VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C8495582461408 FOREIGN KEY (campingid) REFERENCES camping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX utilisateurid ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_42C84955A46AB7D5 ON reservation (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX campingid ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_42C8495582461408 ON reservation (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY ticket_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY ticket_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY fk_ticket_utilisateur
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket CHANGE id id INT NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE status status VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3D672A9F3 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX id_reclamation ON ticket
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_97A0ADA3D672A9F3 ON ticket (id_reclamation)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_ticket_utilisateur ON ticket
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_97A0ADA350EAE44 ON ticket (id_utilisateur)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT ticket_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT fk_ticket_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_utilisateurid ON utilisateur
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE utilisateur CHANGE id id INT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE age age INT NOT NULL, CHANGE pdp pdp VARCHAR(255) NOT NULL, CHANGE bio bio LONGTEXT NOT NULL, CHANGE badges badges VARCHAR(255) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY FK_9FE2E76175C1A35B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY FK_9FE2E761ECC8F2E1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY FK_9FE2E76175C1A35B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis DROP FOREIGN KEY FK_9FE2E761ECC8F2E1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid1 utilisateurid1 INT NOT NULL, CHANGE utilisateurid2 utilisateurid2 INT NOT NULL, CHANGE status status VARCHAR(50) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT amis_ibfk_1 FOREIGN KEY (utilisateurid1) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT amis_ibfk_2 FOREIGN KEY (utilisateurid2) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_9fe2e76175c1a35b ON amis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid1 ON amis (utilisateurid1)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_9fe2e761ecc8f2e1 ON amis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid2 ON amis (utilisateurid2)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT FK_9FE2E76175C1A35B FOREIGN KEY (utilisateurid1) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE amis ADD CONSTRAINT FK_9FE2E761ECC8F2E1 FOREIGN KEY (utilisateurid2) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF082461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF082461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE campingid campingid INT NOT NULL, CHANGE avis avis TEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT avis_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT avis_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_8f91abf0a46ab7d5 ON avis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON avis (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_8f91abf082461408 ON avis
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX campingid ON avis (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF082461408 FOREIGN KEY (campingid) REFERENCES camping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE badge CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping DROP FOREIGN KEY FK_81A904E4A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping DROP FOREIGN KEY FK_81A904E4A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE adresse adresse TEXT NOT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping ADD CONSTRAINT camping_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_81a904e4a46ab7d5 ON camping
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON camping (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE camping ADD CONSTRAINT FK_81A904E4A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX user1 ON chat (user1, user2)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat_message DROP FOREIGN KEY FK_FAB3FC161A9A7125
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat_message CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE chat_id chat_id INT NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE sent_at sent_at DATETIME DEFAULT CURRENT_TIMESTAMP
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_fab3fc161a9a7125 ON chat_message
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX chat_id ON chat_message (chat_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chat_message ADD CONSTRAINT FK_FAB3FC161A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC9212FE28
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE publicationid publicationid INT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE contenu contenu TEXT NOT NULL, CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_67f068bca46ab7d5 ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON commentaire (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_67f068bc9212fe28 ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX publicationid ON commentaire (publicationid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9212FE28 FOREIGN KEY (publicationid) REFERENCES publication (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E99274C08F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E99274C08F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE ticketid ticketid INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation ADD CONSTRAINT fk_conversation_ticket FOREIGN KEY (ticketid) REFERENCES ticket (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON conversation (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_8a8e26e99274c08f ON conversation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX fk_conversation_ticket ON conversation (ticketid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E99274C08F FOREIGN KEY (ticketid) REFERENCES ticket (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE nom_equip nomEquip VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historique CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE date_achat date_achat DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX id_utilisateur ON historique (id_utilisateur)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX historique_ibfk_1 ON historique (id_equip)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation DROP FOREIGN KEY FK_D57F2E95D672A9F3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE heure heure TIME NOT NULL, CHANGE details details TEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation ADD CONSTRAINT historiquereclamation_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_d57f2e95d672a9f3 ON historiquereclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX id_reclamation ON historiquereclamation (id_reclamation)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE historiquereclamation ADD CONSTRAINT FK_D57F2E95D672A9F3 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7D9212FE28
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DA46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE publicationid publicationid INT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE reaction_type reaction_type TINYINT(1) DEFAULT 0 NOT NULL, CHANGE date date DATE DEFAULT 'CURRENT_TIMESTAMP' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX unique_reaction ON likes (publicationid, utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_49ca4e7d9212fe28 ON likes
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX publicationid ON likes (publicationid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_49ca4e7da46ab7d5 ON likes
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON likes (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7D9212FE28 FOREIGN KEY (publicationid) REFERENCES publication (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DA46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9AC0396
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE contenu contenu TEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT message_ibfk_3 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_b6bd307f9ac0396 ON message
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX conversation_id ON message (conversation_id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_b6bd307fa46ab7d5 ON message
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON message (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF250EAE44
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2DD37AD84
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF250EAE44
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2DD37AD84
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE id_Equip id_Equip INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT panier_ibfk_1 FOREIGN KEY (id_Equip) REFERENCES equipement (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT panier_ibfk_2 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_24cc0df2dd37ad84 ON panier
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX id_Equip ON panier (id_Equip)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_24cc0df250eae44 ON panier
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX id_utilisateur ON panier (id_utilisateur)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF250EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2DD37AD84 FOREIGN KEY (id_Equip) REFERENCES equipement (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE contenu contenu TEXT DEFAULT NULL, CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE description description TEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_af3c6779a46ab7d5 ON publication
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON publication (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640482461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640482461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE campingid campingid INT NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE date date DATE DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_ce60640482461408 ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX campingid ON reclamation (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_ce606404a46ab7d5 ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON reclamation (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640482461408 FOREIGN KEY (campingid) REFERENCES camping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495582461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A46AB7D5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495582461408
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE utilisateurid utilisateurid INT NOT NULL, CHANGE campingid campingid INT NOT NULL, CHANGE montant montant DOUBLE PRECISION DEFAULT '0' NOT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_1 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_2 FOREIGN KEY (campingid) REFERENCES camping (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_42c8495582461408 ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX campingid ON reservation (campingid)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_42c84955a46ab7d5 ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX utilisateurid ON reservation (utilisateurid)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A46AB7D5 FOREIGN KEY (utilisateurid) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C8495582461408 FOREIGN KEY (campingid) REFERENCES camping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3D672A9F3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3D672A9F3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA350EAE44
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT ticket_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_97a0ada3d672a9f3 ON ticket
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX id_reclamation ON ticket (id_reclamation)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_97a0ada350eae44 ON ticket
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX fk_ticket_utilisateur ON ticket (id_utilisateur)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3D672A9F3 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA350EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE utilisateur CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE pdp pdp VARCHAR(255) DEFAULT NULL, CHANGE bio bio TEXT DEFAULT NULL, CHANGE badges badges JSON DEFAULT NULL COMMENT '(DC2Type:json)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_utilisateurid ON utilisateur (id)
        SQL);
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224182340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin_agence (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_system (id INT NOT NULL, admin_system_id INT DEFAULT NULL, INDEX IDX_9485207239622A97 (admin_system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caissier (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, numero_cni VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, caissier_id INT DEFAULT NULL, numero_compte VARCHAR(100) NOT NULL, solde INT NOT NULL, date_creation DATE NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_CFF65260B514973B (caissier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, caissier_id INT DEFAULT NULL, adminsystem_id INT DEFAULT NULL, date_depot DATE NOT NULL, INDEX IDX_47948BBCB514973B (caissier_id), INDEX IDX_47948BBC6AF56DC3 (adminsystem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, agent_retrait_id INT DEFAULT NULL, agent_depot_id INT DEFAULT NULL, client_depot_id INT DEFAULT NULL, client_retrait_id INT DEFAULT NULL, montant INT NOT NULL, date_depot DATE NOT NULL, date_retrait DATE NOT NULL, code_transfert VARCHAR(100) NOT NULL, frais INT NOT NULL, frais_depot INT NOT NULL, frais_retrait INT NOT NULL, frais_etat INT NOT NULL, frais_systeme INT NOT NULL, profil VARCHAR(255) NOT NULL, INDEX IDX_723705D1FBE9475 (agent_retrait_id), INDEX IDX_723705D1B3C1CD4A (agent_depot_id), INDEX IDX_723705D1ABF6E41B (client_depot_id), INDEX IDX_723705D1EEAC783B (client_retrait_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction_en_cours (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction_terminee (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, telephone VARCHAR(255) NOT NULL, statut TINYINT(1) NOT NULL, profil VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_agence ADD CONSTRAINT FK_3909AB50BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_system ADD CONSTRAINT FK_9485207239622A97 FOREIGN KEY (admin_system_id) REFERENCES admin_system (id)');
        $this->addSql('ALTER TABLE admin_system ADD CONSTRAINT FK_94852072BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caissier ADD CONSTRAINT FK_1F038BC2BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B514973B FOREIGN KEY (caissier_id) REFERENCES caissier (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBCB514973B FOREIGN KEY (caissier_id) REFERENCES caissier (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC6AF56DC3 FOREIGN KEY (adminsystem_id) REFERENCES admin_system (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1FBE9475 FOREIGN KEY (agent_retrait_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1B3C1CD4A FOREIGN KEY (agent_depot_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1ABF6E41B FOREIGN KEY (client_depot_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1EEAC783B FOREIGN KEY (client_retrait_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE transaction_en_cours ADD CONSTRAINT FK_AEE2AEC5BF396750 FOREIGN KEY (id) REFERENCES transaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction_terminee ADD CONSTRAINT FK_DCB94189BF396750 FOREIGN KEY (id) REFERENCES transaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_system DROP FOREIGN KEY FK_9485207239622A97');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC6AF56DC3');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1FBE9475');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1B3C1CD4A');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260B514973B');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBCB514973B');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1ABF6E41B');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1EEAC783B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649275ED078');
        $this->addSql('ALTER TABLE transaction_en_cours DROP FOREIGN KEY FK_AEE2AEC5BF396750');
        $this->addSql('ALTER TABLE transaction_terminee DROP FOREIGN KEY FK_DCB94189BF396750');
        $this->addSql('ALTER TABLE admin_agence DROP FOREIGN KEY FK_3909AB50BF396750');
        $this->addSql('ALTER TABLE admin_system DROP FOREIGN KEY FK_94852072BF396750');
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBF396750');
        $this->addSql('ALTER TABLE caissier DROP FOREIGN KEY FK_1F038BC2BF396750');
        $this->addSql('DROP TABLE admin_agence');
        $this->addSql('DROP TABLE admin_system');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE caissier');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE transaction_en_cours');
        $this->addSql('DROP TABLE transaction_terminee');
        $this->addSql('DROP TABLE user');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200504073027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, body VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE role CHANGE name name VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE users_roles MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE users_roles DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE users_roles DROP id');
        $this->addSql('ALTER TABLE users_roles ADD CONSTRAINT FK_51498A8EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_roles ADD CONSTRAINT FK_51498A8ED60322AC FOREIGN KEY (role_id) REFERENCES `role` (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_51498A8EA76ED395 ON users_roles (user_id)');
        $this->addSql('CREATE INDEX IDX_51498A8ED60322AC ON users_roles (role_id)');
        $this->addSql('ALTER TABLE users_roles ADD PRIMARY KEY (user_id, role_id)');
        $this->addSql('ALTER TABLE users_groups MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE users_groups DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE users_groups DROP id');
        $this->addSql('ALTER TABLE users_groups ADD CONSTRAINT FK_FF8AB7E0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_groups ADD CONSTRAINT FK_FF8AB7E0FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_FF8AB7E0A76ED395 ON users_groups (user_id)');
        $this->addSql('CREATE INDEX IDX_FF8AB7E0FE54D947 ON users_groups (group_id)');
        $this->addSql('ALTER TABLE users_groups ADD PRIMARY KEY (user_id, group_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE post');
        $this->addSql('ALTER TABLE product CHANGE name name TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `role` CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE users_groups DROP FOREIGN KEY FK_FF8AB7E0A76ED395');
        $this->addSql('ALTER TABLE users_groups DROP FOREIGN KEY FK_FF8AB7E0FE54D947');
        $this->addSql('DROP INDEX IDX_FF8AB7E0A76ED395 ON users_groups');
        $this->addSql('DROP INDEX IDX_FF8AB7E0FE54D947 ON users_groups');
        $this->addSql('ALTER TABLE users_groups ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE users_roles DROP FOREIGN KEY FK_51498A8EA76ED395');
        $this->addSql('ALTER TABLE users_roles DROP FOREIGN KEY FK_51498A8ED60322AC');
        $this->addSql('DROP INDEX IDX_51498A8EA76ED395 ON users_roles');
        $this->addSql('DROP INDEX IDX_51498A8ED60322AC ON users_roles');
        $this->addSql('ALTER TABLE users_roles ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}

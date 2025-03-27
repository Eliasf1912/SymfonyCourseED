<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327105816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, media_id_id INT NOT NULL, child_comment_id INT DEFAULT NULL, content LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_9474526C9D86650F (user_id_id), UNIQUE INDEX UNIQ_9474526C605D5AE6 (media_id_id), INDEX IDX_9474526C1CB68378 (child_comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, duration TIME DEFAULT NULL, release_date DATE DEFAULT NULL, UNIQUE INDEX UNIQ_DDAA1CDA68756988 (season_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, watch_history_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, short_description LONGTEXT DEFAULT NULL, long_description LONGTEXT DEFAULT NULL, release_date DATE DEFAULT NULL, cover_image VARCHAR(255) DEFAULT NULL, staff JSON DEFAULT NULL, caste JSON DEFAULT NULL, media_type VARCHAR(255) NOT NULL, INDEX IDX_6A2CA10C4D8CCBCC (watch_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_categorie (media_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_6C1D65BAEA9FDD75 (media_id), INDEX IDX_6C1D65BABCF5E72D (categorie_id), PRIMARY KEY(media_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language (media_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_DBBA5F07EA9FDD75 (media_id), INDEX IDX_DBBA5F0782F1BAF4 (language_id), PRIMARY KEY(media_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media (id INT AUTO_INCREMENT NOT NULL, playlist_id_id INT DEFAULT NULL, media_id_id INT DEFAULT NULL, added_at DATETIME NOT NULL, INDEX IDX_C930B84FDC588714 (playlist_id_id), INDEX IDX_C930B84F605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, playlist_id_id INT DEFAULT NULL, subscribed_at DATETIME NOT NULL, INDEX IDX_832940C9D86650F (user_id_id), INDEX IDX_832940CDC588714 (playlist_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, serie_id_id INT NOT NULL, season_number INT NOT NULL, INDEX IDX_F0E45BA9B748AAC3 (serie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, price NUMERIC(10, 2) NOT NULL, duration_in_months INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, subscription_id_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, UNIQUE INDEX UNIQ_54AF90D09D86650F (user_id_id), INDEX IDX_54AF90D0857C9F24 (subscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, playlist_id INT DEFAULT NULL, current_subscription_id_id INT NOT NULL, username VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, account_status VARCHAR(255) NOT NULL, INDEX IDX_8D93D6496BBD148 (playlist_id), UNIQUE INDEX UNIQ_8D93D6494924D8AF (current_subscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, last_watched DATETIME NOT NULL, number_of_view INT NOT NULL, UNIQUE INDEX UNIQ_DE44EFD89D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C1CB68378 FOREIGN KEY (child_comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA68756988 FOREIGN KEY (season_id_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C4D8CCBCC FOREIGN KEY (watch_history_id) REFERENCES watch_history (id)');
        $this->addSql('ALTER TABLE media_categorie ADD CONSTRAINT FK_6C1D65BAEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_categorie ADD CONSTRAINT FK_6C1D65BABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F0782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9B748AAC3 FOREIGN KEY (serie_id_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D0857C9F24 FOREIGN KEY (subscription_id_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6496BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6494924D8AF FOREIGN KEY (current_subscription_id_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD89D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
       
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C1CB68378');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA68756988');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C4D8CCBCC');
        $this->addSql('ALTER TABLE media_categorie DROP FOREIGN KEY FK_6C1D65BAEA9FDD75');
        $this->addSql('ALTER TABLE media_categorie DROP FOREIGN KEY FK_6C1D65BABCF5E72D');
        $this->addSql('ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F07EA9FDD75');
        $this->addSql('ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F0782F1BAF4');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FBF396750');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FDC588714');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F605D5AE6');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C9D86650F');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CDC588714');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9B748AAC3');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334BF396750');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09D86650F');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D0857C9F24');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6496BBD148');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6494924D8AF');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD89D86650F');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_categorie');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE playlist_media');
        $this->addSql('DROP TABLE playlist_subscription');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE subscription_history');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE watch_history');
    }
}

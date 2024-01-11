CREATE DATABASE `phpmemo`;

CREATE USER 'phpmemo'@'%' IDENTIFIED BY '1234';

GRANT EXECUTE, SELECT, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON `phpmemo`.* TO 'phpmemo'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

USE `phpmemo`;

CREATE TABLE `tbl_member` (
  `member_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_id` VARCHAR(40) NOT NULL,
  `login_name` VARCHAR(20) NOT NULL,
  `login_pw` VARCHAR(256) NULL,
  `insert_date` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`member_id`),
  UNIQUE INDEX `login_id` (`login_id`)
)
COMMENT='회원'
COLLATE='utf8mb4_general_ci';

CREATE TABLE `tbl_post` (
  `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_content` varchar(500) NOT NULL,
  `member_id` bigint(20) unsigned NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`post_id`),
  KEY `FK_tbl_post_tbl_member` (`member_id`),
  CONSTRAINT `FK_tbl_post_tbl_member` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`member_id`)
)
COMMENT='글'
COLLATE='utf8mb4_general_ci';
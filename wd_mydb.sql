-- MySQL Workbench Synchronization
-- Generated: 2019-07-29 16:04
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: King Kong

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL COMMENT 'Name Category',
  `code` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_brand` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Name Brand',
  `code` VARCHAR(60) NULL DEFAULT NULL,
  `logo` VARCHAR(100) NOT NULL DEFAULT 'no-image.jpg',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_tags` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Name Tags',
  `code` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL COMMENT 'Name Product',
  `code` VARCHAR(150) NULL DEFAULT NULL,
  `summary` VARCHAR(300) NULL DEFAULT NULL COMMENT 'Mô tả ngắn gọn',
  `description` TEXT NULL DEFAULT NULL COMMENT ' Mô tả chi tiết',
  `trending` TINYINT(4) NOT NULL DEFAULT 0 COMMENT 'Bán chạy',
  `popular` TINYINT(4) NOT NULL DEFAULT 0 COMMENT 'Nổi bật',
  `new_arrival` TINYINT(4) NOT NULL DEFAULT 0,
  `price` DOUBLE NOT NULL,
  `price_sale` DOUBLE NULL DEFAULT NULL,
  `avatar` VARCHAR(100) NOT NULL DEFAULT 'no-image.jpg',
  `date_post` DATETIME NOT NULL,
  `date_edit` DATETIME NULL DEFAULT NULL,
  `brand_id` INT(11) NOT NULL,
  `user_create_id` INT(11) NOT NULL COMMENT 'Người tạo',
  `user_edit_id1` INT(11) NOT NULL COMMENT 'Người sửa',
  PRIMARY KEY (`id`),
  INDEX `fk_wd_product_wd_brand_idx` (`brand_id` ASC) VISIBLE,
  INDEX `fk_wd_product_wd_user1_idx` (`user_create_id` ASC) VISIBLE,
  INDEX `fk_wd_product_wd_user2_idx` (`user_edit_id1` ASC) VISIBLE,
  CONSTRAINT `fk_wd_product_wd_brand`
    FOREIGN KEY (`brand_id`)
    REFERENCES `wd_ecommerce`.`wd_brand` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wd_product_wd_user1`
    FOREIGN KEY (`user_create_id`)
    REFERENCES `wd_ecommerce`.`wd_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wd_product_wd_user2`
    FOREIGN KEY (`user_edit_id1`)
    REFERENCES `wd_ecommerce`.`wd_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_product_category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `category_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wd_product_category_wd_category1_idx` (`category_id` ASC) VISIBLE,
  INDEX `fk_wd_product_category_wd_product1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_wd_product_category_wd_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `wd_ecommerce`.`wd_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wd_product_category_wd_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `wd_ecommerce`.`wd_product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_product_tags` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tags_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wd_product_tags_wd_tags1_idx` (`tags_id` ASC) VISIBLE,
  INDEX `fk_wd_product_tags_wd_product1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_wd_product_tags_wd_tags1`
    FOREIGN KEY (`tags_id`)
    REFERENCES `wd_ecommerce`.`wd_tags` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wd_product_tags_wd_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `wd_ecommerce`.`wd_product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `file` VARCHAR(100) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wd_images_wd_product1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_wd_images_wd_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `wd_ecommerce`.`wd_product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_slider` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `caption` VARCHAR(100) NOT NULL COMMENT 'Slider Caption',
  `summary` VARCHAR(300) NOT NULL COMMENT 'Slider Summary',
  `link` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_slider_images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `file` VARCHAR(100) NULL DEFAULT NULL,
  `slider_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wd_slider_images_wd_slider1_idx` (`slider_id` ASC) VISIBLE,
  CONSTRAINT `fk_wd_slider_images_wd_slider1`
    FOREIGN KEY (`slider_id`)
    REFERENCES `wd_ecommerce`.`wd_slider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_order` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_date` DATETIME NOT NULL,
  `total_price` DOUBLE NOT NULL DEFAULT 0 COMMENT 'Tổng tiền',
  `username` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `address` VARCHAR(250) NOT NULL,
  `note` VARCHAR(500) NULL DEFAULT NULL,
  `shipping` DOUBLE NOT NULL DEFAULT 0,
  `tax` DOUBLE NOT NULL DEFAULT 0,
  `total_pay` DOUBLE NOT NULL DEFAULT 0 COMMENT 'Thành tiền',
  `discount` DOUBLE NULL DEFAULT NULL,
  `discount_type` ENUM('% discount') NULL DEFAULT NULL,
  `pay_type` ENUM('paypal', 'credit', 'debit') NULL DEFAULT NULL,
  `status` ENUM('processing', 'shipped', 'delivered', 'error', 'cancelled') NULL DEFAULT 'Processing',
  `cancel_reason` VARCHAR(500) NULL DEFAULT NULL,
  `amount` INT(11) NOT NULL DEFAULT 0 COMMENT 'Số lượng',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_product_order` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `amount` INT(11) NOT NULL,
  `receipt` DOUBLE NOT NULL COMMENT 'Đơn giá',
  PRIMARY KEY (`id`),
  INDEX `fk_wd_product_order_wd_order1_idx` (`order_id` ASC) VISIBLE,
  INDEX `fk_wd_product_order_wd_product1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_wd_product_order_wd_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `wd_ecommerce`.`wd_order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wd_product_order_wd_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `wd_ecommerce`.`wd_product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `auth_key` VARCHAR(45) NULL DEFAULT NULL,
  `password_hash` VARCHAR(100) NOT NULL,
  `password_reset_token` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `status` INT(11) NOT NULL DEFAULT 0 COMMENT '0-not working. 10-working',
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `roles` ENUM('admin', 'customer') NULL DEFAULT 'customer',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wd_ecommerce`.`wd_user_roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wd_user_roles_wd_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_wd_user_roles_wd_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wd_ecommerce`.`wd_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

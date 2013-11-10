SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `tiankong_site` DEFAULT CHARACTER SET utf8 ;
USE `tiankong_site` ;

-- -----------------------------------------------------
-- Table `tiankong_site`.`bookmarks_url`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tiankong_site`.`bookmarks_url` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `url` VARCHAR(2048) NOT NULL ,
  `addTime` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '保存的书签地址';


-- -----------------------------------------------------
-- Table `tiankong_site`.`bookmarks_time`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tiankong_site`.`bookmarks_time` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `addTime` VARCHAR(45) NOT NULL COMMENT '月初的时间' ,
  `delete` INT NOT NULL DEFAULT 0 ,
  `urlId` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_table1_url` (`urlId` ASC) ,
  CONSTRAINT `fk_table1_url`
    FOREIGN KEY (`urlId` )
    REFERENCES `tiankong_site`.`bookmarks_url` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

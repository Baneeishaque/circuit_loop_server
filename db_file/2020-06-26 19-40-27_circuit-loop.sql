/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.5.62-log : Database - heroku_47889a058017794
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE = ''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;
/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts`
(
    `id`   int(11)     NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQUE` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `accounts` */

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`
(
    `username` varchar(10) NOT NULL,
    `password` varchar(10) DEFAULT NULL,
    PRIMARY KEY (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `admin` */


/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products`
(
    `id`            int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name`          varchar(50)      NOT NULL,
    `current_stock` double unsigned  NOT NULL,
    `minimum_stock` double unsigned  NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQUE` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `products` */

/*Table structure for table `raw_materials` */

DROP TABLE IF EXISTS `raw_materials`;

CREATE TABLE `raw_materials`
(
    `id`               int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name`             varchar(50)      NOT NULL,
    `measurement_unit` varchar(5)       NOT NULL,
    `current_stock`    double unsigned  NOT NULL,
    `minimum_stock`    double unsigned  NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQUE` (`name`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 31
  DEFAULT CHARSET = utf8;

/*Data for the table `raw_materials` */

insert into `raw_materials`(`id`, `name`, `measurement_unit`, `current_stock`, `minimum_stock`)
values (21, 'rw21', 'Nos', 126, 100);

/*Table structure for table `shop_owners` */

DROP TABLE IF EXISTS `shop_owners`;

CREATE TABLE `shop_owners`
(
    `id`       int(11)     NOT NULL AUTO_INCREMENT,
    `username` varchar(10) NOT NULL,
    `password` varchar(10) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQUE` (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `shop_owners` */

/*Table structure for table `staffs` */

DROP TABLE IF EXISTS `staffs`;

CREATE TABLE `staffs`
(
    `id`       int(11)     NOT NULL AUTO_INCREMENT,
    `username` varchar(10) NOT NULL,
    `password` varchar(10) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQUE` (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `staffs` */

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers`
(
    `id`         int(11)     NOT NULL AUTO_INCREMENT,
    `name`       varchar(50) NOT NULL,
    `account_id` int(11)     NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQUE` (`name`),
    KEY `ACCOUNT_ID` (`account_id`),
    CONSTRAINT `ACCOUNT_ID` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `suppliers` */

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions`
(
    `id`              int(11)     NOT NULL AUTO_INCREMENT,
    `particulars`     varchar(50) NOT NULL,
    `credit`          double      NOT NULL,
    `debit`           double      NOT NULL,
    `balance`         double      NOT NULL,
    `from_account_id` int(11)     NOT NULL,
    `to_account_id`   int(11)     NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FROM_ACCOUNT_ID` (`from_account_id`),
    KEY `TO_ACCOUNT_ID` (`to_account_id`),
    CONSTRAINT `TO_ACCOUNT_ID` FOREIGN KEY (`to_account_id`) REFERENCES `accounts` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `FROM_ACCOUNT_ID` FOREIGN KEY (`from_account_id`) REFERENCES `accounts` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `transactions` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders`
(
    `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
    `price`          double           NOT NULL,
    `status`         varchar(15)      NOT NULL,
    `supplier_id`    int(11)          NOT NULL,
    `transaction_id` int(11)          NOT NULL,
    PRIMARY KEY (`id`),
    KEY `STATUS` (`status`),
    KEY `SUPPLIER_ID` (`supplier_id`),
    KEY `TRANSACTION_ID` (`transaction_id`),
    CONSTRAINT `SUPPLIER_ID` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `TRANSACTION_ID` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `orders` */

/*Table structure for table `order_items` */

DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `order_id`   int(10) unsigned NOT NULL,
    `item_id`    int(10) unsigned NOT NULL,
    `qty`        double unsigned  NOT NULL,
    `piece_rate` double unsigned  NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ORDER_ID` (`order_id`),
    KEY `ITEM_ID` (`item_id`),
    CONSTRAINT `ORDER_ID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `ITEM_ID` FOREIGN KEY (`item_id`) REFERENCES `raw_materials` (`id`) ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/*Data for the table `order_items` */

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

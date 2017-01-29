SET FOREIGN_KEY_CHECKS = 0;
 
SELECT @@FOREIGN_KEY_CHECKS;

DROP TABLE IF EXISTS `#__pv_nomination_displays`;
DROP TABLE IF EXISTS `#__pv_nomination_data`;
DROP TABLE IF EXISTS `#__pv_nominations`;

DELETE FROM `#__pv_tables` WHERE `name` LIKE "%pv_nominations";
DELETE FROM `#__pv_tables` WHERE `name` LIKE "%pv_nomination_displays";
DELETE FROM `#__pv_tables` WHERE `name` LIKE "%pv_nomination_data";

SET FOREIGN_KEY_CHECKS = 1;
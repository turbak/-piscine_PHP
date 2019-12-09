DROP TABLE IF EXISTS `ft_table`;
CREATE TABLE `ft_table` (
    `id` INT UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `login` varchar(8) DEFAULT 'toto' NOT NULL,
    `group` enum('staff', 'student', 'other') NOT NULL,
    `creation_date` DATE NOT NULL
);

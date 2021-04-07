CREATE TABLE `my_test`.`address_book` ( 
    `sid` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL , 
    `email` VARCHAR(255) NULL , 
    `mobile` VARCHAR(255) NOT NULL , 
    `address` VARCHAR(255) NOT NULL , 
    `birthday` DATE NOT NULL , 
    `create_at` DATETIME NOT NULL , 
    PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;


INSERT INTO `address_book` 
    (`sid`, `name`, `email`, `mobile`, `address`, `birthday`, `create_at`) 
VALUES 
    (NULL, '吳宛蓉', 'wanwan1313@gmail.com', '0920288325', '新北市汐止區仁愛路152巷', '1989-01-13', '2021-04-07 04:31:57.000000');

INSERT INTO `address_book` 
    (`sid`, `name`, `email`, `mobile`, `address`, `birthday`, `create_at`) 
VALUES 
    (NULL, '項柏諭', 'andrew@gmail.com', '0917936538', '新北市汐止區仁愛路152巷', '1990-07-03', '2021-04-07 04:35:00.000000');


INSERT INTO `address_book` 
    (`sid`, `name`, `email`, `mobile`, `address`, `birthday`, `create_at`) 
VALUES 
    (NULL, 'momo', 'momo@gmail.com', '0912222222', '新北市汐止區仁愛路152巷', '1989-05-03', NOW()),
    (NULL, 'fifi', 'fifi@gmail.com', '0913333333', '新北市汐止區仁愛路152巷', '1989-07-12', NOW()),
    (NULL, 'emma', 'emma@gmail.com', '0914444444', '新北市汐止區仁愛路152巷', '1988-09-25', NOW()),
    (NULL, 'melody', 'melody@gmail.com', '0915555555', '新北市汐止區仁愛路152巷', '1989-06-14', NOW()),
    (NULL, 'yi', 'yi@gmail.com', '0916666666', '新北市汐止區仁愛路152巷', '1989-06-25', NOW()),
    (NULL, 'roy', 'roy@gmail.com', '09177777777', '新北市汐止區仁愛路152巷', '1989-05-11', NOW()),
    (NULL, 'carol', 'carol@gmail.com', '0918888888', '新北市汐止區仁愛路152巷', '1989-08-31', NOW());


DELETE FROM `address_book` WHERE `address_book`.`sid` = 7
UPDATE `address_book` set `mobile` = '0914521023', `address` = '台北市大安區信義路四段30巷' WHERE `sid` = 6
SELECT * FROM `address_book` WHERE `birthday` < '1989-04-07'



CREATE USER 'wanwan2'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'wanwan2'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;



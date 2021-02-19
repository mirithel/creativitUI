CREATE USER 'masterarbeit'@'localhost' IDENTIFIED BY 'MA2020';

CREATE DATABASE masterarbeit;
GRANT ALL PRIVILEGES ON masterarbeit.* TO 'masterarbeit'@'localhost';

GRANT FILE ON *.* TO 'masterarbeit'@'localhost';
FLUSH PRIVILEGES;

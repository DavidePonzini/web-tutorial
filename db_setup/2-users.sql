START TRANSACTION;

CREATE USER IF NOT EXISTS 'dani'@'localhost';
ALTER USER 'dani'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON website.* TO 'dani'@'localhost';

COMMIT;

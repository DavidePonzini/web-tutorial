START TRANSACTION;

CREATE USER IF NOT EXISTS 'myuser'@'localhost';
ALTER USER 'myuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON website.* TO 'myuser'@'localhost';

COMMIT;
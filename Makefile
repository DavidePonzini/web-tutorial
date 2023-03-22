# needed for input redirection
SHELL := /bin/bash

DB_NAME=dani_web_tutorial
DB_USER=daniadmin

setup: create_database create_tables create_admin_user


create_database:
	mysql <<< "DROP DATABASE IF EXISTS $(DB_NAME);"
	mysql <<< "CREATE DATABASE $(DB_NAME);"
	mysql <<< "GRANT ALL PRIVILEGES ON $(DB_NAME).* TO 'dba'@'localhost';"

create_tables:
	mysql $(DB_NAME) < ./db_setup/1-tables.sql

create_admin_user:
	mysql $(DB_NAME) <<< "CREATE USER IF NOT EXISTS '$(DB_USER)'@'localhost';"
	mysql $(DB_NAME) <<< "ALTER USER '$(DB_USER)'@'localhost' IDENTIFIED BY 'password';"
	mysql $(DB_NAME) <<< "GRANT ALL PRIVILEGES ON $(DB_NAME).* TO '$(DB_USER)'@'localhost';"

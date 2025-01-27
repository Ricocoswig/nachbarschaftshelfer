
    CREATE DATABASE nachbarschaftshilfe;

    USE nachbarschaftshilfe;

    CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL
    );

    CREATE TABLE patients (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        patient_name VARCHAR(100) NOT NULL,
        patient_details TEXT
    );

    INSERT INTO users (username, password) VALUES ('admin', 'adminpassword');
    
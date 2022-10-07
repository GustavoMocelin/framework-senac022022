DROP DATABASE IF EXISTS trabalhoPost;
CREATE DATABASE trabalhoPost;
USE trabalhoPost;


CREATE TABLE IF NOT EXISTS car(
    id_carro INTEGER PRIMARY KEY AUTO_INCREMENT,
    carName VARCHAR(255),
    model VARCHAR(255)
);

/*INSERT INTO car (carName,model) VALUES
('Civic', 'Honda');*/


select * from car;
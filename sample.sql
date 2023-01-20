CREATE TABLE authors(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  age INT,
  nationality VARCHAR(100),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
  authors (name, age, nationality)
VALUES
('tony', 35, 'American');

INSERT INTO
  authors (name, age, nationality)
VALUES
('jack', 20, 'British');

INSERT INTO
  authors (name, age, nationality)
VALUES
('sara', 45, 'Egyptian');

INSERT INTO
  authors (name, age, nationality)
VALUES
('saly', 31, 'Chinese');
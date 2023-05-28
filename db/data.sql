INSERT INTO categories (id, name) VALUES
  (1, 'Football'),
  (2, 'Basketball'),
  (3, 'Hockey'),
  (4, 'Baseball'),
  (5, 'Rugby'),
  (6, 'Boxing'),
  (7, 'Water Polo'),
  (8, 'Chess'),
  (9, 'Ping Pong'),
  (10, 'Tennis');

INSERT INTO users (first_name, last_name, email, password, address, city, country, zip_code) VALUES ('Lorik', 'Ramosaj', 'lorikramosaj@gmail.com', '$2y$10$Umqzl3miLG9WqwwhiXnmDOtij5feNl9/61g9fCUgbouTHhMCFOx0K', 'Atdhe Ramosaj s.t', 'Decan', 'Kosove', '50000');
INSERT INTO users (first_name, last_name, email, password, address, city, country, zip_code) VALUES ('Aurite', 'Bytyci', 'auritebytyci@gmail.com', '$2y$10$Umqzl3miLG9WqwwhiXnmDOtij5feNl9/61g9fCUgbouTHhMCFOx0K', 'Uke Bytyci s.t', 'Therande', 'Kosove', '23000');

INSERT INTO products (name, description, price, category_id, image_url) VALUES
("Product1", "Description1", 45.00, 1, 'football.jpg'),
("Product2", "Description2", 41.00, 1, 'football1.jpg'),
("Product3", "Description3", 21.20, 4, 'baseball.jpg'),
("Product4", "Description4", 20.50, 6, 'box.jpg'),
("Product5", "Description5", 45.00, 6, 'box1.jpg')


INSERT INTO products (name, description, price, category_id, image_url)
VALUES
    ('BOX', 'Box is...', 10.00, 6, 'images/box.jpg'),
    ('GLOVES', 'Product descrip...', 15.00, 10, 'images/gloves.jpg'),
    ('PINGPONG', 'Product descrip...', 15.00, 9, 'images/pingpong.jpg'),
    ('FOOTBALL1', 'Product descrip...', 15.00, 1, 'images/football1.jpg'),
    ('BASEBALL', 'Box is...', 10.00, 1, 'images/baseball.jpg'),
    ('TRAINERS', 'Product descrip...', 15.00, 1, 'images/trainers.jpg'),
    ('BASKETBALL', 'Product descrip...', 15.00, 2, 'images/basketball.jpg'),
    ('TRAINERS2', 'Product descrip...', 15.00, 1, 'images/trainers2.jpg'),
    ('BOX1', 'Box is...', 10.00, 1, 'images/box1.jpg'),
    ('FOOTBALL', 'Product descrip...', 15.00, 1, 'images/football.jpg'),
    ('GLOVES2', 'Product descrip...', 15.00, 6, 'images/gloves2.jpg'),
    ('TRAINERS3', 'Product descrip...', 15.00, 1, 'images/trainers3.jpg'),
    ('TENNIS', 'Product descrip...', 15.00, 10, 'images/tennis.jpg');

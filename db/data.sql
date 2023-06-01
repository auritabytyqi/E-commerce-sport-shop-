INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Football', '2023-05-28 13:44:34'),
(2, 'Basketball', '2023-05-28 13:44:34'),
(4, 'Baseball', '2023-05-28 13:44:34'),
(5, 'Rugby', '2023-05-28 13:44:34'),
(6, 'Boxing', '2023-05-28 13:44:34'),
(7, 'Water Polo', '2023-05-28 13:44:34'),
(8, 'Chess', '2023-05-28 13:44:34'),
(9, 'Ping Pong', '2023-05-28 13:44:34'),
(10, 'Tennis', '2023-05-28 13:44:34'),
(11, 'Game', '2023-05-29 13:33:11'),
(12, 'Volleyball', '2023-05-29 17:25:10');

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


INSERT INTO productsinsale (name, description, price, category_id, image_url)
VALUES
    ('CHESS TABLE', ' A stylish and functional table designed specifically for playing chess. This table features a square playing surface with a checkered pattern, providing a dedicated space for intense chess matches', 10.00, 8, 'images/chessTable.jpg'),
    ('PING PONG BALLS', 'High-quality balls specifically designed for playing ping pong. These lightweight and durable balls ensure excellent bounce and performance during gameplay', 15.00, 9, 'images/pingpongBalls.jpg'),
    ('VOLLEYBALL BALL', 'A regulation-size volleyball suitable for both casual and competitive play. Its sturdy construction and reliable grip make it ideal for beach, indoor, or outdoor volleyball games', 15.00, 12, 'images/volleyBall.jpg'),
    ('SPORT BAG', ' A versatile and spacious sports bag designed to carry all your essential gear. With multiple compartments and a comfortable carrying strap, it is perfect for athletes on the go', 15.00, 11, 'images/sportBag.jpg'),
    ('SPORT BOTTLE', ' A convenient and portable water bottle for sports enthusiasts. The bottles leak-proof design and easy-to-use flip-top lid make it a reliable choice for staying hydrated during workouts and outdoor activities.', 10.00, 11, 'images/sportBottle.png');


  INSERT INTO `comments` (`id`, `product_id`, `comment_text`, `user_name`, `likes`) VALUES
(11, 11, 'This product exceeded my expectations! The quality is superb, and it works flawlessly. I highly recommend it to everyone.', 'John Doe', 15),
(12, 12, 'I have been using this product for a while now, and I must say it has made my life so much easier. The design is sleek, and the performance is outstanding.', 'Emily Smith', 10),
(13, 11, 'I recently purchased this product, and it has completely transformed my daily routine. It is incredibly intuitive to use, and the results are impressive.', 'Michael Johnson', 8),
(14, 8, 'I cannot express how much I love this product! It has become an essential part of my everyday life. The features are top-notch, and the customer support is excellent.', 'Sarah Thompson', 24),
(15, 8, 'If you are looking for a reliable and durable product, look no further! This product has exceeded my expectations in terms of performance and longevity.', 'David Wilson', 17),
(16, 8, 'I have tried several similar products before, but none of them come close to the quality and functionality of this one. It is definitely worth the investment.', 'Olivia Davis', 8),
(17, 11, 'I have recommended this product to all my friends and family. It is a game-changer! The ease of use and the excellent results make it a must-have.', 'Sophia Anderson', 18),
(18, 8, 'This product has simplified my life in so many ways. It is incredibly versatile and has become an indispensable tool in my daily activities.', 'James Brown', 7),
(19, 8, 'I have been using this product for a few weeks now, and I can not imagine my life without it. It is intuitive, efficient, and has a sleek design.', 'Emma Taylor', 9),
(20, 8, 'I purchased this product after reading numerous positive reviews, and I am happy to say it lives up to the hype. It is an excellent addition to my collection.', 'Noah Miller', 11),
(21, 8, 'Nice product!', 'Aurita', 0),
(22, 8, 'Nice product!', 'Aurita', 0),
(23, 8, 'Nice product!', 'Aurita', 0),
(24, 8, 'Really nice!', 'Emma', 0),
(25, 8, 'Really nice!', 'Emma', 0),
(26, 8, 'Really nice!', 'Emma', 0),
(27, 8, 'It can be better!', 'Unknown', 0),
(28, 8, 'It can be better!', 'Unknown', 1),
(29, 8, 'It can be better!', 'Unknown', 2),
(30, 8, 'It can be better!', 'Unknown', 0),
(31, 8, 'It can be better!', 'Unknown', 0),
(32, 8, 'It can be better!', 'Unknown', 0),
(33, 8, 'null', 'null', 0),
(34, 8, 'New', 'Unknown', 0),
(35, 8, 'Last comment', 'Unknown', 0),
(36, 8, 'I love this product!', 'Arthur', 0),
(37, 8, 'Test', 'Unknown', 0),
(38, 8, 'Na keni lodhe', 'Armend', 1),
(39, 7, 'fafaf', 'faefa', 0);


INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image_url`, `created_at`) VALUES
(6, 'BOX', 'Box is...', 10.00, 6, 'images/box.jpg', '2023-05-28 19:10:12'),
(7, 'GLOVES', 'Product descrip...', 15.00, 10, 'images/gloves.jpg', '2023-05-28 19:10:12'),
(8, 'PINGPONG', 'Product descrip...', 15.00, 9, 'images/pingpong.jpg', '2023-05-28 19:10:12'),
(9, 'FOOTBALL1', 'Product descrip...', 15.00, 1, 'images/football1.jpg', '2023-05-28 19:10:12'),
(10, 'BASEBALL', 'Box is...', 10.00, 1, 'images/baseball.jpg', '2023-05-28 19:10:12'),
(11, 'TRAINERS', 'Product descrip...', 15.00, 1, 'images/trainers.jpg', '2023-05-28 19:10:12'),
(12, 'BASKETBALL-BALL', 'Product descrip...', 15.00, 2, 'images/basketball.jpg', '2023-05-28 19:10:12'),
(13, 'TRAINERS2', 'Product descrip...', 15.00, 2, 'images/trainers2.jpg', '2023-05-28 19:10:12'),
(14, 'BOX1', 'Box is...', 10.00, 1, 'images/box1.jpg', '2023-05-28 19:10:12'),
(15, 'FOOTBALL', 'Product descrip...', 15.00, 1, 'images/football.jpg', '2023-05-28 19:10:12'),
(16, 'GLOVES2', 'Product descrip...', 15.00, 6, 'images/gloves2.jpg', '2023-05-28 19:10:12'),
(17, 'TRAINERS3', 'Product descrip...', 15.00, 1, 'images/trainers3.jpg', '2023-05-28 19:10:12'),
(18, 'TENNIS', 'Product descrip...', 45.00, 10, 'images/tennis.jpg', '2023-05-28 19:10:12'),
(19, 'Headphones', 'new product', 34.00, 11, 'images/gloves.png', '2023-05-29 13:35:27'),
(20, 'Headphones', 'Product description ...', 36.00, 11, 'images/gloves.png', '2023-05-29 19:45:43');


INSERT INTO `productsinsale` (`id`, `name`, `description`, `price`, `category_id`, `image_url`, `created_at`) VALUES
('a1', 'CHESS TABLE', ' This table features a square playing surface with a checkered pattern, providing a dedicated space for intense chess matches', 70.00, 8, 'images/chessTable.jpg', '2023-05-30 04:53:29'),
('a2', 'PING PONG BALLS', 'These lightweight and durable balls ensure excellent bounce and performance during gameplay', 15.00, 9, 'images/pingpongBalls.jpg', '2023-05-30 04:53:29'),
('a3', 'VOLLEYBALL BALL', 'A regulation-size volleyball suitable for both casual and competitive play. ', 15.00, 12, 'images/volleyBall.jpg', '2023-05-30 04:53:29'),
('a4', 'SPORT BAG', 'With multiple compartments and a comfortable carrying strap, it is perfect for athletes on the go', 55.00, 11, 'images/sportBag.jpg', '2023-05-30 04:53:29'),
('a5', 'SPORT BOTTLE', ' A convenient and portable water bottle for sports enthusiasts', 10.00, 11, 'images/sportBottle.png', '2023-05-30 04:53:29');


INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `zip_code`, `phone_number`, `email`, `password`, `created_at`, `isStaff`) VALUES
(1, 'Lorik', 'Ramosaj', 'Atdhe Ramosaj s.t', 'Decan', NULL, 'Kosove', '50000', NULL, 'lorikramosaj@gmail.com', '$2y$10$Umqzl3miLG9WqwwhiXnmDOtij5feNl9/61g9fCUgbouTHhMCFOx0K', '2023-05-28 13:39:08', 'no'),
(2, 'Aurite', 'Bytyci', 'Uke Bytyci s.t', 'Therande', NULL, 'Kosove', '23000', NULL, 'auritebytyci@gmail.com', '$2y$10$Umqzl3miLG9WqwwhiXnmDOtij5feNl9/61g9fCUgbouTHhMCFOx0K', '2023-05-28 13:40:32', 'no'),
(5, 'Aurite', 'Bytyci', 'Rruga 123', 'Suhareke', NULL, 'Kosovo', '23000', '+38349179031', 'auritabytyci@gmail.com', '$2y$10$/7uyK1U81zHXReKf/.xIyeRI5dt8jsXMNfUce/YhLrxFeTmcAnBRK', '2023-05-28 21:18:58', 'yes'),
(6, 'Aurite', 'Bytyci', 'Rruga 123', 'Suhareke', NULL, 'Kosovo', '23000', '+38349179031', 'auritabytyqi@gmail.com', '$2y$10$if5nDN2hoS2GzkY0oczvy.t/At3kh6ADvFWUHw4.aGDH.6j4aUGYG', '2023-05-28 21:19:44', 'no'),
(7, 'Aurite', 'Bytyci', 'Rruga 123', 'Suhareke', NULL, 'Kosovo', '23000', '+38349179031', 'rita@gmail.com', '$2y$10$5g2YpTJhMZzrH4.CKAez7utfHMVXWqiBKlowaSMiz4z1oAzSKBtAi', '2023-05-29 19:01:47', NULL),
(8, 'Aurite', 'Bytyci', 'Rruga 123', 'Suhareke', NULL, 'Kosovo', '23000', '+38349179031', 'rita2@gmail.com', '$2y$10$vU0Qp6opA2FpkVe4rtKQ/evO9JZ6XS2nL./sOyyB4HtEPGc5m.PlK', '2023-05-30 09:58:38', NULL),
(9, 'Aurite', 'Bytyci', 'Rruga 123', 'Suhareke', NULL, 'Kosovo', '23000', '+38349179031', 'rita3@gmail.com', '$2y$10$gRry.6Kag2vUlIuSe6KrGOLCvGW8v1OtevAU/qCDV3SbOPHqsOCRi', '2023-05-30 14:52:09', NULL),
(10, 'Aurite', 'Bytyci', 'Rruga 123', 'Suhareke', NULL, 'Kosovo', '23000', '+38349179031', 'ritaa@gmail.com', '$2y$10$QCh325gosO/zt3UAIOZ2AetncFsn.o8FQBUqc6itwMr99T80QBNzi', '2023-05-30 15:34:29', NULL);

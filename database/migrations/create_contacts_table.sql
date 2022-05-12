CREATE TABLE `contacts` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `last_name` varchar(20) NOT NULL,
    `first_name` varchar(20),
    `street` varchar(30),
    `zip` varchar(10),
    `city` varchar(30),
    `phone_number` varchar(30),
    `created_at` timestamp,
    `updated_at` timestamp,
    PRIMARY KEY (`id`)
);

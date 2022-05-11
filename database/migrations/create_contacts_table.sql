CREATE TABLE `contacts` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `last_name` varchar(255) NOT NULL,
    `first_name` varchar(255),
    `street` varchar(255),
    `zip` varchar(255),
    `city` varchar(255),
    `phone_number` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp,
    PRIMARY KEY (`id`)
);

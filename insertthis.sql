-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2017 at 03:02 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `WebLab`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `review_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 2, 'Evan Enke', 'evanenke@gmail.com', 'Wow cool place!', '2017-03-17 13:57:29'),
(2, 2, 'Jan Doe', 'jane@yahoo.com', 'Thank you for this awesome review', '2017-03-17 14:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 0, '1 Star', '2017-03-04 13:03:18'),
(2, 0, '2 Stars', '2017-03-04 14:14:22'),
(3, 0, '3 Stars', '2017-03-04 13:14:19'),
(4, 0, '4 Stars', '2017-03-04 13:14:40'),
(5, 0, '5 Stars', '2017-03-04 14:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `review_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating_id`, `user_id`, `title`, `slug`, `body`, `review_image`, `created_at`) VALUES
(1, 5, 1, 'San Diego, CA', 'example-1', '<p>Drinking vinegar offal locavore, gluten-free knausgaard crucifix kinfolk swag pok pok tumeric. Jean shorts literally poutine, everyday carry semiotics forage affogato. Woke ugh etsy synth. Dreamcatcher cray cloud bread venmo. Vape echo park health goth humblebrag offal vegan.</p>\r\n', 'sandiego.jpg', '2017-03-17 13:22:28'),
(2, 1, 1, 'Alfred, NY', 'alfred-example', '<p>La croix fingerstache ethical mumblecore, semiotics fam stumptown coloring book vaporware artisan crucifix XOXO franzen subway tile. Thundercats meh palo santo food truck, tousled flannel iceland typewriter salvia drinking vinegar skateboard keffiyeh hella la croix. Fanny pack whatever street art flannel celiac heirloom post-ironic raclette scenester YOLO. Sustainable kogi four dollar toast man braid. Jean shorts meh marfa quinoa succulents la croix stumptown crucifix wolf four loko blue bottle pug iceland salvia chia. Polaroid humblebrag tousled, fixie letterpress mustache tote bag activated charcoal chillwave YOLO air plant gentrify.</p>\r\n', 'alfred.jpg', '2017-03-17 13:23:23'),
(7, 4, 3, 'Rome, Italy', 'Rome-Italy', '<p>Tumblr aesthetic fashion axe kickstarter single-origin coffee stumptown blue bottle, forage literally vinyl YOLO prism tofu bushwick pug. Listicle hashtag mixtape leggings. Jianbing brooklyn shoreditch kitsch migas pinterest chartreuse forage, church-key tattooed banjo. Hammock chambray yuccie chillwave, unicorn bitters distillery.</p>\r\n', 'rome.jpg', '2017-12-08 16:59:49'),
(8, 4, 3, 'Cancun, Mexico', 'Cancun-Mexico', '<p>Green juice kickstarter la croix selfies, food truck PBR&amp;B semiotics swag etsy gentrify typewriter seitan artisan DIY gochujang. Tattooed cray helvetica stumptown. Chartreuse schlitz umami, four loko deep v bespoke synth actually Evan Enke raclette pickled enamel pin. Venmo tumeric squid fanny pack copper mug. Street art venmo ennui kogi organic.</p>\r\n', 'mexico.jpg', '2017-12-08 18:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Brad Traversy', '01913', 'brad@gmail.com', 'brad', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-10 13:14:31'),
(2, 'John Doe', '90210', 'jdoe@gmail.com', 'john', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-10 14:12:14'),
(3, 'apples', 'apples', 'apples@apples.com', 'apples', 'daeccf0ad3c1fc8c8015205c332f5b42', '2017-12-08 13:25:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
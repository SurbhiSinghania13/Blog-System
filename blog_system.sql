-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 26, 2024 at 08:00 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `user_id`, `title`, `image_url`, `content`, `post_date`) VALUES
(1, 1, 'Doodle Art', 'doodleimage.jpeg', 'Doodle art, characterized by spontaneous and free-flowing sketches, is a whimsical form of creative expression. Often born from idle moments, these simple yet charming drawings showcase the beauty of untethered imagination. Doodle art transcends perfection, allowing for the joy of creating without constraints. From intricate patterns to quirky characters, each doodle tells a unique story, turning blank spaces into canvases of spontaneous creativity. It\'s a delightful journey where the pen dances on paper, giving life to unexpected shapes and whimsical designs. Doodle art is a celebration of the playful and the unplanned, turning ordinary moments into bursts of creative inspiration.', '2024-02-26 19:35:17'),
(2, 2, 'Home Decor', 'homedecor.jpeg', 'Home decor is the art of transforming living spaces into personalized and inviting sanctuaries that reflect individual tastes and style. It goes beyond mere aesthetics, encompassing a thoughtful curation of furnishings, colors, textures, and accessories to create a harmonious and comfortable environment.\r\n\r\n', '2024-02-26 19:29:24'),
(5, 2, 'Mandal Art', 'mandala.jpeg', 'Mandala art, derived from the ancient Indian language of Sanskrit, translates to \"circle\" or \"discoid object.\" It is a form of geometric, spiritual, and ritualistic art that has been practiced across various cultures and religions for centuries. Mandala art typically consists of a circular design with intricate patterns radiating from the center.', '2024-02-26 19:28:53'),
(6, 2, 'Diary Writing', 'diary.jpeg', 'Diary writing is a personal journey captured on the pages of a journal. It transcends mere documentation, serving as a canvas for emotions, thoughts, and reflections. In the intimate space of a diary, one can unveil the innermost layers of their soul, navigating the realms of joy, sorrow, and self-discovery. It\'s a conversation with oneself, an act of self-expression that provides solace, clarity, and a timeless record of the ever-evolving narrative of one\'s life.', '2024-02-26 19:30:15'),
(7, 1, 'Madhubani Painting', 'madhubani.jpeg', 'Madhubani painting, originating from the Mithila region of India, is a vibrant and traditional art form that tells stories through intricate and colorful designs. Known for its rich cultural heritage, Madhubani art often features geometric patterns, nature, and mythological motifs, creating visually stunning masterpieces. This ancient technique, passed down through generations, continues to captivate art enthusiasts worldwide with its unique blend of history, culture, and aesthetic brilliance.', '2024-02-26 19:32:07'),
(8, 1, 'Rajasthani Folk Dance', 'rajasthani.jpeg', 'Rajasthani folk dance, a vibrant tapestry of tradition and culture, reflects the spirit of Rajasthan, India. With rhythmic movements, vibrant costumes, and lively music, these dances encapsulate the rich heritage of the desert state. From the energetic Ghoomar, where women twirl gracefully, to the dynamic Kalbelia, inspired by snake movements, each performance is a captivating journey into Rajasthan\'s colorful history and artistic expression. Rajasthani folk dances, with their exuberance and cultural resonance, continue to enchant audiences worldwide.', '2024-02-26 19:33:08'),
(9, 2, 'Glass Painting', 'glass.jpeg', 'Glass painting is a captivating art form that transforms ordinary glass surfaces into vibrant, visually stunning masterpieces. Artists use a combination of specialized paints and brushes to create intricate designs, patterns, or scenes on glass. This unique craft adds a touch of elegance to windows, glassware, or even decorative pieces, making them come alive with color and creativity. Glass painting offers a versatile and accessible way for artists and enthusiasts alike to explore their imagination and bring a translucent canvas to life with a spectrum of hues.', '2024-02-26 19:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `insta_url` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `insta_url`, `profile_picture`) VALUES
(1, 'surbhisinghania', 'surbhi@gmail.com', 'password', 'instagram.com/singhaniasurbhi', 'surbhipicture.jpeg'),
(2, 'dishapawar', 'disha@gmail.com', 'password', 'instagram.com/pawardisha', 'dishapicture.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 03:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidsstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_role` varchar(30) NOT NULL DEFAULT 'admin',
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_password`, `admin_email`, `admin_role`, `admin_image`) VALUES
(24, 'mohammad', 'moh123', 'moh@gmail.com', 'superadmin', 'images/admin_images/noimage.jpg'),
(29, 'maria', 'maria123', 'maria@gmail.com', 'admin', 'images/admin_images/noimage.jpg'),
(30, 'firas', 'firas123', 'firas@gmail.com', 'admin', 'images/admin_images/noimage.jpg'),
(31, 'lana', 'lana123', 'lana@gmail.com', 'admin', 'images/admin_images/noimage.jpg'),
(32, 'roaa', 'roaa123', 'roaa@gmail.com', 'admin', 'images/admin_images/noimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_image`, `created_at`, `updated_at`) VALUES
(12, 'Educational Wooden Toys ', 'images/cat_images/Shape Sorting box.jpg', '2020-12-04 12:02:54', '2020-12-04 12:02:54'),
(13, 'Montessori Materials ', 'images/cat_images/Shapes Small Truck.jpg', '2020-12-04 12:03:37', '2020-12-04 12:03:37'),
(14, 'Arabic Learning Recourses  ', 'images/cat_images/Building Arabic words set.jpg', '2020-12-04 12:04:24', '2020-12-04 12:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(5) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_password` varchar(32) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_password`, `cust_email`, `cust_phone`, `cust_address`, `cust_image`, `created_at`, `updated_at`) VALUES
(13, ' user1', 'user123', 'user1@gmail.com', ' 077777777', ' Amman , Jordan', 'images/admin_images/noimage.jpg', '2020-12-03 21:58:48', '2020-12-03 21:58:48'),
(16, 'user2', 'user123', 'user2@gmail.com', '07777777778', 'Amman , Jordan', 'images/admin_images/noimage.jpg', '2020-12-04 02:00:03', '2020-12-04 02:00:03'),
(17, 'taha', 'taha123', 'taha@gmail.com', '0777777775', ' amman', 'images/admin_images/noimage.jpg', '2020-12-05 17:36:56', '2020-12-05 17:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_address` varchar(100) NOT NULL,
  `order_country` varchar(50) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `order_address`, `order_country`, `postal_code`, `order_total`, `created_at`, `updated_at`) VALUES
(27, 13, 'Amman , Jordan', 'Jordan', 'fdsfdsf', 53.00, '2020-12-05 16:27:33', '2020-12-05 16:27:33'),
(28, 13, 'Amman , Jordan', 'Jordan', 'Qw23w4', 41.00, '2020-12-05 16:28:38', '2020-12-05 16:28:38'),
(29, 13, 'Amman , Jordan', 'Jordan', 'Qw23w4', 41.00, '2020-12-05 16:30:08', '2020-12-05 16:30:08'),
(30, 13, 'Amman , Jordan', 'Jordan', '11131', 41.00, '2020-12-05 16:31:43', '2020-12-05 16:31:43'),
(31, 13, 'Amman , Jordan', 'Jordan', 'Qw23w4', 41.00, '2020-12-05 16:36:09', '2020-12-05 16:36:09'),
(32, 17, ' amman', 'Jordan', 'Qw23w4', 113.00, '2020-12-05 17:44:09', '2020-12-05 17:44:09'),
(33, 13, 'Amman , Jordan', 'Jordan', '11131', 100.00, '2020-12-05 19:46:02', '2020-12-05 19:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_det_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_det_id`, `order_id`, `pro_id`, `qty`, `created_at`, `updated_at`) VALUES
(13, 13, 27, 1, '2020-12-05 16:36:09', '2020-12-05 16:36:09'),
(14, 13, 28, 3, '2020-12-05 16:36:09', '2020-12-05 16:36:09'),
(15, 13, 24, 1, '2020-12-05 16:36:09', '2020-12-05 16:36:09'),
(16, 13, 27, 1, '2020-12-05 16:39:14', '2020-12-05 16:39:14'),
(17, 13, 28, 3, '2020-12-05 16:39:14', '2020-12-05 16:39:14'),
(18, 13, 24, 1, '2020-12-05 16:39:14', '2020-12-05 16:39:14'),
(19, 17, 27, 3, '2020-12-05 17:44:09', '2020-12-05 17:44:09'),
(20, 17, 20, 2, '2020-12-05 17:44:09', '2020-12-05 17:44:09'),
(21, 17, 22, 4, '2020-12-05 17:44:09', '2020-12-05 17:44:09'),
(24, 34, 22, 0, '2020-12-05 19:48:20', '2020-12-05 19:48:20'),
(25, 34, 24, 0, '2020-12-05 19:48:20', '2020-12-05 19:48:20'),
(26, 35, 22, 3, '2020-12-05 19:51:13', '2020-12-05 19:51:13'),
(27, 35, 21, 2, '2020-12-05 19:51:13', '2020-12-05 19:51:13'),
(28, 36, 21, 2, '2020-12-05 22:04:18', '2020-12-05 22:04:18'),
(29, 36, 22, 3, '2020-12-05 22:04:18', '2020-12-05 22:04:18'),
(30, 37, 26, 2, '2020-12-05 22:32:15', '2020-12-05 22:32:15'),
(31, 37, 27, 3, '2020-12-05 22:32:15', '2020-12-05 22:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_image` text NOT NULL,
  `pro_price` float(10,2) NOT NULL,
  `special_price` float(10,2) DEFAULT NULL,
  `pro_tags` varchar(255) NOT NULL,
  `pro_feature` varchar(10) NOT NULL,
  `pro_filter` varchar(50) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_description`, `pro_image`, `pro_price`, `special_price`, `pro_tags`, `pro_feature`, `pro_filter`, `cat_id`, `created_at`, `updated_at`) VALUES
(20, 'Screw Heads - Style (A)', 'These wooden animals help strengthen a childs finemotors pormoting bodily  kinesthetic intelligence.The child tries to fasten the head to the correct body colour to get the finished result of the animal. It is also possible to mix the bodies and heads to form new animals making it an entertaining toy for young children. Available in two shapes. Made of high quality natural wood with non toxic paints conforming to European toy safety standards.', 'images/product_images/Shape Sorting box.webp', 7.00, 6.00, 'tag1', '', '', 12, '2020-12-04 12:40:20', '2020-12-04 12:40:20'),
(21, 'Screw Heads - Style (B)', 'These wooden animals help strengthen a childs finemotors pormoting bodily kinesthetic intelligence.The child tries to fasten the head to the correct body colour to get the finished result of the animal. It is also possible to mix the bodies and heads to form new animals making it an entertaining toy for young children. Available in two shapes. Made of high quality natural wood with non toxic paints conforming to European toy safety standards.', 'images/product_images/Screw Heads - Style (B).jpg', 7.00, 6.00, 'tag', '', '', 12, '2020-12-04 13:11:17', '2020-12-04 13:11:17'),
(22, 'Shape Sorting box', 'Helps the children to recognize shapes and colors. The children try to fit each shape into the matching space in the box which help enhance logical mathematical intelligence.It also Improves hand/eye coordination pormoting bodily kinesthetic intelligence.ten different piceses repesnting shapes, animals and transportation enriching childrens vocabulary and helping in developing Linguistic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Shape Sorting box.jpg', 25.00, 20.00, 'tag', '', '', 12, '2020-12-04 13:13:03', '2020-12-04 13:13:03'),
(24, 'Funny Shapes Board', 'Children will discover the smiling faces when they remove the colorful geometrical shapes. Large knobs enable easy manipulation by small hands. Improves the childs fine finger movement and hand-eye coordination helping bodily / kinesthetic intelligence to be improved. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Funny Shapes Board.jpg', 18.00, 10.00, 'tag', '', '', 12, '2020-12-04 13:19:29', '2020-12-04 13:19:29'),
(25, 'Shapes Small Truck', 'Sorting shapes into their corresponding slots teaches children the recognition of shapes and colors which help them develop developlogical / mathematical intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Shapes Small Truck.jpg', 21.00, 16.00, 'tag', '', '', 12, '2020-12-04 13:21:40', '2020-12-04 13:21:40'),
(26, 'Stacking Rings Snail', 'Stacking game to place differently sized rings onto snail base in either large to small or small to large orderstimulating logical/ mathematical intelligence. New words like bigger than / smaller than, etc. are learned while playing with this toy promoting Linguistic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Stacking Rings Snail.jpg', 9.00, 7.00, 'tag', '', '', 12, '2020-12-04 13:23:49', '2020-12-04 13:23:49'),
(27, 'Surprise Window Circles', 'A delightful and attractive toy for children that will surprise them !Colourful shapes and picture apear as they lift the covers which encourage them to learn new words helping Linguistic intelligence to be promoted. Available in two themes (colors / shapes). Improves the child\'s fine finger movement and hand-eye coordination which enhances bodily / kinesthetic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards. t\'est. \r\n\r\n', 'images/product_images/Surprise Window Circles.jpg', 8.00, 7.00, 'tag', '', '', 12, '2020-12-04 13:33:40', '2020-12-04 13:33:40'),
(28, 'The Wobbly Kid', 'Teach your child to differentiate between the biggest and smallest size by building up our wobbly kid. Basic math, counting and size concepts are learned while playing developing logical/mathematical intelligence. It consists of a base with central rod, five rings and a round ball. The small size of this wobbly made it ideal for little children. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/The Wobbly Kid.jpg', 10.00, 8.00, 'tag', '', '', 12, '2020-12-04 13:35:45', '2020-12-04 13:35:45'),
(29, 'The Wobbly Man', 'Teach your child to differentiate between the biggest and smallest size by building up our wobbly man. Basic math, counting and size concepts are learned while playing developing logical/mathematical intelligence. It consists of a base with central rod, eight rings and a round ball. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/The Wobbly Man.jpg', 15.00, 10.00, 'tag', '', '', 12, '2020-12-04 13:37:01', '2020-12-04 13:37:01'),
(30, 'Toddler Tracking Board', 'Fine motor skills are developed as Little children will move the knob to trace differently shaped lines following the directions of the arrows. A simple but important toy to develop pre-writing and motor-memory skills as a step in enhancing bodily/kinesthetic intelligence. Made of high quality natural wood with non-toxic paints. conforming to European toy safety standards.', 'images/product_images/Toddler Tracking Board.jpg', 16.00, 11.00, 'tag', '', '', 12, '2020-12-04 13:38:59', '2020-12-04 13:38:59'),
(31, 'Toddler Tracking Board - Lev 3', 'Fine motor skills are developed as Little children will move the knob to trace differently shaped lines following the directions of the arrows. A simple but important toy to develop pre-writing and motor-memory skills as a step in enhancing bodily/kinesthetic intelligence. Made of high quality natural wood with non-toxic paints. conforming to European toy safety standards.', 'images/product_images/Toddler Tracking Board3.jpg', 16.00, 11.00, 'tag', '', '', 12, '2020-12-04 13:40:10', '2020-12-04 13:40:10'),
(32, 'Follow The Fish', 'As the fish is moved along the various paths, the child develops fine muscle control which develops Bodily/Kinesthetic Intelligence. Problem solving & thinking skills are developed while trying to imitate the patterns . that promotes Logical/Mathematical Intelligence. 12 Patterns are provided as guides. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards .', 'images/product_images/Follow The Fish.jpg', 22.00, 22.00, 'tag', '', '', 12, '2020-12-04 13:44:37', '2020-12-04 13:44:37'),
(33, 'Stacking Shape Tower', '7 colored shapes which a child tries to collect and arrange logically until he/she completes the tower. There a pyramid wooden top to give the tower a distinguished look. Helps the child to recognize shapes, differentiate between colors and develops fine muscle movement.', 'images/product_images/Stacking Shape Tower.jpg', 13.00, 10.00, 'tag', '', '', 12, '2020-12-04 13:48:32', '2020-12-04 13:48:32'),
(34, 'Building Up Body Parts Puzzles (Boy)/3 layers', 'Colorful designed three layered puzzles which begin with a naked body, then body parts and underwear base and finally a fully dressed boy or girl. Teaches body parts and clothing items to develop linguistic and logical intelligences. The product is available with or without the naked body. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Building Up Body Parts Puzzles (Boy)3 layers.jpg', 13.00, 13.00, 'tag', '', '', 12, '2020-12-04 13:52:07', '2020-12-04 13:52:07'),
(35, 'Colored Big Blocks', 'Beautiful building blocks made from natural beech wood. All blocks well finished in a multitude of different shapes and sizes. These blocks will stand years of hard use. The unit block system makes it easy for children to understand size relations and develop skills through block play. Cooperative play is developed and children will amaze themselves with their imaginative construction.', 'images/product_images/Colored Big Blocks.jpg', 50.00, 45.00, 'tag', '', '', 12, '2020-12-04 13:53:26', '2020-12-04 13:53:26'),
(36, 'Counting Abacus', 'This traditional abacus consists of 10 differently coloured rows of wooden beads, to introduce the basic concept of counting, addition and subtraction.\r\nMade of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Counting Abacus.jpg', 14.00, 10.00, 'tag', '', '', 12, '2020-12-04 13:54:22', '2020-12-04 13:54:22'),
(37, 'Geometrical Peg Grading Board', 'Ideal educational toy which promotes logical/mathematical intelligences by teaching children multiple concepts (shapes, height and color) through fun. Children will stack the wooden pieces in the appropriate place on the sturdy wooden base developing hand-eye coordination and small motor skills enhancing bodily/kinesthetic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Geometrical Peg Grading Board.jpg', 20.00, 20.00, 'tag', '', '', 12, '2020-12-04 13:55:22', '2020-12-04 13:55:22'),
(38, 'Insert Boards/Vegetables', 'Inset cut-out shapes in a wooden base promote shape recognition. Puzzles include: vegetables, fruit, mealtime, wild animals and farm animals.', 'images/product_images/Insert BoardsVegetables.jpg', 8.00, 8.00, 'tag', '', '', 12, '2020-12-04 13:57:19', '2020-12-04 13:57:19'),
(39, 'Pre-Writing Board Set', 'A set of 4 pre-writing tracing boards with a wooden pencil for endless numbers of practice. It helpes children learn how to hold a pen and practice their first lines. Develop pre-writing and motor-memory skills that will be needed later in writing skills, enhancing bodily/kinesthetic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Pre-Writing Board Set.jpg', 23.00, 19.99, 'tag', '', '', 12, '2020-12-04 14:05:14', '2020-12-04 14:05:14'),
(40, 'Fairy Tales - Pinocchio', 'A series of wooden puzzles telling world famous stories. Made in a new shape which consists of a pattern, wooden base and stand. The child arranges the wooden pieces to match the pattern. This builds up the childs power of expression and logical thinking. Available in 4 themes – Pinocchio, Goldilocks and the three bears, Hansel and Gretel and Little Red Riding Hood.', 'images/product_images/Fairy Tales - Pinocchio.jpg', 20.50, 10.00, 'tag', '', '', 14, '2020-12-04 14:08:42', '2020-12-04 14:08:42'),
(41, 'Coloured Discs On Coloured Dowels', 'These materials focus on hand-eye co-ordination and manipulative skills. It also helps the child to practice with different finger grasps based on the shape of the object.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Coloured Discs On Coloured Dowels.jpg', 8.50, 7.00, 'tag', '', '', 13, '2020-12-04 14:10:16', '2020-12-04 14:10:16'),
(42, 'Cylinder Blocks 4', 'This is one piece of a set of 4 blocks with cylinders varying in height and/or diameter in each block. This product has cylinders graduated from bigger to smaller in diameter but the height is fixed. Ideal for developing the child\'s visual discrimination of size.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Cylinder Blocks 4.jpg', 40.00, 20.00, 'tag', '', '', 13, '2020-12-04 14:12:08', '2020-12-04 14:12:08'),
(43, ' Dressing Frames Stand', 'Dressing Frame Stand For 12 Frames. It was designed to take minimum floor space and at the same time can be easy for children to access. Made of high quality natural wood. Sold without the frames.', 'images/product_images/Dressing Frames Stand.jpg', 50.00, 48.50, 'tag', '', '', 13, '2020-12-04 14:13:49', '2020-12-04 14:13:49'),
(44, 'Hundred Board With Wooden Tiles', 'Wooden board divided to 100 squares, with wooden tiles with printed numbers on it from 1 -100. Comes with wooden box for tiles storage. Made of high quality natural wood.', 'images/product_images/Hundred Board with Wooden Tiles.jpg', 28.99, 18.00, 'tag', '', '', 13, '2020-12-04 14:14:59', '2020-12-04 14:14:59'),
(45, 'Imbucare Box With Large Cylinder', 'This materials provide an infant with the possibility of fitting objects into holes which is a natural inclination for young children. This activity gives the child practice with hand-eye co-ordination as the shape is put through the hole. The shape is then easily retrieved from the front of the box to repeat the activity over and over.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Imbucare Box With Large Cylinder.jpg', 22.00, 22.00, 'tag', '', '', 13, '2020-12-04 14:16:07', '2020-12-04 14:16:07'),
(46, 'Imbucare Box With Rectangular Prism', 'This materials provide an infant with the possibility of fitting objects into holes which is a natural inclination for young children. This activity gives the child practice with hand-eye co-ordination as the shape is put through the hole. The shape is then easily retrieved from the front of the box to repeat the activity over and over.Made of high quality natural wood.', 'images/product_images/Imbucare Box With Rectangular Prism.jpg', 22.00, 22.00, 'tag', '', '', 13, '2020-12-04 14:16:56', '2020-12-04 14:16:56'),
(47, 'Infants Cylinder Block 1', 'This is one piece of our toddler set of 4 blocks with cylinders varying in height and/or diameter in each block. This product has cylinders graduated from bigger to smaller in diameter and the height is fixed. Ideal to help develop the child\'s visual discrimination of size.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Infants Cylinder Block 1.jpg', 26.00, 20.00, 'tag', '', '', 13, '2020-12-04 14:17:43', '2020-12-04 14:17:43'),
(48, 'Infants Cylinder Block 2', 'This is one piece of our toddler set of 4 blocks with cylinders varying in height and/or diameter in each block. This product has cylinders graduated from bigger to smaller in diameter and the height is fixed. Ideal to help develop the child\'s visual discrimination of size.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Infants Cylinder Block 2.jpg', 26.00, 20.00, 'tag', '', '', 13, '2020-12-04 14:19:34', '2020-12-04 14:19:34'),
(49, 'Infants Cylinder Block 3', 'This is one piece of our toddler set of 4 blocks with cylinders varying in height and/or diameter in each block. This product has cylinders graduated from bigger to smaller in diameter and the height is fixed. Ideal to help develop the child\'s visual discrimination of size.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Infants Cylinder Block 3.jpg', 26.00, 20.00, 'tag', '', '', 13, '2020-12-04 14:20:19', '2020-12-04 14:20:19'),
(50, 'Knobbles Cylinder Model 4', 'Four boxes each with a set of 10 cylinders varying in height and/or diameter in each set. Each set is in a separate wooden box with the lid painted the same color as the cylinders - red, green, yellow and blue.This product has cylinders graduated from bigger to smaller in diameter and from shorter to taller in height. Ideal for developing the child\'s visual discrimination of size. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Knobbles Cylinder Model 4.jpg', 25.50, 25.50, 'tag', '', '', 13, '2020-12-04 14:21:05', '2020-12-04 14:21:05'),
(51, 'Multiple Shape Puzzle Set', 'Two wooden boards with large knob to be easy for little ones to hold. Circle, triangle and a square in one board, and the other board has 3 sizes of a circle.Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Multiple Shape Puzzle Set.jpg', 35.00, 5.00, 'tag', '', '', 13, '2020-12-04 14:22:05', '2020-12-04 14:22:05'),
(52, 'Number Rods', 'Ten rods identical with the Red Rods in length, but divided into in an alternating red and blue pattern. They are varying in length from 10 centimeters to 1 meter. Ideal for introducing children to quanitiy.', 'images/product_images/Number Rods.jpg', 52.50, 49.00, 'tag', '', '', 13, '2020-12-04 14:23:15', '2020-12-04 14:23:15'),
(53, 'Numbers and Counters', 'This Montessori material is used to help children understand the relation between symbol and quantity. 55 red wooden counters and 10 wooden cards with numbers printed on it from 1 -10. Comes in a wooden box. .Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Numbers and Counters.jpg', 36.60, 35.20, 'tag', '', '', 13, '2020-12-04 14:24:45', '2020-12-04 14:24:45'),
(54, 'Small Numerals 1 - 9000', 'Set of small wooden tiles with printed numbers from 1-9000. It comes in different length and color according to the hierarches. Made of high quality natural wood.', 'images/product_images/Small Numerals 1  9000.jpg', 35.00, 31.10, 'tag', '', '', 13, '2020-12-04 14:25:39', '2020-12-04 14:25:39'),
(55, 'Wooden Hundred Square', 'This Montessori material can be used as an introduction for decimal system. Set of 45 silk-screened wooden squares in a wooden tray. Made of high quality natural wood.', 'images/product_images/Wooden Hundred Square.jpg', 50.00, 49.50, 'tag', '', '', 13, '2020-12-04 14:31:06', '2020-12-04 14:31:06'),
(57, 'Dressing Frames Small', 'Dressing Frame Stand For 6 Frames. The small size of this frame is ideal for handy and tidy storage. Children also can easily access it. Made of high quality natural wood.Sold without the frames.', 'images/product_images/Dressing Frames Small.jpg', 30.50, 28.00, 'tag', '', '', 13, '2020-12-04 14:34:30', '2020-12-04 14:34:30'),
(58, 'lock board 1', 'These much loved practical life materials really engage children. They strengthen fine motor and hand muscles.', 'images/product_images/lock board 1.jpg', 47.00, 30.00, 'tag', '', '', 13, '2020-12-04 14:35:48', '2020-12-04 14:35:48'),
(59, 'Dish Washing Table', 'These set of 4 Wooden Trays are ideal for different of practical life activates. Each tray has handles on both sides to carry. They are also suitable for use in all areas of prepared environment.Made of high quality natural wood.', 'images/product_images/Dish Washing Table.jpg', 40.00, 15.00, 'tag', '', '', 13, '2020-12-04 14:37:45', '2020-12-04 14:37:45'),
(60, 'Bow Tying Frame', 'There are 12 different square shaped frames from which you can choose. Each frame is made of wood. Attached to it, a rectangular piece of fabric with varied designs. These fabrics can be joined in the middle by different closures commonly found on closing, shoes and other items. These dressing frames help little ones learn how to manipulate different practical life skills. The frames offered are: Snapping Frame, Safety Pin Frame, Buckling Frame, Hook and eye Frame, zipping frame, small buttons frame, big buttons frame, Clips frame, Velcro frame, Bow Tying Frame, lacing frame and shoe lacing frame.', 'images/product_images/Bow Tying Frame.jpg', 9.00, 8.99, 'tag', '', '', 13, '2020-12-04 14:40:17', '2020-12-04 14:40:17'),
(61, 'A B C Clown Arabic', 'A fun way to learn the English alphabet and numbers from 1 to 10. Each letter has a corresponding picture. Children will love to turn the blocks over to see the picture. It helps to exposure children to letters & numbers from early years which is a good base for Linguistic intelligence.', 'images/product_images/A B C Clown Arabic.jpg', 15.00, 5.00, 'tag', '', '', 14, '2020-12-04 14:42:18', '2020-12-04 14:42:18'),
(62, 'Spell - A - Word', 'The child fits pieces together to spell words which help in promoting the linguistic intelligence. It contains 10 pictures divided to 3to 6 pieces. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Spell - A - Word.jpg', 25.00, 21.55, 'tag', '', '', 14, '2020-12-04 14:44:32', '2020-12-04 14:44:32'),
(63, 'Movable Arabic letters', 'A set of wooden movable alphabet that come in a sturdy wooden box with lid. The box is divided into components containing wooden Laser cut out letters. The set includes blue Arabic letters with the different formation of it according to their position in the word. Tashkeel (diacritics) are available in red. All pieces are coloured only on one side.', 'images/product_images/Movable Arabic letters.jpg', 30.00, 5.00, 'tag', '', '', 14, '2020-12-04 14:45:39', '2020-12-04 14:45:39'),
(64, 'Number Board', 'With these colorful wooden numbers children become familiar with numerals and their shapes. They can be used as a guide for writing or even to make larger numbers. When children use these puzzles from young age, many skills are developed which reinforce Logical/mathematical intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Number Board.jpg', 37.50, 3.25, 'tag', '', '', 14, '2020-12-04 14:46:49', '2020-12-04 14:46:49'),
(65, 'Play & Learn Alphabet', 'An interesting & attractive introduction to the alphabet in puzzle form. The colorful original drawings are matched to a piece indicating the first letter of the word itself. Self-correcting as incorrect answers do not fit together. Ideal for developing spatial and Linguistic intelligence.', 'images/product_images/Play & Learn Alphabet.jpg', 22.50, 19.00, 'tag', '', '', 14, '2020-12-04 14:47:37', '2020-12-04 14:47:37'),
(66, 'Trace me Arabic Numbers', 'When children have the opportunity to touch and feel the number shapes they are learning. With these carved wooden boards, children compare, contrast, and examine each number and mathematical symbols in a multisensory way. They pieces can be traced with their fingers or wooden pencil. This set includes 10 numbers and 5 symbols in a wooden storage box. A dot on the lower right corner of each plate indicates right side up. Children can also use tiles for mathematical exercises. Pre-writing skills are enhanced with this toy promoting Bodily/kinesthetic and Visual/Spatial intelligences to be developed.', 'images/product_images/Trace me Arabic Numbers.jpg', 19.50, 8.00, 'tag', '', '', 14, '2020-12-04 14:51:24', '2020-12-04 14:51:24'),
(67, 'Play & Learn 1 2 3', 'Learn numbers from 1 - 10. Pictures are placed with corresponding numbers. Puzzles fit together only if placed correctly. It develops children ability to recognize numbers from early years which is a good base for Logical/mathematical intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards', 'images/product_images/Play & Learn 1 2 3.jpg', 12.50, 10.00, 'tag', '', '', 14, '2020-12-04 14:52:27', '2020-12-04 14:52:27'),
(68, 'Magnetic Arabic Alphabet', 'We are proud to present to you Magnetic Arabic Letters. This product is one of our most important contributions in the field of Arabic language teaching. All 170 forms are coloured the same making learner distinguish them according to their form (shape) only. The dots and hamza (glottal stop) are separate to give freedom in making words. The punctuation marks and composition are given different colours for distinguishing from the letters. It enables the learner to form words and sentences with the help of the 24 cards provided. The cards are divided into three levels (simple words - simple sentences from two words - sentences with more than two words). It is ideal for developing the Spatial and Linguistic intelligence. 325 Pieces + 24 cards + wooden storage unit', 'images/product_images/Magnetic Arabic Alphabet.jpg', 60.00, 55.00, 'tag', '', '', 14, '2020-12-04 14:53:50', '2020-12-04 14:53:50'),
(69, 'Letter Puzzle Turtle', 'It has been agreed about the importance of a child being taught the basic alphabet letters before entering school. We have produced an educational toy which is both exciting and attractive. Formed in the shape of animals which are loved by children, who arrange the letters in order in an animal‘s shape helping promting spatial and Linguistic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Letter Puzzle Turtle.jpg', 17.00, 14.00, 'tag', '', '', 14, '2020-12-04 14:55:02', '2020-12-04 14:55:02'),
(70, 'Letter Puzzle Fish', 'It has been agreed about the importance of a child being taught the basic alphabet letters before entering school. We have produced an educational toy which is both exciting and attractive. Formed in the shape of animals which are loved by children, who arrange the letters in order in an animal‘s shape helping promting spatial and Linguistic intelligence. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Letter Puzzle Fish.jpg', 17.00, 14.00, 'tag', '', '', 14, '2020-12-04 14:56:53', '2020-12-04 14:56:53'),
(71, 'Trace me Arabic letters', 'When children have the opportunity to touch and feel the lettered shapes they are learning. With these carved wooden boards, children compare, contrast, and examine each letter in a multisensory way. They can trace them with their fingers or wooden pencil. Set includes twenty-eight letters in wooden storage box. A dot on the lower right corner of each plate indicates right side up. Letters can also be used as tiles for word exercises. Pre-writing skills are enhanced with this toy helping Bodily/kinesthetic and Visual/Spatial intelligences to be developed.', 'images/product_images/Trace me Arabic letters.jpg', 30.00, 25.00, 'tag', '', '', 14, '2020-12-04 15:00:44', '2020-12-04 15:00:44'),
(72, 'Arabic Alphabet blocks', 'Arabic Alphabet Blocks helps learners to learn Arabic in a fun and easy way. It offers a creative solution for children to understand the uniqueness of the Arabic letters. Arabic letters change their shape according to their position in a word. The letter is printed in blue demonstrating this. Frequently used letters are represented in red and the green letters are the letters with hamza (glottal stop). Words and simple sentences can be created with these blocks. The accents placed above the letters are added with 20 small blocks to add higher educational value to this product. 12 Cards with different words and simple letters are available for children to form (12 cards).', 'images/product_images/Arabic Alphabet blocks.jpg', 13.00, 10.00, 'tag', '', '', 14, '2020-12-04 15:02:32', '2020-12-04 15:02:32'),
(73, 'Building Arabic words set', 'With our “Building Arabic words set” learning Arabic is no longer going to be a problem. All if the 107 letters are coloured in the same colour for the learner to distinguish between them according to their form (shape) only. The dots and hamza (glottal stop) are separated to give freedom in making words (38 pieces). For the first time the composition are added and given different colours to distinguish them from the letters (50 pieces). Its small size makes it perfect for home use and nurseries. Ideal for developing Spatial and Linguistic intelligence.', 'images/product_images/Building Arabic words set.jpg', 15.00, 12.00, 'tag', '', '', 14, '2020-12-04 15:07:04', '2020-12-04 15:07:04'),
(74, '1 to 10 Puzzle set', 'Each number has a corresponding number of pieces that are matched with the number of objects on the base. Help children to lean to count and differentiate numbers which develops logical/mathematic intelligence. 10 puzzles from (1- 10). Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/1 to 10 Puzzle set.jpg', 25.00, 15.00, 'tag', '', '', 14, '2020-12-04 15:08:59', '2020-12-04 15:08:59'),
(75, 'Alphabet Board', 'These puzzles help familiarize children with letters of the alphabet from a young age which develop linguistic intelligence. May be used to form simple words. Available in English capital lettes, English small letters and Arabic letters. Made of high quality natural wood with non-toxic paints conforming to European toy safety standards.', 'images/product_images/Alphabet Board.jpg', 10.00, 4.00, 'tag', '', '', 14, '2020-12-04 15:36:56', '2020-12-04 15:36:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_det_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

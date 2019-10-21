DROP DATABASE IF EXISTS pettit;
create database pettit;
use pettit;

GRANT ALL ON pettit.* TO test IDENTIFIED BY "1234";
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2019 at 05:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: pettit
--

-- --------------------------------------------------------

--
-- Table structure for table comments
--

CREATE TABLE comments (
  comment_id int(20) NOT NULL,
  user_id int(20) NOT NULL,
  date_posted timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  text_content text NOT NULL,
  parent_id int(20) NOT NULL,
  up_votes int(5) NOT NULL,
  down_votes int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table posts
--

CREATE TABLE posts (
  PostID int(20) NOT NULL,
  PostContent text NOT NULL,
  PostTopic varchar(255) NOT NULL,
  DatePosted timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PosterID int(20) NOT NULL,
  up_votes int(5) NOT NULL,
  down_votes int(5) NOT NULL,
  view int(4) NOT NULL,
  reply int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  FirstName varchar(20) NOT NULL,
  LastName varchar(20) NOT NULL,
  EmailAddress varchar(30) NOT NULL,
  Password varchar(40) NOT NULL
  -- UserName varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table comments
--
ALTER TABLE comments
  ADD PRIMARY KEY (comment_id),
  ADD KEY poster_id (user_id),
  ADD KEY parent_id (parent_id);

--
-- Indexes for table posts
--
ALTER TABLE posts
  ADD PRIMARY KEY (PostID),
  ADD KEY Poster (PosterID);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (EmailAddress);

--
-- Constraints for dumped tables
--

--
-- Constraints for table comments
--
-- ALTER TABLE comments
--   ADD CONSTRAINT parent_id FOREIGN KEY (parent_id) REFERENCES posts (PostID) ON DELETE NO ACTION ON UPDATE NO ACTION,
--   -- ADD CONSTRAINT poster_id FOREIGN KEY (user_id) REFERENCES users (ID) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --
-- -- Constraints for table posts
-- --
-- ALTER TABLE posts
--   ADD CONSTRAINT Poster FOREIGN KEY (PosterID) REFERENCES users (ID) ON DELETE NO ACTION ON UPDATE NO ACTION;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


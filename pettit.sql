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
-- Table structure for table users
--

CREATE TABLE users (
  FirstName varchar(20) NOT NULL,
  LastName varchar(20) NOT NULL,
  UserName varchar(20) NOT NULL,
  EmailAddress varchar(30) NOT NULL,
  Password varchar(40) NOT NULL,
  UserID int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (UserID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Insert Users */
-- Email: mavdayot1@gmail.com, Password: arthurdayot123
INSERT INTO users (FirstName,LastName,UserName,EmailAddress,Password) VALUES ("Arthur", "Dayot", "ArthurDayotUser", "mavdayot1@gmail.com", "c4d02dd998a88f75fc3454c9df3c2259");
-- Email: some@guy.com, Password: someguypassword
INSERT INTO users (FirstName,LastName,UserName,EmailAddress,Password) VALUES ("Some", "Guy", "SomeGuyUser", "some@guy.com", "e05daef516e00b085921d633af6f67ac");
-- Email: dogs@awesome.com, Password: dogsarecute
INSERT INTO users (FirstName,LastName,UserName,EmailAddress,Password) VALUES ("Dog", "Poster", "ilovedogs", "dogs@awesome.com", "fd99a4468ac366a2fede1cadad518a51");

-- --------------------------------------------------------

--
-- Table structure for table posts
--

CREATE TABLE posts (
  PostID int(20) NOT NULL AUTO_INCREMENT,
  PostContent text NOT NULL,
  PostTopic varchar(255) NOT NULL,
  DatePosted timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PosterID int(20) NOT NULL,
  up_votes int(5) NOT NULL,
  down_votes int(5) NOT NULL,
  view int(4) NOT NULL,
  reply int(4) NOT NULL,
  PRIMARY KEY (PostID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Insert Posts */
INSERT into posts (PostContent, PostTopic, DatePosted, PosterID, up_votes, down_votes, view, reply)
values ("Honestly I wish I had my own doggos. I currently live in a small room near my college and I wouldn't be able to support one at the moment.", "How do you guys feel with your own dogs right now?", "2019-10-3 15:36:33", 1, 10, 2, 52, 2);
INSERT into posts (PostContent, PostTopic, DatePosted, PosterID, up_votes, down_votes, view, reply)
values ("I personally love Welsh Corgis due to the animated Japanese show Cowboy Bebop.", "Favorite Dog Breeds", "2019-10-8 06:26:23", 2, 27, 5, 73, 2);
INSERT into posts (PostContent, PostTopic, DatePosted, PosterID, up_votes, down_votes, view, reply)
values ("I actually love cats", "I have a confession", "2019-10-11 08:46:37", 3, 4, 65, 101, 2);

-- --------------------------------------------------------

--
-- Table structure for table comments
--

CREATE TABLE comments (
  comment_id int(20) NOT NULL AUTO_INCREMENT,
  user_id int(20) NOT NULL,
  date_posted timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  text_content text NOT NULL,
  parent_id int(20) NOT NULL,
  up_votes int(5) NOT NULL,
  down_votes int(5) NOT NULL,
  PRIMARY KEY (comment_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Insert Comments */
INSERT into comments (user_id, date_posted, text_content, parent_id, up_votes, down_votes)
values (2, "2019-10-3 17:01:11", "Honestly it's great, my doggo is an amazing stress relievier", 1, 5, 0);
INSERT into comments (user_id, date_posted, text_content, parent_id, up_votes, down_votes)
values (3, "2019-10-3 19:49:47", "Amazing, I don't regret adopting", 1, 3, 0);
INSERT into comments (user_id, date_posted, text_content, parent_id, up_votes, down_votes)
values (1, "2019-10-8 08:12:27", "I really looove Alaskan Huskies, especialy super big ones", 2, 7, 1);
INSERT into comments (user_id, date_posted, text_content, parent_id, up_votes, down_votes)
values (3, "2019-10-8 10:52:39", "Chihuahuasare just super duper cute", 2, 6, 3);
INSERT into comments (user_id, date_posted, text_content, parent_id, up_votes, down_votes)
values (1, "2019-10-11 09:01:19", "I'm honestly disgusted", 3, 22, 0);
INSERT into comments (user_id, date_posted, text_content, parent_id, up_votes, down_votes)
values (2, "2019-10-11 09:14:37", "You should be banned from this site", 3, 20, 1);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table comments
--
ALTER TABLE comments
  -- ADD PRIMARY KEY (comment_id),
  ADD KEY poster_id (user_id),
  ADD KEY parent_id (parent_id);

--
-- Indexes for table posts
--
ALTER TABLE posts
  -- ADD PRIMARY KEY (PostID),
  ADD KEY Poster (PosterID);

--
-- Indexes for table users
--
-- ALTER TABLE users
--   ADD PRIMARY KEY (UserID);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT; */
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS; */
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION; */

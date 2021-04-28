SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_unique_id` int(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_admin` int(255) NOT NULL,
  `group_members` int(20) NOT NULL DEFAULT '1',
  `joinkey` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`group_id`, `group_unique_id`, `group_name`, `group_admin`, `group_members`, `joinkey`) VALUES
(1, 1001, 'Community', 1000, 1, '1010');

CREATE TABLE `group_members` (
  `grp_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `group_members` (`grp_id`, `member_id`) VALUES
(1001, 1000);

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.png',
  `status` varchar(255) NOT NULL,
  `activationcode` varchar(255) NOT NULL,
  `verify` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'lightblue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `activationcode`, `verify`, `theme`) VALUES
(1, 1000, 'Admin', '.', '19bcs@cuchd.in', '3bb777b6748b2fd3aca203d69d1e6dbe', 'default.png', 'Active now', '1000', 0, 'lightgreen');

ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

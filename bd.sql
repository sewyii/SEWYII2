-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 08 2011 г., 23:37
-- Версия сервера: 5.1.41
-- Версия PHP: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `muba2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_blog`
--

CREATE TABLE IF NOT EXISTS `sewyii_blog` (
  `blog_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_owner_id` int(11) unsigned NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_type` enum('personal','open','invite','close') DEFAULT 'personal',
  `blog_date_add` datetime NOT NULL,
  `blog_date_edit` datetime DEFAULT NULL,
  `blog_rating` float(9,3) NOT NULL DEFAULT '0.000',
  `blog_count_vote` int(11) unsigned NOT NULL DEFAULT '0',
  `blog_count_user` int(11) unsigned NOT NULL DEFAULT '0',
  `blog_limit_rating_topic` float(9,3) NOT NULL DEFAULT '0.000',
  `blog_url` varchar(200) DEFAULT NULL,
  `blog_avatar` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_owner_id` (`user_owner_id`),
  KEY `blog_type` (`blog_type`),
  KEY `blog_url` (`blog_url`),
  KEY `blog_title` (`blog_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `sewyii_blog`
--

INSERT INTO `sewyii_blog` (`blog_id`, `user_owner_id`, `blog_title`, `blog_description`, `blog_type`, `blog_date_add`, `blog_date_edit`, `blog_rating`, `blog_count_vote`, `blog_count_user`, `blog_limit_rating_topic`, `blog_url`, `blog_avatar`) VALUES
(1, 1, 'Blog by admin', 'This is your personal blog.', 'personal', '2011-08-28 00:00:00', NULL, 0.000, 0, 0, -1000.000, NULL, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_blog_user`
--

CREATE TABLE IF NOT EXISTS `sewyii_blog_user` (
  `blog_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `user_role` int(3) DEFAULT '1',
  UNIQUE KEY `blog_id_user_id_uniq` (`blog_id`,`user_id`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_blog_user`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_session`
--

CREATE TABLE IF NOT EXISTS `sewyii_session` (
  `session_key` varchar(32) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `session_ip_create` varchar(15) NOT NULL,
  `session_ip_last` varchar(15) NOT NULL,
  `session_date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_date_last` datetime NOT NULL,
  PRIMARY KEY (`session_key`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `session_date_last` (`session_date_last`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_session`
--

INSERT INTO `sewyii_session` (`session_key`, `user_id`, `session_ip_create`, `session_ip_last`, `session_date_create`, `session_date_last`) VALUES
('fb60e8b75c32cb1d25bef54757734320', 1, '127.0.0.1', '127.0.0.1', '2011-09-06 22:40:34', '2011-09-07 10:55:29');

-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_topic`
--

CREATE TABLE IF NOT EXISTS `sewyii_topic` (
  `topic_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `topic_type` enum('topic','link','question','photoset') NOT NULL DEFAULT 'topic',
  `topic_title` varchar(200) NOT NULL,
  `topic_tags` varchar(250) NOT NULL COMMENT 'tags separated by a comma',
  `topic_date_add` datetime NOT NULL,
  `topic_date_edit` datetime DEFAULT NULL,
  `topic_user_ip` varchar(20) NOT NULL,
  `topic_publish` tinyint(1) NOT NULL DEFAULT '0',
  `topic_publish_draft` tinyint(1) NOT NULL DEFAULT '1',
  `topic_publish_index` tinyint(1) NOT NULL DEFAULT '0',
  `topic_rating` float(9,3) NOT NULL DEFAULT '0.000',
  `topic_count_vote` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_count_read` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_count_comment` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_cut_text` varchar(100) DEFAULT NULL,
  `topic_forbid_comment` tinyint(1) NOT NULL DEFAULT '0',
  `topic_text_hash` varchar(32) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`),
  KEY `topic_date_add` (`topic_date_add`),
  KEY `topic_rating` (`topic_rating`),
  KEY `topic_publish` (`topic_publish`),
  KEY `topic_text_hash` (`topic_text_hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `sewyii_topic`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_topic_content`
--

CREATE TABLE IF NOT EXISTS `sewyii_topic_content` (
  `topic_id` int(11) unsigned NOT NULL,
  `topic_text` longtext NOT NULL,
  `topic_text_short` text NOT NULL,
  `topic_text_source` longtext NOT NULL,
  `topic_extra` text NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_topic_content`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_topic_photo`
--

CREATE TABLE IF NOT EXISTS `sewyii_topic_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `description` text,
  `target_tmp` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `target_tmp` (`target_tmp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `sewyii_topic_photo`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_topic_question_vote`
--

CREATE TABLE IF NOT EXISTS `sewyii_topic_question_vote` (
  `topic_id` int(11) unsigned NOT NULL,
  `user_voter_id` int(11) unsigned NOT NULL,
  `answer` tinyint(4) NOT NULL,
  UNIQUE KEY `topic_id_user_id` (`topic_id`,`user_voter_id`),
  KEY `user_voter_id` (`user_voter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_topic_question_vote`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_topic_read`
--

CREATE TABLE IF NOT EXISTS `sewyii_topic_read` (
  `topic_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `date_read` datetime NOT NULL,
  `comment_count_last` int(10) unsigned NOT NULL DEFAULT '0',
  `comment_id_last` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `topic_id_user_id` (`topic_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_topic_read`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_topic_tag`
--

CREATE TABLE IF NOT EXISTS `sewyii_topic_tag` (
  `topic_tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `blog_id` int(11) unsigned NOT NULL,
  `topic_tag_text` varchar(50) NOT NULL,
  PRIMARY KEY (`topic_tag_id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `blog_id` (`blog_id`),
  KEY `topic_tag_text` (`topic_tag_text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `sewyii_topic_tag`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_user`
--

CREATE TABLE IF NOT EXISTS `sewyii_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `date_register` datetime NOT NULL,
  `date_activate` datetime DEFAULT NULL,
  `ip_register` varchar(20) NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `activate_key` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login` (`login`),
  UNIQUE KEY `user_mail` (`mail`),
  KEY `user_activate_key` (`activate_key`),
  KEY `user_activate` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `sewyii_user`
--

INSERT INTO `sewyii_user` (`id`, `login`, `password`, `mail`, `date_register`, `date_activate`, `ip_register`, `status`, `activate_key`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.adm', '2011-08-28 00:00:00', NULL, '127.0.0.1', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_user_field`
--

CREATE TABLE IF NOT EXISTS `sewyii_user_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `sewyii_user_field`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_user_field_value`
--

CREATE TABLE IF NOT EXISTS `sewyii_user_field_value` (
  `user_id` int(11) unsigned NOT NULL,
  `field_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  KEY `user_id` (`user_id`,`field_id`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_user_field_value`
--


-- --------------------------------------------------------

--
-- Структура таблицы `sewyii_user_profile`
--

CREATE TABLE IF NOT EXISTS `sewyii_user_profile` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `birthday` datetime NOT NULL,
  `about` text NOT NULL,
  `site` varchar(50) NOT NULL,
  `icq` bigint(10) NOT NULL,
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sewyii_user_profile`
--


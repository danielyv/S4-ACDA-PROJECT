-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 25 Janvier 2018 à 15:24
-- Version du serveur :  5.5.47-0+deb8u1
-- Version de PHP :  7.0.4-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `phunvongm`
--
CREATE DATABASE IF NOT EXISTS `phunvongm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phunvongm`;

-- --------------------------------------------------------

--
-- Structure de la table `AnecSignale`
--

CREATE TABLE `AnecSignale` (
  `idLogin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `idAnecSignal` varchar(13) CHARACTER SET utf8 NOT NULL,
  `typeSignalAnec` varchar(20) CHARACTER SET utf8 NOT NULL,
  `descriptifSignalAnec` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `AnecSignale`
--

INSERT INTO `AnecSignale` (`idLogin`, `idAnecSignal`, `typeSignalAnec`, `descriptifSignalAnec`) VALUES
('NightYano', '5a4d175425943', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lectus est, blandit in volutpat at, ornare ut lectus. Donec tempor enim non ante suscipit, vel sagittis mi luctus. Fusce consequat elit mauris, vitae rhoncus diam malesuada ac. Curabitur finibus augue id augue dictum cursus. Aliquam tortor augue, condimentum sed semper in, rutrum ac augue. Morbi vel erat auctor enim convallis elementum. Maecenas dignissim nisl a arcu rhoncus rutrum. Pellentesque consectetur lorem volutpat felis tincidunt, in rhoncus ante vestibulum.  Nulla a quam et purus egestas auctor in ut mi. Maecenas pellentesque lacus eget erat suscipit, id cursus felis varius. Nunc dictum metus quis erat malesuada, vel ornare augue euismod. Sed convallis odio id lectus vulputate, vehicula porta lacus vestibulum. Cras lobortis velit sit amet mattis rhoncus. Morbi volutpat id est vitae rutrum. Sed vel metus consequat leo luctus sollicitudin. Donec nec mattis ipsum.  Ut commodo elementum dui fermentum lacinia. Vivamus purus dolor, commodo a lorem non, consectetur condimentum massa. Nulla finibus et lorem sit amet congue. Sed quis accumsan quam. Quisque vestibulum tincidunt dui, at fermentum mi viverra in. Mauris sit amet sapien cursus, convallis nulla quis, condimentum turpis. Curabitur ante ligula, pretium eu mollis ac, aliquet vel leo. Donec iaculis malesuada consequat. Ut non dui at elit elementum varius in nec tortor. Nullam sit amet lectus eu enim porta porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In et tortor at mauris molestie aliquet. Quisque commodo scelerisque purus at fermentum. Nullam pharetra, mi nec hendrerit mollis, lectus lacus cursus elit, sit amet egestas metus justo et mauris.'),
('NightYano', '5a4d17ea47d8b', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in fringilla sapien, quis cursus mi. Aliquam sit amet sagittis neque. Sed quis enim risus. Aenean maximus euismod eros, sed tristique orci semper eu. Quisque tincidunt mauris enim, sed cursus purus ultricies sed. Vivamus in pretium'),
('NightYano', '5a4fe6ab89e08', 'ContenuOff', 'Moi j\'aime pas'),
('NightYano', '5a5e5c8910da4', 'ContenuOff', 'drhdrh');

-- --------------------------------------------------------

--
-- Structure de la table `Anecdote`
--

CREATE TABLE `Anecdote` (
  `idAnecdote` varchar(13) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `texte` text NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `idJeu` int(11) NOT NULL,
  `idLogin` varchar(20) NOT NULL,
  `publie` tinyint(1) NOT NULL,
  `nbLike` int(11) NOT NULL,
  `nbLove` int(11) NOT NULL,
  `nbJpp` int(11) NOT NULL,
  `nbOh` int(11) NOT NULL,
  `nbSad` int(11) NOT NULL,
  `nbGrr` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `joie` int(100) NOT NULL,
  `peur` int(100) NOT NULL,
  `colere` int(100) NOT NULL,
  `degout` int(100) NOT NULL,
  `tristesse` int(100) NOT NULL,
  `surprise` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Anecdote`
--

INSERT INTO `Anecdote` (`idAnecdote`, `titre`, `texte`, `categorie`, `idJeu`, `idLogin`, `publie`, `nbLike`, `nbLove`, `nbJpp`, `nbOh`, `nbSad`, `nbGrr`, `date`, `joie`, `peur`, `colere`, `degout`, `tristesse`, `surprise`) VALUES
('5a4d175425943', 'uyuyzguc', '<p><strong>Modif</strong></p>\r\n\r\n<p>lockejo</p>\r\n\r\n<p>coek</p>\r\n\r\n<div class="spoiler">\r\n<div class="spoiler-title">\r\n<div class="spoiler-toggle hide-icon">&nbsp;</div>\r\n</div>\r\n\r\n<div class="spoiler-content">\r\n<p>Je suis un test</p>\r\n</div>\r\n</div>\r\n\r\n<p>kjoc</p>\r\n', 'positive', 27, 'user', 1, 1, 0, 0, 0, 0, 0, '2018-01-03 17:48:04', 89, 30, 100, 48, 98, 50),
('5a4d17ea47d8b', 'Oui', '<p>Je suis avant le spoiler</p>\r\n\r\n<div class="spoiler">\r\n<div class="spoiler-title">\r\n<div class="spoiler-toggle hide-icon">&nbsp;</div>\r\n</div>\r\n\r\n<div class="spoiler-content">\r\n<p>je suis le spoiler</p>\r\n</div>\r\n</div>\r\n\r\n<p>je suis apr&eacute;s le spoiler</p>\r\n', 'positive', 6, 'user', 1, 0, 0, 0, 0, 0, 0, '2018-01-03 17:50:34', 39, 59, 75, 40, 32, 100),
('5a4fe65e137d5', 'Une expérience unique !', '<p>C&#39;&eacute;tait g&eacute;nial</p>\r\n', 'positive', 1, 'Morganeuh', 0, 0, 0, 0, 0, 0, 0, '2018-01-05 20:55:58', 61, 30, 16, 0, 45, 13),
('5a4fe6ab89e08', 'J\'adore', '<p>trop bien</p>\r\n', 'positive', 6, 'Morganeuh', 1, 0, 1, 0, 0, 0, 0, '2018-01-05 20:57:15', 69, 0, 25, 0, 0, 29),
('5a4fe86a16a56', 'J\'adore', '<p>ahah</p>\r\n', 'autre', 54, 'Morganeuh', 0, 0, 0, 0, 0, 0, 0, '2018-01-05 21:04:42', 100, 0, 58, 0, 0, 0),
('5a4fe88ba2c5c', 'Test', '<p>test</p>\r\n', 'positive', 54, 'Morganeuh', 0, 0, 0, 0, 0, 0, 0, '2018-01-05 21:05:15', 0, 0, 0, 0, 0, 0),
('5a4fe91c1b2e5', 'Encore un test', '', 'positive', 1, 'Morganeuh', 0, 0, 0, 0, 0, 0, 0, '2018-01-05 21:07:40', 0, 0, 0, 0, 0, 0),
('5a4fe926cba7c', 'Encore un test', '', 'positive', 1, 'Morganeuh', 0, 0, 0, 0, 0, 0, 0, '2018-01-05 21:07:50', 0, 0, 0, 0, 0, 0),
('5a5e5a1a49871', 'Une expérience fantastique !', '<p>lorem ipsum</p>\r\n', 'positive', 56, 'Morganeuh', 0, 0, 0, 0, 0, 0, 0, '2018-01-16 20:01:30', 66, 42, 28, 13, 33, 26),
('5a5e5af277c62', 'Super jeu !', '<p>Blablabla</p>\r\n', 'positive', 1, 'evilox', 0, 0, 0, 0, 0, 0, 0, '2018-01-16 20:05:06', 70, 0, 100, 36, 100, 50),
('5a5e5c8910da4', 'Pire que le uno ! Ca brise des amitiés :)', '<p>Trop bien pour faire rager ses proches :3</p>\r\n', 'positive', 54, 'evilox', 1, 1, 0, 0, 0, 1, 0, '2018-01-16 20:11:53', 100, 21, 52, 30, 25, 50),
('5a5f202d38574', 'Ce', '<h2 style="font-style:italic;">ceci est un message&nbsp;&nbsp;</h2>\r\n\r\n<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;">Comme le disait un grand proph&egrave;te :&nbsp;<q>J&#39;ai faim</q></div>\r\n\r\n<p><img alt="" src="https://cdn.vox-cdn.com/uploads/chorus_asset/file/9146987/Soraka_Splash_7.jpg" style="height:500px; width:847px" />&nbsp;</p>\r\n', 'positive', 6, 'evilox', 1, 0, 1, 0, 0, 0, 0, '2018-01-17 10:06:37', 100, 0, 0, 0, 0, 0),
('5a5f20504c26e', 'Projet', '<p>erherth</p>\r\n', 'positive', 6, 'evilox', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 10:07:12', 0, 59, 27, 92, 83, 15),
('5a5f205dbef7e', 'Mérite', '<p>ergezg</p>\r\n', 'positive', 6, 'evilox', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 10:07:25', 82, 35, 88, 19, 0, 0),
('5a5f206d00568', '20/20', '<p>gregds</p>\r\n', 'positive', 6, 'evilox', 1, 1, 0, 0, 0, 0, 0, '2018-01-17 10:07:41', 0, 55, 22, 0, 0, 0),
('5a5f38820a957', 'Lorem ipsum dolor sit amet, consectetur adipi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra ut felis quis laoreet. Morbi vitae tempus ante. Morbi suscipit feugiat condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi posuere eget purus at maximus. Nulla sed commodo purus. Maecenas ut tellus eu libero feugiat feugiat. Nullam pharetra commodo metus, at malesuada tellus sodales non. Quisque posuere lorem eu nulla pulvinar accumsan. Integer auctor sed metus non fringilla. Curabitur lobortis rutrum purus non condimentum.</p>\r\n', 'positive', 6, 'UserTest', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 11:50:26', 0, 0, 81, 0, 0, 0),
('5a5f3d2d884f4', 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum quam eget lacus luctus mollis. Aliquam erat volutpat. Sed lacus nunc, iaculis a malesuada sed, consectetur vitae ex. Vivamus eu mollis lacus, suscipit maximus ipsum. Sed vel rutrum diam, vel dignissim libero. Duis fermentum vestibulum nisl, quis facilisis nulla vestibulum vitae. Nulla libero felis, mollis in metus sed, placerat pellentesque leo. Suspendisse potenti. Donec maximus lorem ac augue mattis, at malesuada sem dignissim. Nam arcu turpis, condimentum et nisl sed, commodo molestie dui. Fusce ac lectus a turpis accumsan euismod a eget lacus.</p>\r\n\r\n<div class="spoiler">\r\n<div class="spoiler-title">\r\n<div class="spoiler-toggle hide-icon">&nbsp;</div>\r\n</div>\r\n\r\n<div class="spoiler-content">\r\n<p>Mauris sed sapien a sem sollicitudin condimentum ut vitae odio. Morbi sem ante, pellentesque at libero sed, sagittis efficitur turpis. Fusce vehicula, lacus quis eleifend molestie, orci odio sollicitudin nibh, in sodales ligula orci non lorem. Nunc justo massa, tristique ut fringilla sed, feugiat non quam. Nullam scelerisque nisl sed arcu pulvinar, id porttitor nisi malesuada. Maecenas congue mollis nunc, quis interdum massa malesuada et. Morbi ac porta nisl, ut suscipit quam. Vivamus condimentum vulputate luctus.</p>\r\n\r\n<p>Aenean lobortis porta ipsum id bibendum. Donec rhoncus volutpat ex, vitae aliquet enim interdum non. Morbi at ultricies nulla. Aliquam tortor est, porta et quam ac, bibendum hendrerit ex. Mauris rutrum commodo ullamcorper. Cras ultrices pulvinar magna, id pharetra urna fermentum sit amet. Ut efficitur, justo vel bibendum vulputate, ante purus sollicitudin felis, ut rhoncus augue sem vel erat. Maecenas vestibulum libero elit. Vestibulum sit amet lacus faucibus, feugiat metus vitae, rhoncus purus. Fusce sit amet mattis massa. Maecenas pharetra tellus id magna interdum, quis vulputate ipsum placerat. Sed blandit magna sem, quis tristique lorem placerat et. Aenean euismod ipsum nisi, eu lacinia dui dignissim viverra.</p>\r\n\r\n<p>Ut eu nibh tempus, tincidunt sapien a, pellentesque nisi. Suspendisse varius sagittis lectus id dictum. Fusce tincidunt justo in dui auctor imperdiet. Duis sit amet erat turpis. Pellentesque posuere leo erat, eget porttitor metus pretium vel. Integer iaculis pretium elit sed facilisis. Nullam lacinia, nisi quis pharetra tempor, lectus ipsum sodales libero, eget ultrices sem nisi ac lectus.</p>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n', 'positive', 6, 'evilox', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 12:10:21', 100, 52, 89, 28, 70, 21),
('5a5f3d6565fff', 'Mauris', '<p>Mauris sed sapien a sem sollicitudin condimentum ut vitae odio. Morbi sem ante, pellentesque at libero sed, sagittis efficitur turpis. Fusce vehicula, lacus quis eleifend molestie, orci odio sollicitudin nibh, in sodales ligula orci non lorem. Nunc justo massa, tristique ut fringilla sed, feugiat non quam. Nullam scelerisque nisl sed arcu pulvinar, id porttitor nisi malesuada. Maecenas congue mollis nunc, quis interdum massa malesuada et. Morbi ac porta nisl, ut suscipit quam. Vivamus condimentum vulputate luctus.</p>\r\n\r\n<p>Aenean lobortis porta ipsum id bibendum. Donec rhoncus volutpat ex, vitae aliquet enim interdum non. Morbi at ultricies nulla. Aliquam tortor est, porta et quam ac, bibendum hendrerit ex. Mauris rutrum commodo ullamcorper. Cras ultrices pulvinar magna, id pharetra urna fermentum sit amet. Ut efficitur, justo vel bibendum vulputate, ante purus sollicitudin felis, ut rhoncus augue sem vel erat. Maecenas vestibulum libero elit. Vestibulum sit amet lacus faucibus, feugiat metus vitae, rhoncus purus. Fusce sit amet mattis massa. Maecenas pharetra tellus id magna interdum, quis vulputate ipsum placerat. Sed blandit magna sem, quis tristique lorem placerat et. Aenean euismod ipsum nisi, eu lacinia dui dignissim viverra.</p>\r\n\r\n<p>Ut eu nibh tempus, tincidunt sapien a, pellentesque nisi. Suspendisse varius sagittis lectus id dictum. Fusce tincidunt justo in dui auctor imperdiet. Duis sit amet erat turpis. Pellentesque posuere leo erat, eget porttitor metus pretium vel. Integer iaculis pretium elit sed facilisis. Nullam lacinia, nisi quis pharetra tempor, lectus ipsum sodales libero, eget ultrices sem nisi ac lectus.</p>\r\n', 'positive', 6, 'evilox', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 12:11:17', 0, 62, 40, 0, 94, 31),
('5a5f45f2f2aab', 'Lorem Ipsum', '<h3 style="color:#aaaaaa;font-style:italic;">Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. <strong>Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien.</strong> Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.</h3>\r\n\r\n<div class="spoiler">\r\n<div class="spoiler-title">\r\n<div class="spoiler-toggle hide-icon">&nbsp;</div>\r\n</div>\r\n\r\n<div class="spoiler-content">\r\n<p>Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.</p>\r\n\r\n<p>Donec porta massa turpis, ac imperdiet erat consequat ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus tortor tellus, consequat sit amet leo non, sagittis dignissim magna. Vestibulum lobortis erat nec dui ornare, non viverra nisl laoreet. Sed vestibulum massa scelerisque, bibendum ante sed, convallis nunc. Maecenas ac viverra elit, at scelerisque lectus. Suspendisse eu augue vitae libero sodales fringilla. Suspendisse potenti.</p>\r\n</div>\r\n</div>\r\n\r\n<p>Donec porta massa turpis, ac imperdiet erat consequat ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus tortor tellus, consequat sit amet leo non, sagittis dignissim magna. Vestibulum lobortis erat nec dui ornare, non viverra nisl laoreet. Sed vestibulum massa scelerisque, bibendum ante sed, convallis nunc. Maecenas ac viverra elit, at scelerisque lectus. Suspendisse eu augue vitae libero sodales fringilla. Suspendisse potenti.</p>\r\n', 'positive', 6, 'user', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 12:47:46', 44, 100, 22, 74, 32, 100),
('5a5f46540993c', 'Lorem Ipsum', '<p>Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. <s>Mauris at velit </s>a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitud<em>in magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie</em> ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.</p>\r\n\r\n<p><code>Donec porta massa turpis</code></p>\r\n\r\n<p>, ac imperdiet erat consequat ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus tortor tellus, consequat sit amet leo non, sagittis dignissim magna. Vestibulum lobortis erat nec dui ornare, non viverra nisl laoreet. Sed vestibulum massa scelerisque, bibendum ante sed, convallis nunc. Maecenas ac viverra elit, at scelerisque lectus. Suspendisse eu augue vitae libero sodales fringilla. Suspendisse potenti.</p>\r\n', 'negative', 32, 'user', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 12:49:24', 58, 30, 100, 42, 90, 41),
('5a5f46a111ffb', 'Lorem Ipsum', '<p>Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. <kbd>Mauris at velit a ex posuere dapibus qu</kbd>is at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodal<big>es molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.</big></p>\r\n\r\n<p><big>Donec porta massa turpis, ac imperdiet erat consequat ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus tortor tellus, consequat sit amet leo non, sagittis dignissim magna. Vestibulum lobortis erat nec dui ornare, non viverra nisl laoreet. Sed vestibulum massa scelerisque, bibendum ante sed, convallis nunc. Maecenas ac viverra elit, at scelerisque lectus. Suspendisse eu augue vitae libero sodal</big>es fringilla. Suspendisse potenti.</p>\r\n', 'positive', 6, 'user', 1, 0, 0, 0, 0, 0, 1, '2018-01-17 12:50:41', 44, 98, 53, 94, 88, 100),
('5a5f474623f3d', 'Lorem Ipsum', '<p>Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.Nam facilisis erat a ex elementum ullamcorper ut in risus. In velit magna, tincidunt sit amet mi eu, commodo gravida erat. Mauris at velit a ex posuere dapibus quis at eros. Vivamus vehicula tempor tortor. Curabitur id mauris sapien. Nam eu sollicitudin magna. Aliquam maximus venenatis neque, ac scelerisque enim blandit nec. Nunc eu sollicitudin velit. Vivamus egestas, erat consequat cursus varius, dolor nulla pellentesque turpis, eu pulvinar mi justo a ipsum. Pellentesque ultrices ligula ex, sed tincidunt urna pharetra vitae. Pellentesque eros elit, sodales quis turpis ut, finibus facilisis mi. Fusce nec metus ex. Integer sodales molestie ornare. Ut venenatis, leo et placerat viverra, dolor nisl vulputate odio, eget tincidunt ex dui ac ante.</p>\r\n', 'positive', 6, 'user', 1, 0, 0, 0, 0, 0, 0, '2018-01-17 12:53:26', 23, 84, 41, 82, 93, 91),
('5a5f4814aa62d', 'lodfkez', '<p>rehgreh</p>\r\n', 'positive', 6, 'user', 1, 0, 1, 0, 0, 0, 0, '2018-01-17 12:56:52', 34, 48, 0, 0, 0, 50),
('5a5f481b54caa', 'qerh', '<p>efse</p>\r\n', 'positive', 6, 'evilox', 0, 0, 0, 0, 0, 0, 0, '2018-01-17 12:56:59', 0, 38, 0, 0, 0, 0),
('5a6340a89a405', 'test', '<p>srg</p>\r\n', 'positive', 32, 'azerty', 1, 0, 0, 0, 0, 0, 0, '2018-01-20 13:14:16', 0, 67, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `BadgeUtili`
--

CREATE TABLE `BadgeUtili` (
  `idLogin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `idBadgeUtil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Bagde`
--

CREATE TABLE `Bagde` (
  `idBagde` int(11) NOT NULL,
  `nomBadge` varchar(20) CHARACTER SET utf8 NOT NULL,
  `experienceBadge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ComSignale`
--

CREATE TABLE `ComSignale` (
  `idLogin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `idComSignal` int(11) NOT NULL,
  `typeSignalCom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `descriptifSignalCom` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `idAnecdote` varchar(13) CHARACTER SET utf8 NOT NULL,
  `texteCom` text CHARACTER SET utf8 NOT NULL,
  `epingle` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `JeuVideo`
--

CREATE TABLE `JeuVideo` (
  `idJeu` int(11) NOT NULL,
  `nomJeu` varchar(40) NOT NULL,
  `descriptifJeu` text,
  `categorieJeu` varchar(20) DEFAULT NULL,
  `image` varchar(20) NOT NULL DEFAULT 'gameDefault.jpg',
  `valide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `JeuVideo`
--

INSERT INTO `JeuVideo` (`idJeu`, `nomJeu`, `descriptifJeu`, `categorieJeu`, `image`, `valide`) VALUES
(1, '', NULL, NULL, 'gameDefault.jpg', 0),
(4, 'drgre', '<p>ergerg</p>\r\n', 'RPG', 'gameDefault.jpg', 1),
(6, 'GTA5', '<p>Blablabla</p>\r\n', 'RPG', 'gameDefault.jpg', 1),
(27, 'GTA9', '<p>aeag</p>\r\n', 'RTS', 'gameDefault.jpg', 1),
(29, 'erh', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nec consectetur purus. Integer varius ex in ante laoreet, at blandit libero lacinia. Proin purus nisl, sollicitudin sit amet blandit in, bibendum sit amet ligula. Vivamus blandit est eu mi maximus facilisis. Nullam consequat justo faucibus dignissim hendrerit. Praesent dolor tellus, porttitor quis nisi non, finibus commodo libero. Duis imperdiet elit elit, vel imperdiet ante dapibus in.</p>\r\n\r\n<p>Nullam et enim ac risus imperdiet mollis in eget dolor. Maecenas eget erat sed risus fringilla ornare sagittis eget sapien. Sed ante tellus, mollis eu lorem sed, fringilla dignissim sem. Fusce laoreet odio sed magna porta, in elementum est tincidunt. Vestibulum dignissim, diam nec elementum ullamcorper, elit turpis commodo enim, sed finibus libero justo sit amet elit. Suspendisse dictum lacus risus, nec semper mi imperdiet sed. Duis finibus sapien in dolor accumsan luctus. Maecenas ultricies ex ut dictum luctus. Pellentesque arcu est, facilisis vel ipsum at, vestibulum rhoncus odio. Sed tincidunt fermentum nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc convallis condimentum arcu, sit amet laoreet purus aliquet nec. Suspendisse mattis purus at mauris gravida aliquam.</p>\r\n\r\n<p>Ut est tortor, convallis id quam ac, mattis iaculis eros. Praesent sed faucibus tellus. Integer nunc ligula, facilisis non malesuada vitae, finibus quis nibh. Nunc eros eros, pellentesque vel mauris non, iaculis auctor sapien. Sed nisl tellus, condimentum eget iaculis eget, vestibulum eu turpis. Sed vel mi gravida, efficitur turpis sit amet, tempor tellus. Duis sodales metus et odio euismod gravida.</p>\r\n\r\n<p>Donec elit dui, lobortis vel neque suscipit, ullamcorper maximus diam. Ut euismod faucibus blandit. Quisque a scelerisque velit. Curabitur vitae ante bibendum, lacinia justo ut, pharetra eros. Phasellus id lobortis lacus. Pellentesque semper, purus dictum egestas gravida, justo ex mattis quam, at maximus nisi lorem vel quam. Maecenas sit amet tempus orci, et tincidunt magna. Cras leo tortor, sodales consectetur lobortis non, rhoncus id velit. Aenean porta consequat aliquam. Vivamus sed gravida lectus. Proin sodales massa a massa fringilla, mattis imperdiet orci imperdiet.</p>\r\n\r\n<p>Ut ultricies neque bibendum metus gravida interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. In mattis enim quis lorem congue ultrices. Integer bibendum turpis lectus, eu vehicula lorem iaculis eu. Nam velit nibh, lobortis id orci eu, lacinia venenatis lacus. Aliquam erat volutpat. Duis vel justo erat.</p>\r\n', 'RTSr', 'gameDefault.jpg', 1),
(30, 'erhhjtr', '<p>aeag</p>\r\n', 'eg', 'gameDefault.jpg', 1),
(32, 'lol', '<p>aeag</p>\r\n', 'ega', 'gameDefault.jpg', 1),
(35, 'Adibou', '<p>c le feu</p>\r\n', 'Best game', 'gameDefault.jpg', 1),
(54, 'Tetris', '<p>greg</p>\r\n', 'test', 'Tetris.jpeg', 1),
(55, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'zrg', 'gameDefault.jpg', 1),
(56, 'Life is Strange', NULL, NULL, 'gameDefault.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ReactionAnec`
--

CREATE TABLE `ReactionAnec` (
  `idLogin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `idAnecReac` varchar(13) CHARACTER SET utf8 NOT NULL,
  `typeReacAnec` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ReactionAnec`
--

INSERT INTO `ReactionAnec` (`idLogin`, `idAnecReac`, `typeReacAnec`) VALUES
('evilox', '5a5e5c8910da4', 0),
('evilox', '5a5f4814aa62d', 1),
('user', '5a5f46a111ffb', 5),
('UserTest', '5a5e5c8910da4', 4),
('UserTest', '5a5f202d38574', 1),
('UserTest', '5a5f206d00568', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ReactionCom`
--

CREATE TABLE `ReactionCom` (
  `idLogin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `idComReac` int(11) NOT NULL,
  `typeReacCom` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `login` varchar(20) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `nonce` varchar(32) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`login`, `mdp`, `pseudo`, `email`, `admin`, `nonce`, `sexe`, `profession`) VALUES
('azerty', '20c3e327f381240e20856430881924a004dd95d35091bd66cdf6f30df1845e6f', 'azerty', 'corentin.grard@gmail.com', 0, NULL, 'azerty', 'azerty'),
('dieu', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'dieu', 'corentin.grard@gmail.com', 0, NULL, 'Homme', 'mangeur'),
('evilox', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'password', 'ev@yopmail.com', 0, NULL, 'zegf', 'ef'),
('Morganeuh', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'Morgane', 'mornyanchu@gmail.com', 0, NULL, 'Femme(à prouver)', 'Chômage'),
('NightYano', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'NightYano', 'davide.martins@hotmail.fr', 1, NULL, NULL, 'Jesus'),
('test', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'test', 'test@yopmail.com', 0, '9c09acea400066ed92adb82f7dacac74', '', ''),
('tester', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'segf', 'gzefe@az.fsfse', 0, 'e6ac28422b6d25df2fd231dd4fe0b2ff', 'eg', 'erg'),
('user', 'b0603ffec876800fee32d53e9fda0fb25d51e3361fe8de993b56cff0f78c2527', 'user', 'paul.amblard325@gmail.com', 0, NULL, 'user', 'user'),
('UserTest', 'cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75', 'UserTest', 'exemple@yopmail.com', 0, NULL, 'Autre', 'Etudiant');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nbReacTotal`
--
CREATE TABLE `nbReacTotal` (
`idAnectode` varchar(13)
,`nbReactions` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la vue `nbReacTotal`
--
DROP TABLE IF EXISTS `nbReacTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`phunvongm`@`%` SQL SECURITY DEFINER VIEW `nbReacTotal`  AS  select `ReactionAnec`.`idAnecReac` AS `idAnectode`,count(`ReactionAnec`.`typeReacAnec`) AS `nbReactions` from `ReactionAnec` group by `ReactionAnec`.`idAnecReac` ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `AnecSignale`
--
ALTER TABLE `AnecSignale`
  ADD PRIMARY KEY (`idLogin`,`idAnecSignal`),
  ADD KEY `fk_AnecSignale_idAnec` (`idAnecSignal`);

--
-- Index pour la table `Anecdote`
--
ALTER TABLE `Anecdote`
  ADD PRIMARY KEY (`idAnecdote`),
  ADD KEY `idJeu` (`idJeu`),
  ADD KEY `idLogin` (`idLogin`);

--
-- Index pour la table `BadgeUtili`
--
ALTER TABLE `BadgeUtili`
  ADD PRIMARY KEY (`idLogin`,`idBadgeUtil`),
  ADD KEY `ctIdBadgeUtil` (`idBadgeUtil`);

--
-- Index pour la table `Bagde`
--
ALTER TABLE `Bagde`
  ADD PRIMARY KEY (`idBagde`);

--
-- Index pour la table `ComSignale`
--
ALTER TABLE `ComSignale`
  ADD PRIMARY KEY (`idLogin`,`idComSignal`),
  ADD KEY `ctIdComSignal` (`idComSignal`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `idAnecdote` (`idAnecdote`);

--
-- Index pour la table `JeuVideo`
--
ALTER TABLE `JeuVideo`
  ADD PRIMARY KEY (`idJeu`);

--
-- Index pour la table `ReactionAnec`
--
ALTER TABLE `ReactionAnec`
  ADD PRIMARY KEY (`idLogin`,`idAnecReac`),
  ADD KEY `fk_reactionAnec_idAnec` (`idAnecReac`);

--
-- Index pour la table `ReactionCom`
--
ALTER TABLE `ReactionCom`
  ADD PRIMARY KEY (`idLogin`,`idComReac`),
  ADD KEY `ctIdComReac` (`idComReac`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Bagde`
--
ALTER TABLE `Bagde`
  MODIFY `idBagde` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `JeuVideo`
--
ALTER TABLE `JeuVideo`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `AnecSignale`
--
ALTER TABLE `AnecSignale`
  ADD CONSTRAINT `fk_AnecSignale_idAnec` FOREIGN KEY (`idAnecSignal`) REFERENCES `Anecdote` (`idAnecdote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_AnecSignale_idLogin` FOREIGN KEY (`idLogin`) REFERENCES `Utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Anecdote`
--
ALTER TABLE `Anecdote`
  ADD CONSTRAINT `fk_anecdote_idJeu` FOREIGN KEY (`idJeu`) REFERENCES `JeuVideo` (`idJeu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_anecdote_idLogin` FOREIGN KEY (`idLogin`) REFERENCES `Utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `BadgeUtili`
--
ALTER TABLE `BadgeUtili`
  ADD CONSTRAINT `ctIdBadgeUtil` FOREIGN KEY (`idBadgeUtil`) REFERENCES `Bagde` (`idBagde`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_badgeUtili_idLogin` FOREIGN KEY (`idLogin`) REFERENCES `Utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ComSignale`
--
ALTER TABLE `ComSignale`
  ADD CONSTRAINT `ctIdComSignal` FOREIGN KEY (`idComSignal`) REFERENCES `Commentaire` (`idCommentaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ComSignale_idLogin` FOREIGN KEY (`idLogin`) REFERENCES `Utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `fk_commentaire_idAnec` FOREIGN KEY (`idAnecdote`) REFERENCES `Anecdote` (`idAnecdote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ReactionAnec`
--
ALTER TABLE `ReactionAnec`
  ADD CONSTRAINT `fk_reactionAnec_idAnec` FOREIGN KEY (`idAnecReac`) REFERENCES `Anecdote` (`idAnecdote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reactionAnec_idLogin` FOREIGN KEY (`idLogin`) REFERENCES `Utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ReactionCom`
--
ALTER TABLE `ReactionCom`
  ADD CONSTRAINT `ctIdComReac` FOREIGN KEY (`idComReac`) REFERENCES `Commentaire` (`idCommentaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reactioncom_idLogin` FOREIGN KEY (`idLogin`) REFERENCES `Utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

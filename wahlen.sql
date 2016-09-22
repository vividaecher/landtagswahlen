DROP TABLE IF EXISTS `nrw_2017`;
CREATE TABLE `nrw_2017` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `party` varchar(10) NOT NULL,
  `votes` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
INSERT INTO `nrw_2017` (`party`, `votes`) VALUES ('linke',0),('spd',0), ('gruenen',0), ('fdp',0), ('cdu',0), ('afd',0);

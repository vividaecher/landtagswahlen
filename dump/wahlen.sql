DROP TABLE IF EXISTS `nrw_2017`;
CREATE TABLE `nrw_2017` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `party` varchar(10) NOT NULL,
  `label` varchar(20) NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
INSERT INTO `nrw_2017`
(`party`, `label`, `votes`) 
VALUES
('linke','Die Linke',0),
('spd','SPD',0),
('gruenen','Die Grünen',0),
('fdp','FDP',0),
('cdu','CDU',0),
('afd','AfD',0);

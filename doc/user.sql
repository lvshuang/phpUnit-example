CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) NOT NULL,
  `isAdmin` int(1) NOT NULL DEFAULT '0',
  `createdTIme` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



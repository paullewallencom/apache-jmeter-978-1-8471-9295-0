# Host: localhost
# Database: volsys_0.1
# Table: 'volsys_volunteer'
# 
CREATE TABLE `volsys_volunteer` (
  `volunteer_id` int(11) NOT NULL auto_increment,
  `volunteer_name` varchar(100) default NULL,
  `volunteer_email` varchar(100) default NULL,
  `volunteer_phone` varchar(100) default '',
  `volunteer_url` varchar(100) default NULL,
  PRIMARY KEY  (`volunteer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1; 

# Host: localhost
# Database: volsys_0.1
# Table: 'volsys_assign'
# 
CREATE TABLE `volsys_assign` (
  `assign_id` int(11) NOT NULL auto_increment,
  `month` int(2) default NULL,
  `day` int(2) default NULL,
  `year` int(4) default NULL,
  `location` varchar(100) default NULL,
  `venue` varchar(100) default NULL,
  `details` varchar(100) default NULL,
  `volunteer_id` int(11) default NULL,
  PRIMARY KEY  (`assign_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1; 

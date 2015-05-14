<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('customfields')};
CREATE TABLE {$this->getTable('customfields')} (
  `customfields_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL default '',
  PRIMARY KEY (`customfields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





    ");

$installer->endSetup(); 
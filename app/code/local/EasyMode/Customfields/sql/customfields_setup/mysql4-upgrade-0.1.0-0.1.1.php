<?php
$installer = $this;
$installer->startSetup();
$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('customfields_customgroups')};
CREATE TABLE {$this->getTable('customfields_customgroups')} (
  `customgroups_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL default '',
  PRIMARY KEY (`customgroups_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS {$this->getTable('customfields_customgroupsfields')};
CREATE TABLE {$this->getTable('customfields_customgroupsfields')} (
  `customgroupsfields_id` int(11) unsigned NOT NULL auto_increment,
  `customfields_id` int(11) unsigned NOT NULL,
  `customgroups_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`customgroupsfields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
$installer->endSetup();
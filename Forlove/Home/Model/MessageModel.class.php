<?php

namespace Home\Model;
use Think\Model\RelationModel;

class MessageModel extends RelationModel{
	protected $_link = array(
		'Reply' => array(
			'mapping_type' => self::HAS_MANY,
			'class_name'    => 'Reply',
			'foreign_key'   => 'gid',
			'mapping_name'  => 'reply',
			'mapping_order' => 'id desc',
			)
	);
}
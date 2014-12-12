<?php
namespace Page\Model;

use Zend\Permissions\Acl\Acl as ZendAcl;
use Zend\Permissions\Acl\Resource\GenericResource;
use Zend\Permissions\Acl\Role\GenericRole;

class Acl{
	public $clist;

	public function __construct(){
		$this->clist = new ZendAcl();

		$this->clist->addRole(new GenericRole('user'))->addRole(new GenericRole('admin'));

		$this->clist->addResource(new GenericResource('page'));

		$this->clist->allow(array('user', 'admin'), 'page','view');

		$this->clist->allow(array('admin'), 'page','add');
	}

	public function getAcl(){
		return $this->clist;
	}

}
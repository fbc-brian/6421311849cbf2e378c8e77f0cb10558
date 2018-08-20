<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

	public $validate = array(
		'fname' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),

			),
			'between' => array(
	            'rule' => array('lengthBetween', 5, 20),
	            'message' => 'Between 5 to 20 characters'
	        )
		),
		'lname' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),

			),
			'between' => array(
	            'rule' => array('lengthBetween', 5, 20),
	            'message' => 'Between 5 to 20 characters'
	        )
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email is not valid!',
			),
			'unique' => array(
	            'rule' => 'isUnique',
	            'message' => 'Provided Email already exists.'
	        )
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'confirm_password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'password_confirm'=>array(
	                'rule'=>array('password_confirm'),
	                'message'=>'Password Confirmation must match Password',                         
	            ),  
			),
			'match'=>array(
		        'rule' => 'validatePasswdConfirm',
		        'message' => 'Passwords do not match'
		    )
		),
		'gender' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'last_login_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
		),
		'created_ip' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'modified_ip' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'old_password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'image' => array(
			'extension'=>array(
    			'rule' => array('extension', array('png', 'jpg', 'jpeg')),
        		'message'=>'Please enter a valid image!',
        		'required' => false,
        		'allowEmpty' => true
        	)
		),
	);

	function validatePasswdConfirm($data) {
	    if ($this->data['Provider']['password'] !== $data['confirm_password'])
	    {
	      return false;
	    }
	    return true;
	  }

  	function beforeSave($options = array()) {
	    if (isset($this->data['Provider']['password'])) {
	    	$this->data['Provider']['password'] = AuthComponent::password($this->data['Provider']['password']);
	    }
	    if (isset($this->data['Provider']['confirm_password'])) {
	    	unset($this->data['Provider']['confirm_password']);
	    }
	    return true;
	}

	public $hasMany = array(
    	'Post' => array(
    		'className' => 'Post',
    		'foreignKey' => 'provider_id',
    		'dependent' => false,
    		'conditions' => '',
    		'fields' => '',
    		'order' => '',
    		'limit' => '',
    		'offset' => '',
    		'exclusive' => '',
    		'finderQuery' => '',
    		'counterQuery' => '',
    	)
    );




}

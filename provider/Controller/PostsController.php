<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {
	public $uses = array(
		'Provider',
		'Post'
	);
	public $components = array('Paginator');
	public $helpers = array('My');
	protected $perPage = 2;
	public $myID = 9; //($this->Auth->user() != null ? $this->Auth->user('id') : '');

	public function beforeFilter() {
		$this->Auth->allow(array('index', 'add', 'view','edit'));
	}

	public function index() {
		$this->paginate = array(
        	'conditions' => array('Post.provider_id = ' . $this->myID),
			'order' => array('Post.created' => 'DESC'),
            'limit' => $this->perPage
        );
		$this->set('posts', $this->Paginator->paginate('Post'));
		if ($this->request->is('ajax')) {
			$this->render('table', 'ajax');
		}
	}

	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->request->data['Post']['provider_id'] = $this->myID;
			$this->request->data['Post']['created_ip'] = $this->request->clientIp();;
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid Post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('ajax')) {
			return $this->redirect(array('action' => 'index'));
		}

		$this->Post->id = $id;
		$response = array();
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->Post->delete()) {
			$response['msg'] = __('The message has been deleted.');
			$response['status'] = true;
		} else {
			$response['msg'] = __('The message could not be deleted. Please, try again.');
			$response['status'] = false;
		}

		$this->set('response', $response);		
		$this->render('ajax', 'ajax');
	}
 
	public function delcon($id = null) {
		if ($this->request->is('ajax')) {
			$data = array();
			$options = array(
				'conditions' => array('con_id='.$id)
			);
			$convo = $this->Post->find('first', $options);
			if (!$convo) {
				throw new NotFoundException(__('Invalid message'));
			}
			$this->request->allowMethod('get', 'delete');	
			if ($this->Post->deleteAll(array('Message.con_id' => $id))) {
				$data['status'] = true;
				$data['msg'] = __('The message has been deleted.');
			} else {
				$data['status'] = false;
				$data['msg'] = __('The message could not be deleted. Please, try again.');
			}
			$this->set('response', $data);
			$this->render('ajax', 'ajax');
		}
	}
	


	public function search() {
		$find = '%'.$this->request->data['Message']['search'].'%';
		$this->paginate = array(	
        	'conditions' => array(
        		'(Message.from_id=' .$this->Auth->user('id'). ' OR Message.to_id=' .$this->Auth->user('id'). ')',
        		'OR' => array(
        			'Message.content LIKE ' => $find,
        			'Receiver.name LIKE' => $find
        		)
	        ),
			'order' => array(
                'Message.created' => 'DESC',
            ),
            'limit' => $this->perPage
        );

		$this->set('messages', $this->Paginator->paginate('Message'));
		if ($this->request->is('ajax')) {
			$this->render('search', 'ajax');
		}

	}
	
}

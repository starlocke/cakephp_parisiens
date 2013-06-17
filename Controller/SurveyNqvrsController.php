<?php
App::uses('AppController', 'Controller');
/**
 * SurveyNqvrs Controller
 *
 * @property SurveyNqvr $SurveyNqvr
 */
class SurveyNqvrsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SurveyNqvr->recursive = 0;
		$this->set('surveyNqvrs', $this->paginate());
		$this->set('_serialize', array('surveyNqvrs'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SurveyNqvr->exists($id)) {
			throw new NotFoundException(__('Invalid survey nqvr'));
		}
		$options = array('conditions' => array('SurveyNqvr.' . $this->SurveyNqvr->primaryKey => $id));
		$this->set('surveyNqvr', $this->SurveyNqvr->find('first', $options));
		$this->set('_serialize', array('surveyNqvr'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SurveyNqvr->create();
			if ($this->SurveyNqvr->save($this->request->data)) {
				$this->Session->setFlash(__('The survey nqvr has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey nqvr could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SurveyNqvr->exists($id)) {
			throw new NotFoundException(__('Invalid survey nqvr'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SurveyNqvr->save($this->request->data)) {
				$this->Session->setFlash(__('The survey nqvr has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey nqvr could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SurveyNqvr.' . $this->SurveyNqvr->primaryKey => $id));
			$this->request->data = $this->SurveyNqvr->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SurveyNqvr->id = $id;
		if (!$this->SurveyNqvr->exists()) {
			throw new NotFoundException(__('Invalid survey nqvr'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SurveyNqvr->delete()) {
			$this->Session->setFlash(__('Survey nqvr deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey nqvr was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function report(){
		$this->set('report', $this->SurveyNqvr->report());
		$this->set('_serialize', array('report'));
	}
}

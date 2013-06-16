<?php
App::uses('AppController', 'Controller');
/**
 * SurveyPmas Controller
 *
 * @property SurveyPma $SurveyPma
 */
class SurveyPmasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SurveyPma->recursive = 0;
		$this->set('surveyPmas', $this->paginate());
		$this->set('_serialize', array('surveyPmas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SurveyPma->exists($id)) {
			throw new NotFoundException(__('Invalid survey pma'));
		}
		$options = array('conditions' => array('SurveyPma.' . $this->SurveyPma->primaryKey => $id));
		$this->set('surveyPma', $this->SurveyPma->find('first', $options));
		$this->set('_serialize', array('surveyPma'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SurveyPma->create();
			if ($this->SurveyPma->save($this->request->data)) {
				$this->Session->setFlash(__('The survey pma has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey pma could not be saved. Please, try again.'));
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
		if (!$this->SurveyPma->exists($id)) {
			throw new NotFoundException(__('Invalid survey pma'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SurveyPma->save($this->request->data)) {
				$this->Session->setFlash(__('The survey pma has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey pma could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SurveyPma.' . $this->SurveyPma->primaryKey => $id));
			$this->request->data = $this->SurveyPma->find('first', $options);
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
		$this->SurveyPma->id = $id;
		if (!$this->SurveyPma->exists()) {
			throw new NotFoundException(__('Invalid survey pma'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SurveyPma->delete()) {
			$this->Session->setFlash(__('Survey pma deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey pma was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

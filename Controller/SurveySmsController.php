<?php
App::uses('AppController', 'Controller');
/**
 * SurveySms Controller
 *
 * @property SurveySm $SurveySm
 */
class SurveySmsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SurveySm->recursive = 0;
		$this->set('surveySms', $this->paginate());
    $this->set('_serialize', array('surveySms'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SurveySm->exists($id)) {
			throw new NotFoundException(__('Invalid survey sm'));
		}
		$options = array('conditions' => array('SurveySm.' . $this->SurveySm->primaryKey => $id));
		$this->set('surveySm', $this->SurveySm->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SurveySm->create();
			if ($this->SurveySm->save($this->request->data)) {
				$this->Session->setFlash(__('The survey sm has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey sm could not be saved. Please, try again.'));
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
		if (!$this->SurveySm->exists($id)) {
			throw new NotFoundException(__('Invalid survey sm'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SurveySm->save($this->request->data)) {
				$this->Session->setFlash(__('The survey sm has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey sm could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SurveySm.' . $this->SurveySm->primaryKey => $id));
			$this->request->data = $this->SurveySm->find('first', $options);
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
		$this->SurveySm->id = $id;
		if (!$this->SurveySm->exists()) {
			throw new NotFoundException(__('Invalid survey sm'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SurveySm->delete()) {
			$this->Session->setFlash(__('Survey sm deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey sm was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

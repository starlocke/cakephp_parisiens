<?php
App::uses('AppController', 'Controller');

class GeneratorController extends AppController {
	public $models = null;
	
	public function index(){
		//Configure::write('debug', 0);
		if ($this->request->is('post')) {
			if(empty($this->request->params['pass'][0])){
				return $this->redirect('/generator');
			}
			switch($this->request->params['pass'][0]){
				case 'nqvr':
					$this->Survey = ClassRegistry::init('SurveyNqvr', 'Model');
				break;
				case 'pma':
					$this->Survey = ClassRegistry::init('SurveyPma', 'Model');
				break;
				case 'sm':
					$this->Survey = ClassRegistry::init('SurveySm', 'Model');
				break;
				default:
					return $this->redirect('/generator');
				break;
			}
			for($i = 0; $i < 100; ++$i){
				$this->Survey->generate();
			}
			$this->Session->setFlash('Generated ' . $this->Survey->name);
			return $this->redirect('/generator');
	}
	}
}
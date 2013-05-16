<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}


	public $LOGIN_URL = 'https://portal.asav.org.br/Corpore.Net/Login.aspx';
	public $CONTEXT_URL = 'https://portal.asav.org.br/Corpore.Net/Source/Edu-Educacional/RM.EDU.CONTEXTO/EduSelecionarContextoModalWebForm.aspx?Qs=ShowMode%3d2%26SelectedMenuIDKey%3d';
	public $NOTAS_URL = 'https://portal.asav.org.br/Corpore.Net/Main.aspx?SelectedMenuIDKey=mnNotasEtapa&ActionID=EduNotaEtapaActionWeb';

	public function teste() {

		
		App::uses('SimpleHtmlDomBakedComponent', 'Controller/Component');

		$html = new SimpleHtmlDomBakedComponent();
		
		$h =& $this->HttpRequest;

		$h->setUri($this->LOGIN_URL);

		$r = $h->get();

		$html->load($r);

		$inputs = array();
		foreach ($html->find('input') as $input) {
			$inputs[$input->name] = $input->value;
		}

		$inputs['txtUser'] = 'vitorrs';
		$inputs['txtPass'] = 'vitor#vrs';
		$inputs['ddlAlias'] = 'CorporeRM';

		$h->setData($inputs);

		$pBody = $h->post();

		preg_match_all('/Set-Cookie: (.*)\b/', $pBody, $cookies);

		$cookies = $cookies[1];
		$h->setCookies($cookies);

		$info = $h->getInfo();

		$nextUrl = $info['redirect_url'];

		#$h->setUri($nextUrl);
		$h->setUri($this->CONTEXT_URL);

		$contextoE = $h->get();

		$html->load($contextoE);
		$radios = array();
		foreach ($html->find('input[type=radio]') as $radio) {
			$radios[][$radio->name] = $radio->value;
		}

		$inputs = array();
		foreach ($html->find('input[type=hidden]') as $input) {
			$inputs[$input->name] = $input->value;
		}

		$inputs['rdContexto'] = $radios[1]['rdContexto'];

		$h->setData($inputs);
		
		$pContextBody = $h->post();

		preg_match_all('/Set-Cookie: (.*)\b/', $pContextBody, $cookies2);
		foreach ($cookies2[1] as $cookie) {
			$cookies[] = $cookie;
		}

		$h->setCookies($cookies);

		$h->setUri($this->NOTAS_URL);
		$notasPage = $h->get();

		//die($notasPage);

		$html->load($notasPage);

		$table = $html->find('table[id=ctl23_xgvNotas_DXMainTable]',0);

		foreach ($table->find('tr[id^=ctl23_xgvNotas_DXDataRow]') as $k => $tr) {
			echo $tr->plaintext;
			echo '<br>';
		}

		die();
		die($table->plaintext);

	}
}

<?php
/**
 * ownCloud - ownnote
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Ben Curtis <ownclouddev@nosolutions.com>
 * @copyright Ben Curtis 2015
 */

namespace OCA\OwnNote\Controller;

use \OCP\AppFramework\ApiController;
use \OCP\IRequest;
use \OCA\OwnNote\Lib\Backend;

\OCP\App::checkAppEnabled('ownnote');



class OwnnoteApiController extends ApiController {

	private $backend;


	public function __construct($appName, IRequest $request, $userManager){
		parent::__construct($appName, $request);
		$this->backend = new Backend($userManager);
	}

	/**
	* MOBILE FUNCTIONS
	*/

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function index() {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		return $this->backend->getListing($FOLDER, false);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function mobileindex() {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		return $this->backend->getListing($FOLDER, true);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function remoteindex() {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		return json_encode($this->backend->getListing($FOLDER, true));
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function create($name, $group) {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		if (isset($name) && isset($group))
			return $this->backend->createNote($FOLDER, $name, $group);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function del($nid) {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		if (isset($nid))
			return $this->backend->deleteNote($FOLDER, $nid);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function edit($id) {
		if (isset($id)) {
			return $this->backend->editNote($id);
		}
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function save($id, $content) {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		if (isset($id) && isset($content))
			return $this->backend->saveNote($FOLDER, $id, $content, 0);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function ren($id, $newname, $newgroup) {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		if (isset($id) && isset($newname) && isset($newgroup))
			return $this->backend->renameNote($FOLDER, $id, $newname, $newgroup);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function delgroup($group) {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		if (isset($group))
			return $this->backend->deleteGroup($FOLDER, $group);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function rengroup($group, $newgroup) {
		$FOLDER = \OCP\Config::getAppValue('ownnote', 'folder', '');
		if (isset($group) && isset($newgroup))
			return $this->backend->renameGroup($FOLDER, $group, $newgroup);
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function version() {
		return $this->backend->getVersion();
	}
}

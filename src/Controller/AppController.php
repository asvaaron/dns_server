<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Http\Exception\BadRequestException;
use Cake\Validation\Validator;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }


    /**
     * Set Json responses for the controllers methods
     * @throws \Exception
     */
    protected function setJsonResponse(){
        $this->loadComponent('RequestHandler');
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');
    }

    public function validationDefault($attributes = null)
    {
        if (!$attributes) {
            return false;
        }
        $validator = new Validator();
        $validator ->requirePresence($attributes)
            ->notEmpty($attributes);
        return $validator;
    }

    /**
     * Standard error response
     *
     * @param string $msg message of the response
     *
     * @return \Cake\Http\Response
     *
     */
    public function error($msg, $status_code = 500){
        $body = $this->response->getBody();
        $data = json_encode([
            'status' => 'error',
            'message' => $msg,
        ]);
        $body->write($data);
        $this ->setJsonResponse();
        switch ($status_code){
            case 400: throw new BadRequestException($msg,400); // 400 Bad Request
            case 401: throw new BadRequestException($msg,401); // 500 Bad Request
            case 500: throw new BadRequestException($msg,500); // 500 Bad Request
        }
        return $this->response->withStatus(500); // use this line also 'application/json');
    }

}

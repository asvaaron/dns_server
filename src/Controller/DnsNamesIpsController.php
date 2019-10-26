<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use App\Model\Table\DnsNamesIpv4sTable;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;


/**
 * DnsNamesIps Controller
 *
 *
 * @method \App\Model\Entity\DnsNamesIp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class DnsNamesIpsController extends AppController
{


    /**
     * Method for adding multiple dns in the database
     * it validates if it's possible to isert the paramets
     * properly
     *
     * @return \Cake\Http\Response
     */
    public function addMultipleDns()
    {
        // Add possible atrributes the request can reiceive
        $attributes = ['dns_list'];
        $validator = $this->validationDefault($attributes);
        $data = $this->request->getData();
        $dnsTable = TableRegistry::getTableLocator()->get('DnsNamesIpv4s');

        if ($validator->errors($data))
            return $this->error('error.validation', 401);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            foreach ($data["dns_list"] as $key => $value) {
                $validatorDns = $dnsTable->validateDnsData();
                if ($validatorDns->errors($data["dns_list"][$key]))
                    $data["dns_list"][$key]['added'] = 0;
                else {
                    $dnsnameip4v = $dnsTable->newEntity();
                    $dnsnameip4v->domain_name = $data["dns_list"][$key]['domain'];
                    $dnsnameip4v->ip_address = $data["dns_list"][$key]['ip_address'];
                    $dnsnameip4v->created_at = date('Y-m-d H:i:s');
                    $dnsnameip4v->modified_at = date('Y-m-d H:i:s');

                    try {
                        $dnsTable->save($dnsnameip4v);
                        $data["dns_list"][$key]['added'] = 1;
                    } catch (\Exception $e) {
                        $data["dns_list"][$key]['added'] = 0;
                    }

                }

                try {
                    $this->setJsonResponse();
                } catch (\Exception $e) {
                }
                $this->set(['result' => $data, '_serialize' => 'result']);
            }
        }
    }
}

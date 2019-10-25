<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

/**
 * DnsNamesIpv4s Controller
 *
 * @property \App\Model\Table\DnsNamesIpv4sTable $DnsNamesIpv4s
 *
 * @method \App\Model\Entity\DnsNamesIpv4[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DnsNamesIpv4sController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $dnsNamesIpv4s = $this->paginate($this->DnsNamesIpv4s);

        $this->set(compact('dnsNamesIpv4s'));
    }

    /**
     * View method
     *
     * @param string|null $id Dns Names Ipv4 id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dnsNamesIpv4 = $this->DnsNamesIpv4s->get($id, [
            'contain' => []
        ]);

        $this->set('dnsNamesIpv4', $dnsNamesIpv4);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dnsNamesIpv4 = $this->DnsNamesIpv4s->newEntity();
        if ($this->request->is('post')) {
            $dnsNamesIpv4 = $this->DnsNamesIpv4s->patchEntity($dnsNamesIpv4, $this->request->getData());
            if ($this->DnsNamesIpv4s->save($dnsNamesIpv4)) {
                $this->Flash->success(__('The dns names ipv4 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns names ipv4 could not be saved. Please, try again.'));
        }
        $this->set(compact('dnsNamesIpv4'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dns Names Ipv4 id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dnsNamesIpv4 = $this->DnsNamesIpv4s->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dnsNamesIpv4 = $this->DnsNamesIpv4s->patchEntity($dnsNamesIpv4, $this->request->getData());
            if ($this->DnsNamesIpv4s->save($dnsNamesIpv4)) {
                $this->Flash->success(__('The dns names ipv4 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns names ipv4 could not be saved. Please, try again.'));
        }
        $this->set(compact('dnsNamesIpv4'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dns Names Ipv4 id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dnsNamesIpv4 = $this->DnsNamesIpv4s->get($id);
        if ($this->DnsNamesIpv4s->delete($dnsNamesIpv4)) {
            $this->Flash->success(__('The dns names ipv4 has been deleted.'));
        } else {
            $this->Flash->error(__('The dns names ipv4 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }




    public function validateDnsData(){
        $validator = new Validator();
        $validator
            ->ipv4('ip_address', 'Please enter ip address')
            ->requirePresence('ip_address')
            ->notEmpty('ip_address')
            ->requirePresence('domain')
            ->notEmpty('domain');
        return $validator;

    }

    public function addMultipleDns(){
        // Add possible atrributes the request can reiceive
        $attributes = ['dns_list'];
        $validator = $this->validationDefault($attributes);
        $data = $this->request->getData();
        if ($validator->errors($data))
            return $this->error( 'error.validation', 401);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            foreach ($data["dns_list"] as $key=>$value){
                $validatorDns = $this->validateDnsData();
                if ($validatorDns->errors($data["dns_list"][$key]))
                    $data["dns_list"][$key]['added'] = 0;
                else
                    $data["dns_list"][$key]['added'] = 1;
            }

            try {
                $this->setJsonResponse();
            } catch (\Exception $e) {
            }
            $this->set(['result' => $data, '_serialize' => 'result']);
        }
    }
}

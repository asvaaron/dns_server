<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DnsNames Controller
 *
 * @property \App\Model\Table\DnsNamesTable $DnsNames
 *
 * @method \App\Model\Entity\DnsName[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DnsNamesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $dnsNames = $this->paginate($this->DnsNames);

        $this->set(compact('dnsNames'));
    }

    /**
     * View method
     *
     * @param string|null $id Dns Name id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dnsName = $this->DnsNames->get($id, [
            'contain' => []
        ]);

        $this->set('dnsName', $dnsName);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dnsName = $this->DnsNames->newEntity();
        if ($this->request->is('post')) {
            $dnsName = $this->DnsNames->patchEntity($dnsName, $this->request->getData());
            if ($this->DnsNames->save($dnsName)) {
                $this->Flash->success(__('The dns name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns name could not be saved. Please, try again.'));
        }
        $this->set(compact('dnsName'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dns Name id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dnsName = $this->DnsNames->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dnsName = $this->DnsNames->patchEntity($dnsName, $this->request->getData());
            if ($this->DnsNames->save($dnsName)) {
                $this->Flash->success(__('The dns name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns name could not be saved. Please, try again.'));
        }
        $this->set(compact('dnsName'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dns Name id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dnsName = $this->DnsNames->get($id);
        if ($this->DnsNames->delete($dnsName)) {
            $this->Flash->success(__('The dns name has been deleted.'));
        } else {
            $this->Flash->error(__('The dns name could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comprovante Controller
 *
 * @property \App\Model\Table\ComprovanteTable $Comprovante
 */
class ComprovanteController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $comprovante = $this->paginate($this->Comprovante);

        $this->set(compact('comprovante'));
        $this->set('_serialize', ['comprovante']);
    }

    /**
     * View method
     *
     * @param string|null $id Comprovante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comprovante = $this->Comprovante->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('comprovante', $comprovante);
        $this->set('_serialize', ['comprovante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comprovante = $this->Comprovante->newEntity();
        if ($this->request->is('post')) {
            $comprovante = $this->Comprovante->patchEntity($comprovante, $this->request->getData());
            if ($this->Comprovante->save($comprovante)) {
                $this->Flash->success(__('The comprovante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comprovante could not be saved. Please, try again.'));
        }
        $users = $this->Comprovante->Users->find('list', ['limit' => 200]);
        $this->set(compact('comprovante', 'users'));
        $this->set('_serialize', ['comprovante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comprovante id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comprovante = $this->Comprovante->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comprovante = $this->Comprovante->patchEntity($comprovante, $this->request->getData());
            if ($this->Comprovante->save($comprovante)) {
                $this->Flash->success(__('The comprovante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comprovante could not be saved. Please, try again.'));
        }
        $users = $this->Comprovante->Users->find('list', ['limit' => 200]);
        $this->set(compact('comprovante', 'users'));
        $this->set('_serialize', ['comprovante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comprovante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comprovante = $this->Comprovante->get($id);
        if ($this->Comprovante->delete($comprovante)) {
            $this->Flash->success(__('The comprovante has been deleted.'));
        } else {
            $this->Flash->error(__('The comprovante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

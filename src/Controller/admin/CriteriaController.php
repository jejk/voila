<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Criteria Controller
 *
 * @property \App\Model\Table\CriteriaTable $Criteria
 */
class CriteriaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $criteria = $this->paginate($this->Criteria);

        $this->set(compact('criteria'));
        $this->set('_serialize', ['criteria']);
    }

    /**
     * View method
     *
     * @param string|null $id Criterion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $criterion = $this->Criteria->get($id, [
            'contain' => ['Demo']
        ]);

        $this->set('criterion', $criterion);
        $this->set('_serialize', ['criterion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $criterion = $this->Criteria->newEntity();
        if ($this->request->is('post')) {
            $criterion = $this->Criteria->patchEntity($criterion, $this->request->data);
            if ($this->Criteria->save($criterion)) {
                $this->Flash->success(__('The criterion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The criterion could not be saved. Please, try again.'));
            }
        }
        $demo = $this->Criteria->Demo->find('list', ['limit' => 200]);
        $this->set(compact('criterion', 'demo'));
        $this->set('_serialize', ['criterion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Criterion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $criterion = $this->Criteria->get($id, [
            'contain' => ['Demo']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $criterion = $this->Criteria->patchEntity($criterion, $this->request->data);
            if ($this->Criteria->save($criterion)) {
                $this->Flash->success(__('The criterion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The criterion could not be saved. Please, try again.'));
            }
        }
        $demo = $this->Criteria->Demo->find('list', ['limit' => 200]);
        $this->set(compact('criterion', 'demo'));
        $this->set('_serialize', ['criterion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Criterion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $criterion = $this->Criteria->get($id);
        if ($this->Criteria->delete($criterion)) {
            $this->Flash->success(__('The criterion has been deleted.'));
        } else {
            $this->Flash->error(__('The criterion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

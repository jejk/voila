<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Demo Controller
 *
 * @property \App\Model\Table\DemoTable $Demo
 */
class DemoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Artists']
        ];
        $demo = $this->paginate($this->Demo);

        $this->set(compact('demo'));
        $this->set('_serialize', ['demo']);
    }

    /**
     * View method
     *
     * @param string|null $id Demo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $demo = $this->Demo->get($id, [
            'contain' => ['Artists', 'Criteria']
        ]);

        $this->set('demo', $demo);
        $this->set('_serialize', ['demo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $demo = $this->Demo->newEntity();
        if ($this->request->is('post')) {
            $demo = $this->Demo->patchEntity($demo, $this->request->data);
            if ($this->Demo->save($demo)) {
                $this->Flash->success(__('The demo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The demo could not be saved. Please, try again.'));
            }
        }
        $artists = $this->Demo->Artists->find('list', ['limit' => 200]);
        $criteria = $this->Demo->Criteria->find('list', ['limit' => 200]);
        $this->set(compact('demo', 'artists', 'criteria'));
        $this->set('_serialize', ['demo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Demo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $demo = $this->Demo->get($id, [
            'contain' => ['Criteria']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $demo = $this->Demo->patchEntity($demo, $this->request->data);
            if ($this->Demo->save($demo)) {
                $this->Flash->success(__('The demo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The demo could not be saved. Please, try again.'));
            }
        }
        $artists = $this->Demo->Artists->find('list', ['limit' => 200]);
        $criteria = $this->Demo->Criteria->find('list', ['limit' => 200]);
        $this->set(compact('demo', 'artists', 'criteria'));
        $this->set('_serialize', ['demo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Demo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $demo = $this->Demo->get($id);
        if ($this->Demo->delete($demo)) {
            $this->Flash->success(__('The demo has been deleted.'));
        } else {
            $this->Flash->error(__('The demo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

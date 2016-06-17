<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CriteriaDemos Controller
 *
 * @property \App\Model\Table\CriteriaDemosTable $CriteriaDemos
 */
class CriteriaDemosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Demos', 'Criteria', 'Artists']
        ];
        $criteriaDemos = $this->paginate($this->CriteriaDemos);

        $this->set(compact('criteriaDemos'));
        $this->set('_serialize', ['criteriaDemos']);
    }

    /**
     * View method
     *
     * @param string|null $id Criteria Demo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $criteriaDemo = $this->CriteriaDemos->get($id, [
            'contain' => ['Demos', 'Criteria', 'Artists']
        ]);

        $this->set('criteriaDemo', $criteriaDemo);
        $this->set('_serialize', ['criteriaDemo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $criteriaDemo = $this->CriteriaDemos->newEntity();
        if ($this->request->is('post')) {
            $criteriaDemo = $this->CriteriaDemos->patchEntity($criteriaDemo, $this->request->data);
            if ($this->CriteriaDemos->save($criteriaDemo)) {
                $this->Flash->success(__('The criteria demo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The criteria demo could not be saved. Please, try again.'));
            }
        }
        $demos = $this->CriteriaDemos->Demos->find('list', ['limit' => 200]);
        $criteria = $this->CriteriaDemos->Criteria->find('list', ['limit' => 200]);
        $artists = $this->CriteriaDemos->Artists->find('list', ['limit' => 200]);
        $this->set(compact('criteriaDemo', 'demos', 'criteria', 'artists'));
        $this->set('_serialize', ['criteriaDemo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Criteria Demo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $criteriaDemo = $this->CriteriaDemos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $criteriaDemo = $this->CriteriaDemos->patchEntity($criteriaDemo, $this->request->data);
            if ($this->CriteriaDemos->save($criteriaDemo)) {
                $this->Flash->success(__('The criteria demo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The criteria demo could not be saved. Please, try again.'));
            }
        }
        $demos = $this->CriteriaDemos->Demos->find('list', ['limit' => 200]);
        $criteria = $this->CriteriaDemos->Criteria->find('list', ['limit' => 200]);
        $artists = $this->CriteriaDemos->Artists->find('list', ['limit' => 200]);
        $this->set(compact('criteriaDemo', 'demos', 'criteria', 'artists'));
        $this->set('_serialize', ['criteriaDemo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Criteria Demo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $criteriaDemo = $this->CriteriaDemos->get($id);
        if ($this->CriteriaDemos->delete($criteriaDemo)) {
            $this->Flash->success(__('The criteria demo has been deleted.'));
        } else {
            $this->Flash->error(__('The criteria demo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

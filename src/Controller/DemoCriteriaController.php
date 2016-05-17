<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DemoCriteria Controller
 *
 * @property \App\Model\Table\DemoCriteriaTable $DemoCriteria
 */
class DemoCriteriaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Demos', 'Criterias', 'Artists', 'Demo', 'Criteria']
        ];
        $demoCriteria = $this->paginate($this->DemoCriteria);

        $this->set(compact('demoCriteria'));
        $this->set('_serialize', ['demoCriteria']);
    }

    /**
     * View method
     *
     * @param string|null $id Demo Criterium id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $demoCriterium = $this->DemoCriteria->get($id, [
            'contain' => ['Demos', 'Criterias', 'Artists', 'Demo', 'Criteria']
        ]);

        $this->set('demoCriterium', $demoCriterium);
        $this->set('_serialize', ['demoCriterium']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $demoCriterium = $this->DemoCriteria->newEntity();
        if ($this->request->is('post')) {
            $demoCriterium = $this->DemoCriteria->patchEntity($demoCriterium, $this->request->data);
            if ($this->DemoCriteria->save($demoCriterium)) {
                $this->Flash->success(__('The demo criterium has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The demo criterium could not be saved. Please, try again.'));
            }
        }
        $demos = $this->DemoCriteria->Demos->find('list', ['limit' => 200]);
        $criterias = $this->DemoCriteria->Criterias->find('list', ['limit' => 200]);
        $artists = $this->DemoCriteria->Artists->find('list', ['limit' => 200]);
        $demo = $this->DemoCriteria->Demo->find('list', ['limit' => 200]);
        $criteria = $this->DemoCriteria->Criteria->find('list', ['limit' => 200]);
        $this->set(compact('demoCriterium', 'demos', 'criterias', 'artists', 'demo', 'criteria'));
        $this->set('_serialize', ['demoCriterium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Demo Criterium id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $demoCriterium = $this->DemoCriteria->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $demoCriterium = $this->DemoCriteria->patchEntity($demoCriterium, $this->request->data);
            if ($this->DemoCriteria->save($demoCriterium)) {
                $this->Flash->success(__('The demo criterium has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The demo criterium could not be saved. Please, try again.'));
            }
        }
        $demos = $this->DemoCriteria->Demos->find('list', ['limit' => 200]);
        $criterias = $this->DemoCriteria->Criterias->find('list', ['limit' => 200]);
        $artists = $this->DemoCriteria->Artists->find('list', ['limit' => 200]);
        $demo = $this->DemoCriteria->Demo->find('list', ['limit' => 200]);
        $criteria = $this->DemoCriteria->Criteria->find('list', ['limit' => 200]);
        $this->set(compact('demoCriterium', 'demos', 'criterias', 'artists', 'demo', 'criteria'));
        $this->set('_serialize', ['demoCriterium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Demo Criterium id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $demoCriterium = $this->DemoCriteria->get($id);
        if ($this->DemoCriteria->delete($demoCriterium)) {
            $this->Flash->success(__('The demo criterium has been deleted.'));
        } else {
            $this->Flash->error(__('The demo criterium could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

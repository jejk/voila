<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\I18n\I18n;
/**
 * Administrators Controller
 *
 * @property \App\Model\Table\AdministratorsTable $Administrators
 */
class AdministratorsController extends AppController
{
	


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $administrators = $this->paginate($this->Administrators);

        $this->set(compact('administrators'));
        $this->set('_serialize', ['administrators']);
    }

    /**
     * View method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrator = $this->Administrators->get($id, [
            'contain' => []
        ]);

        $this->set('administrator', $administrator);
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrator = $this->Administrators->newEntity();
        if ($this->request->is('post')) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->data);
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('administrator'));
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrator = $this->Administrators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->data);
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('administrator'));
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrator = $this->Administrators->get($id);
        if ($this->Administrators->delete($administrator)) {
            $this->Flash->success(__('The administrator has been deleted.'));
        } else {
            $this->Flash->error(__('The administrator could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

	public function login()
	{
	    if ($this->request->is('post')) {
	    	
			//exit(var_dump($this->Auth));
			$administrator= $this->Auth->identify();
			//exit(var_dump($user));
	        if ($administrator) {
	            $this->Auth->setUser($administrator);
	            return $this->redirect($this->Auth->redirectUrl());
	        } else {
	            $this->Flash->error(__('Nom utilisateur ou mot de passe incorrect'), [
	                'key' => 'auth'
	            ]);
	        }
	    }
	}
	
	public function logout()
	{
	    return $this->redirect($this->Auth->logout());
	}}

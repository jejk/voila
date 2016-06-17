<?php
namespace App\Controller\Voilartists;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Artists Controller
 *
 * @property \App\Model\Table\ArtistsTable $Artists
 */
class ArtistsController extends AppController
{
	
		public function beforeFilter(Event $event)
    {
      //  $this->Security->config('unlockedActions', ['edit']);
        $this->Security->unlockedFields = array('password1','password2');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Agencies']
        ];
        $artists = $this->paginate($this->Artists);

        $this->set(compact('artists'));
        $this->set('_serialize', ['artists']);
    }

    /**
     * View method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artist = $this->Artists->get($id, [
            'contain' => ['Agencies', 'Criteria', 'Demos']
        ]);

        $this->set('artist', $artist);
        $this->set('_serialize', ['artist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artist = $this->Artists->newEntity();
        if ($this->request->is('post')) {
            $artist = $this->Artists->patchEntity($artist, $this->request->data);
			//pr( $artist);die();
            if ($this->Artists->save($artist)) {
                $this->Flash->success(__('The artist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The artist could not be saved. Please, try again.'));
            }
        }
        $agencies = $this->Artists->Agencies->find('list', ['limit' => 200]);
        $criteria = $this->Artists->Criteria->find('list', ['limit' => 200]);
        $this->set(compact('artist', 'agencies', 'criteria'));
        $this->set('_serialize', ['artist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artist = $this->Artists->get($this->Auth->user('id'), [
            'contain' => ['Criteria']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
			
            $artist = $this->Artists->patchEntity($artist, $this->request->data);
            if ($this->Artists->save($artist)) {
                $this->Flash->success(__('The artist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The artist could not be saved. Please, try again.'));
            }
        }
        $agencies = $this->Artists->Agencies->find('list', ['limit' => 200]);
        $criteria = $this->Artists->Criteria->find('list', ['limit' => 200]);
				$demos = $this->Artists->Demos->find('all', [
		    'conditions' => ['Demos.artist_id ' => $id],
		    'order' => ['Demos.sort_order' => 'ASC'] 
		]);
		//debug($demos->toArray());
		//exit(pr($demos));
		//$entitydemo = $demos->newEntity($this->request->data());
        $this->set(compact('artist', 'agencies', 'criteria','demos'));
        $this->set('_serialize', ['artist']);
		//$this->set('_serialize', ['demos']);
		
    }

    /**
     * Delete method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artist = $this->Artists->get($id);
        if ($this->Artists->delete($artist)) {
            $this->Flash->success(__('The artist has been deleted.'));
        } else {
            $this->Flash->error(__('The artist could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }





	public function login()
	{
	    if ($this->request->is('post')) {
	    	
			//exit(var_dump($this->Auth));
			$artist= $this->Auth->identify();
			//exit(var_dump($user));
	        if ($artist) {
	            $this->Auth->setUser($artist);
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

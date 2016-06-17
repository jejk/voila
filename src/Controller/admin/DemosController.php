<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Demo Controller
 *
 * @property \App\Model\Table\DemoTable $Demo
 */
class DemosController extends AppController
{
	
	public function beforeFilter(Event $event)
    {
         $this->Security->config('unlockedActions', ['saveorder']);
    }

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
        $demos = $this->paginate($this->Demos);

        $this->set(compact('demos'));
        $this->set('_serialize', ['demos']);
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
        $demo = $this->Demos->get($id, [
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
        $demo = $this->Demos->newEntity();
        if ($this->request->is('post')) {
        	
            $demo = $this->Demos->patchEntity($demo, $this->request->data);
			
            if ($this->Demos->save($demo)) {
                $this->Flash->success(__('The demo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The demo could not be saved. Please, try again.'));
            }
        }
        $artists = $this->Demos->Artists->find('list', ['limit' => 200]);
        $criteria = $this->Demos->Criteria->find('list', ['limit' => 200]);
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
        $demo = $this->Demos->get($id, [
            'contain' => ['Criteria']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
			//unset($this->request->data['criteria']['_ids']);
			foreach ($this->request->data['criteria']['_ids'] as $key => $value) {
				
				$this->request->data['criteria'][$key]['_joinData']['artist_id'] = $this->request->data['artist_id'];
				$this->request->data['criteria'][$key]['id'] = $value;
				
			}

			
			unset($this->request->data['criteria']['_ids']);
			//pr($this->request->data);die();
			//pr($this->request->data['criteria']);die();
            $demo = $this->Demos->patchEntity($demo, $this->request->data);
			//pr($demo->toArray());die();
            if ($this->Demos->save($demo)) {
                $this->Flash->success(__('The demo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The demo could not be saved. Please, try again.'));
            }
        }
        $artists = $this->Demos->Artists->find('list', ['limit' => 200]);
        $criteria = $this->Demos->Criteria->find('list', ['limit' => 200]);
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
        $demo = $this->Demos->get($id);
        if ($this->Demos->delete($demo)) {
            $this->Flash->success(__('The demo has been deleted.'));
        } else {
            $this->Flash->error(__('The demo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	 /**
     * Order demo method
     *
     */
	public function saveorder() {
		
	     
	        if ($this->request->is('post'))
	        {
	           // $this->request->data['order'] = '5,6,7';
	            $ids = explode(",", $this->request->data['order']);
				
				
	           // print_r($ids); die;
	            /* run the update query for each id */
	            foreach ($ids as $index => $id) {
	                if (isset($id) && !empty($id)) {
	                  //  $query = 'UPDATE demos SET order = ' . ($index + 1) . ' WHERE id = ' . $id;
	                    //$result = mysql_query($query) or die(mysql_error() . ': ' . $query);
	                    $data['id'] = $id;
	                    $data['order'] = $index + 1;
						  //pr($data['id']);
	                     $updateDemo = $this->Demos->get($data['id']);
						 $updateDemo->sort_order=$data['order'];
					 //pr($updateDemo);
						 
						 $this->Demos->save($updateDemo);
	                }
	            }
	            die;
	        }
	    }
	
	
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Event\Event;


/**
 * Demos Controller
 *
 * @property \App\Model\Table\DemosTable $Demos
 */
class DemosController extends AppController
{
	
	
	public function beforeFilter(Event $event)
    {
         $this->Security->config('unlockedActions', ['saveorder','searchData','searchDataTxt']);
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
        	foreach ($this->request->data['criteria']['_ids'] as $key => $value) {
				
				$this->request->data['criteria'][$key]['_joinData']['artist_id'] = $this->request->data['artist_id'];
				$this->request->data['criteria'][$key]['id'] = $value;
				
			}

			
			unset($this->request->data['criteria']['_ids']);
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

	public function saveorder() {
		
	     //   $this->layout = null;
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
					// pr($updateDemo);
						 
						$this->Demos->save($updateDemo);
						
	                }
	            }
	            die;
	        }
	    }
	
	public function search(){
	}
	
	public function searchData(){
		



		
		/*
		 * 
		 * 

return $this->find()
                ->select([
                    'Property.id', 'Property.company_id', 'Property.address1', 'Property.address2', 
                    'Property.address3','Property.postcode',  
                ])
                ->contain([                    
                    'Tenancies' => function($q) {
                        return $q
                            ->select([
                                'Tenancies.id','Tenancies.property_id','Tenancies.created',
                                'Tenancies.stage', 
                            ])
                            ->contain([
                                'Tenants' => function($q) {
                                    return $q
                                        ->select([
                                            'Tenants.id', 'Tenants.stage', 'Tenants.tenancy_id', 'Tenants.holding_fee',
                                        ])
                                        ->where([
                                            'active = 1',
                                        ]);
                                    }
                            ])
                            ->contain([
                                'Tenants'  
                            ])
                            ->where([
                                'Tenancies.active = 1',
                            ]);
                    }
                ])
                ->where(['Property.active = 1', $conditions])
                ->toArray();

		 * 
		 * 
		 * */
		//$this -> viewBuilder()->layout = 'ajax';
		//$this -> autoRender = false;
		//$this->layout = null ;
	//	$conditions_list = '';
		if($this->request->is('post')){
			
			
			//Condition for criteria
			$dataset=$this->request->data;
			//pr($dataset);die();
			
		   if(!empty($dataset)){
		   		$nbcriteria = 0;
				$conditions = array();
				$conditions[]='Criteria.id IN';
			  $conditionsnb = array();
			  
			foreach ($dataset as $key => $value) {
				
				if($value == 1){
					$conditionsnb[] = $key;

					$nbcriteria++;
				}
				
			}
			
			
			//Condition for artists
			
			
			
			//pr($conditions_list);die();
			
			//$conditions_list= implode(",", $conditions);
		   	
		     // $data=$this->request->data;
		      // Generating options
		   //  $conditions = 'Demos.id = 4';
		      //$result = $this->Demos->find('all',['contain' => ['Artists'],'select'=>'id']);// "$options" is generated options
		      
		      $this->viewBuilder()->layout = null;

				$result = $this->Demos->find()
	                ->select([
	                     'Demos.title', 'Demos.id','Demos.artist_id'    
	                ])
					//->distinct(['Demos.artist_id'])
	                ->contain([                    
	                    'Artists' => function($q) {
	                        return $q
	                            ->select([
	                                'Artists.id','Artists.email', 
	                            ]);
								//->where(['Artists.email = "sdf@ggg.comggg"']);
	                    }
					])
				->contain([                    
	                    'Criteria' => function($q) {
	                        return $q
	                            ->select([
	                                'Criteria.title','Criteria.id'
	                            ]);
	                            //->where(['Criteria.id = 170']);
	                    }
	                ])
	                ->where(['Demos.active = 1'])
					//->matching('CriteriaDemos', function ($q) {return $q->where(['CriteriaDemos.criterion_id' => 152]);})
					->matching('Criteria', function ($q) use ($conditions,$nbcriteria,$conditionsnb)  {return $q->where([$conditions[0]=>$conditionsnb]);})
					//->matching('Artists', function ($q) use ($conditions,$nbcriteria) {return $q->where(['Artists.id' => 8]);})
					->group('Demos.id')
					->having([ $this->Demos->query()->newExpr('COUNT(DISTINCT Criteria.id) >= '.($nbcriteria))])
					->orderDesc('COUNT(Criteria.id)')
					->distinct(['Artists.id'])
	                ->toArray();
					
					//pr($conditions_list);die();
					
               // ->where(['Demo.active = 1', $conditions])
               // ->toArray();

		      
		       $this->RequestHandler->renderAs($this, 'json');
			   $this->response->type('application/json');
				//echo $result;
			    
		    $this->set('data', $result);
			//foreach ($result  as $article) {
			   // debug($article);
			//}
			   $this->set('_serialize', 'data');


				
			}
			}
			}



public function searchDataTxt(){
		



		if($this->request->is('post')){
			
			
			//Condition for criteria
			$dataset=$this->request->data;
			//pr($dataset['searchtxt']);die();
			
		   
			
			
			
		      
		      $this->viewBuilder()->layout = null;

				$result = $this->Demos->find()
	                ->select([
	                     'Demos.title', 'Demos.id','Demos.artist_id'    
	                ])
					//->distinct(['Demos.artist_id'])
	                ->contain([                    
	                    'Artists' => function($q) {
	                        return $q
	                            ->select([
	                                'Artists.id','Artists.email','Artists.first_name','Artists.last_name', 
	                            ])
								//->where(['Artists.email = "sdf@ggg.comggg"']);
													->contain([                    
		                    'Agencies' => function($q) {
		                        return $q
		                            ->select([
		                                'Agencies.id','Agencies.title', 
		                            ]);
									//->where(['Artists.email = "sdf@ggg.comggg"']);
		                    }
						]);
	                    }
					])
				->contain([                    
	                    'Criteria' => function($q) {
	                        return $q
	                            ->select([
	                                'Criteria.title','Criteria.id'
	                            ]);
	                            //->where(['Criteria.id = 170']);
	                    }
	                ])
	                ->where(['Demos.active = 1'])
					->where("MATCH(Demos.title,Demos.customer,Artists.first_name,Artists.last_name,Agencies.title) AGAINST(:search IN BOOLEAN MODE)")
					
					->bind(':search', $dataset['searchtxt'])

					->distinct(['Artists.id'])
	                ->toArray();
					
					//pr($conditions_list);die();
					
               // ->where(['Demo.active = 1', $conditions])
               // ->toArray();

		      
		       $this->RequestHandler->renderAs($this, 'json');
			   $this->response->type('application/json');
				//echo $result;
			    
		    $this->set('data', $result);
			//foreach ($result  as $article) {
			   // debug($article);
			//}
			   $this->set('_serialize', 'data');


				
			
			}
			}


public function searchDataTest(){
		



		
		/*
		 * 
		 * 

return $this->find()
                ->select([
                    'Property.id', 'Property.company_id', 'Property.address1', 'Property.address2', 
                    'Property.address3','Property.postcode',  
                ])
                ->contain([                    
                    'Tenancies' => function($q) {
                        return $q
                            ->select([
                                'Tenancies.id','Tenancies.property_id','Tenancies.created',
                                'Tenancies.stage', 
                            ])
                            ->contain([
                                'Tenants' => function($q) {
                                    return $q
                                        ->select([
                                            'Tenants.id', 'Tenants.stage', 'Tenants.tenancy_id', 'Tenants.holding_fee',
                                        ])
                                        ->where([
                                            'active = 1',
                                        ]);
                                    }
                            ])
                            ->contain([
                                'Tenants'  
                            ])
                            ->where([
                                'Tenancies.active = 1',
                            ]);
                    }
                ])
                ->where(['Property.active = 1', $conditions])
                ->toArray();

		 * 
		 * 
		 * */
		//$this -> viewBuilder()->layout = 'ajax';
		//$this -> autoRender = false;
		//$this->layout = null ;
		//$conditions_list = array(1=>1);
 
			
			//$dataset=$this->request->data;
			$dataset=array();
			$dataset[170]=1;
			$dataset[171]=1;
			//pr($data);die();
			$nbcriteria = 0;
			  $conditions = array();
				$conditions[]='Criteria.id IN';
				//$conditions[0] = array();
			  /* $conditions_list[] = '153';
			   $conditions_list[] = '152';
			   $conditions_list[] = '161';*/
			   //$conditions_list = "'153','152','161'";
			  // $conditions_list = "";
			  $conditionsnb = array();
			foreach ($dataset as $key => $value) {
				//pr($dataset );
				if($value == 1){
					 $conditionsnb[] = $key;
					//$conditions_list = "'153','152','161'";
					$nbcriteria++;
				}
				
			}
			//$conditions_list = "'153','152','161'";
			//pr( $conditionsnb);die();
		   	
		     // $data=$this->request->data;
		      // Generating options
		   //  $conditions = 'Demos.id = 4';
		      //$result = $this->Demos->find('all',['contain' => ['Artists'],'select'=>'id']);// "$options" is generated options
		      
		      $this->viewBuilder()->layout = null;

				$result = $this->Demos->find()
	                ->select([
	                     'Demos.title', 'Demos.id','Demos.artist_id'    
	                ])
					//->distinct(['Demos.artist_id'])
	                ->contain([                    
	                    'Artists' => function($q) {
	                        return $q
	                            ->select([
	                                'Artists.id','Artists.email','Artists.first_name', 
	                            ]);
								//->where(['Artists.email = "sdf@ggg.comggg"']);
	                    }
					])
					->contain([                    
	                    'Criteria' => function($q) {
	                        return $q
	                            ->select([
	                                'Criteria.title','Criteria.id'
	                            ]);
	                            //->where(['Criteria.id = 170']);
	                    }
	                ])
	               /* ->contain([                    
	                    'CriteriaDemos' => function($q) {
	                        return $q
	                            ->select([
	                                'CriteriaDemos.id'
	                            ]);
	                            //->where(['Criteria.id = 170']);
	                    }
	                ])*/
	                
					 //->where(['Demos.active = 1'])
					//->matching('CriteriaDemos', function ($q) {return $q->where(['CriteriaDemos.criterion_id' => 152]);})
										//->where("MATCH(Demos.title) AGAINST(:search IN BOOLEAN MODE)")
					->where("MATCH(Artists.first_name) AGAINST(:search IN BOOLEAN MODE)")
										//->bind(':search', $dataset['searchtxt'])
					->bind(':search', "asdasdasd")
	                ->toArray();
					
					//pr($conditions_list);die();
					
               // ->where(['Demo.active = 1', $conditions])
               // ->toArray();

		      
		       //$this->RequestHandler->renderAs($this, 'json');
			   //$this->response->type('application/json');
				//echo $result;
			    
		    $this->set('data', $result);
			
		/*	foreach ($result  as $article) {
    debug($article);
}*/
			    $this->set('_serialize', 'data');


				
					}
		


}

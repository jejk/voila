<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * I18nMessages Controller
 *
 * @property \App\Model\Table\I18nMessagesTable $I18nMessages
 */
class I18nMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $i18nMessages = $this->paginate($this->I18nMessages);

        $this->set(compact('i18nMessages'));
        $this->set('_serialize', ['i18nMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id I18n Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $i18nMessage = $this->I18nMessages->get($id, [
            'contain' => []
        ]);

        $this->set('i18nMessage', $i18nMessage);
        $this->set('_serialize', ['i18nMessage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $i18nMessage = $this->I18nMessages->newEntity();
        if ($this->request->is('post')) {
            $i18nMessage = $this->I18nMessages->patchEntity($i18nMessage, $this->request->data);
            if ($this->I18nMessages->save($i18nMessage)) {
                $this->Flash->success(__('The i18n message has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The i18n message could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('i18nMessage'));
        $this->set('_serialize', ['i18nMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id I18n Message id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $i18nMessage = $this->I18nMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $i18nMessage = $this->I18nMessages->patchEntity($i18nMessage, $this->request->data);
            if ($this->I18nMessages->save($i18nMessage)) {
                $this->Flash->success(__('The i18n message has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The i18n message could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('i18nMessage'));
        $this->set('_serialize', ['i18nMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id I18n Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $i18nMessage = $this->I18nMessages->get($id);
        if ($this->I18nMessages->delete($i18nMessage)) {
            $this->Flash->success(__('The i18n message has been deleted.'));
        } else {
            $this->Flash->error(__('The i18n message could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	/**
     * function to clear all cache data
     * by default accessible only for admin
     *
     * @access Public
     * @return void
     */
    public function clearcache() {
     //   Cache::clear();
       // clearcache();

        $files = array();
        //$files = array_merge($files, glob(CACHE . '*')); // remove cached css
       // $files = array_merge($files, glob(CACHE . 'css' . DS . '*')); // remove cached css
       // $files = array_merge($files, glob(CACHE . 'js' . DS . '*'));  // remove cached js           
       // $files = array_merge($files, glob(CACHE . 'models' . DS . '*'));  // remove cached models           
        $files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));  // remove cached persistent           

        foreach ($files as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }

        if(function_exists('apc_clear_cache')):      
        apc_clear_cache();
        apc_clear_cache('user');
        endif;

        $this->set(compact('files'));
        	   $this->RequestHandler->renderAs($this, 'json');
			   $this->response->type('application/json');
				//echo $result;
			    
		    $this->set('data', 'ok');
			//foreach ($result  as $article) {
			   // debug($article);
			//}
			   $this->set('_serialize', 'data');

    }
	
	
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BusinessOwner Controller
 *
 * @property \App\Model\Table\BusinessOwnerTable $BusinessOwner
 * @method \App\Model\Entity\BusinessOwner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessOwnerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $businessOwner = $this->paginate($this->BusinessOwner);

        $this->set(compact('businessOwner'));
    }

    /**
     * View method
     *
     * @param string|null $id Business Owner id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    //Изписва грешка: cannot convert from string to integer. Това след като промених да излиза името на собственика.
    {
        $businessOwner = $this->BusinessOwner->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('businessOwner'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('BusinessOwner');
        $businessOwner = $this->BusinessOwner->newEmptyEntity();
        if ($this->request->is('post')) {
            // $postData=$this->request->getData();
            // $postData['num_of_businesses'] = 0;

            // Направих така, че дори юзъра да въведе имена с малки букви, контролера да капитализира преди да въведе в базата данни.
            $data = $this->request->getData();
            $data['first_name'] = ucfirst($data['first_name']);
            $data['last_name'] = ucfirst($data['last_name']);
            $businessOwner = $this->BusinessOwner->patchEntity($businessOwner, $data);
            //pr($businessOwner->getErrors()); exit;
            //$businessOwner->num_of_businesses = 0;
            if ($businessOwner->getErrors()) {
                $this->Flash->error(__("Could not be saved"));
                return $this->redirect(['action' => 'add']);
            }
            //pr($businessOwner); exit;
            if ($this->BusinessOwner->save($businessOwner)) {
                $this->Flash->success(__('The business owner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business owner could not be saved. Please, try again.'));
        }
        $this->set(compact('businessOwner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Owner id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessOwner = $this->BusinessOwner->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessOwner = $this->BusinessOwner->patchEntity($businessOwner, $this->request->getData());
            if ($this->BusinessOwner->save($businessOwner)) {
                $this->Flash->success(__('The business owner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business owner could not be saved. Please, try again.'));
        }
        $this->set(compact('businessOwner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Owner id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Business');
        $this->request->allowMethod(['post', 'delete']);
        // $businesses = $this->Business->find()->where([
        //     'owner_id' => $id
        // ])->all();
        // foreach($businesses as $business) {
        //     $this->Business->delete($business);
        // }
        //Нещо се счупи тук и не ми позволява да трия. 
        $businessOwner = $this->BusinessOwner->get($id);
        if ($this->BusinessOwner->delete($businessOwner)) {
            $this->Flash->success(__('The business owner has been deleted.'));
        } else {
            $this->Flash->error(__('The business owner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

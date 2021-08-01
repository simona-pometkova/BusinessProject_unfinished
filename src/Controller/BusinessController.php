<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Business Controller
 *
 * @property \App\Model\Table\BusinessTable $Business
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BusinessOwner'],
            'limit' => 20
        ];
        $businesses = $this->paginate($this->Business);
        //тук писах и пробвах някакви неща, но без да искам не си запазих кода и сега не мога да го върна.
        //Вюто на index се счупи, показва само един рекърд.
        $this->set(compact('businesses'));
        $this->setBusinessTypes(); 
    }

    /**
     * View method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $busines = $this->Business->get($id, [
            'contain' => ['BusinessOwner'],
        ]);

        $this->set(compact('busines'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $busines = $this->Business->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['name'] = ucfirst($data['name']);
            $busines = $this->Business->patchEntity($busines, $data);
            $validationErrors = $busines->getErrors();
            $errorMessage = '';
            if ($validationErrors) {
                foreach($validationErrors as $field => $error) {
                    foreach($error as $rule => $message) {
                        $errorMessage = $field.': '.$message;
                        $this->Flash->error($errorMessage);
                    }
                }
                
                return $this->redirect(['action' => 'add']);
            }
            if ($this->Business->save($busines)) {
                $this->Flash->success(__('The busines has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $businessOwners = $this->Business->BusinessOwner->find()->all();
        $businessSelect = [];
        foreach($businessOwners as $business) {
            $businessSelect[$business->id] = $business->first_name.' '.$business->last_name;
        }
        //pr($businessOwner); exit;
        $this->set(compact('busines'));
        $this->set('businessSelect', $businessSelect);
        $this->setBusinessTypes();
    }

    /**
     * Edit method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busines = $this->Business->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            if ($this->Business->save($busines)) {
                $this->Flash->success(__('The busines has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $businessOwner = $this->Business->BusinessOwner->find('list', ['limit' => 200]);
        $this->set(compact('busines', 'businessOwner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $busines = $this->Business->get($id);
        if ($this->Business->delete($busines)) {
            $this->Flash->success(__('The busines has been deleted.'));
        } else {
            $this->Flash->error(__('The busines could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

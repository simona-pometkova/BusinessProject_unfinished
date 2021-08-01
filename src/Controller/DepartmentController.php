<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Department Controller
 *
 * @property \App\Model\Table\DepartmentTable $Department
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Business'],
        ];
        $department = $this->paginate($this->Department);

        $this->set(compact('department'));
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Department->get($id, [
            'contain' => ['Business'],
        ]);

        $this->set(compact('department'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Тук се получава парадокс. За да добавя нов отдел, трябва да избера мениджър, който искам да е съществуващ работник, 
        //който работи в този отдел. Но за да добавя нов работник, трябва да избера отдел, в който да работи. Вариантите, които 
        //ми хрумват са или при добавянето на нов работник да сложа отметка дали е мениджър или не, или при създаването на отдел да
        //не се избира мениджър веднага и да може да се edit-не после.
        $department = $this->Department->newEmptyEntity();
        if ($this->request->is('post')) {
            //Капитализира първата буква на името преди да запази.
            $data = $this->request->getData();
            $data['name'] = ucfirst($data['name']);
            $department = $this->Department->patchEntity($department, $data);
            if ($this->Department->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $deptEmployees = $this->Department->Employee->find()->all();
        $empSelect = [];
        foreach ($deptEmployees as $emp) {
            $empSelect[$department->manager] = $emp->first_name. ' ' .$emp->last_name;
        }
        $this->set('empSelect', $empSelect);
        $business = $this->Department->Business->find('list', ['limit' => 200]);
        $employee = $this->Department->Employee->find('list', ['limit' => 200]);
        $this->set(compact('department', 'employee'));
        $this->set(compact('department', 'business'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Department->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Department->patchEntity($department, $this->request->getData());
            if ($this->Department->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $business = $this->Department->Business->find('list', ['limit' => 200]);
        $this->set(compact('department', 'business'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Department->get($id);
        if ($this->Department->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

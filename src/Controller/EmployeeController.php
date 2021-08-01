<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Employee Controller
 *
 * @property \App\Model\Table\EmployeeTable $Employee
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Department');
        $department_ids = $this->Department->find('list', [
            'valueField' => 'id'
        ])->where(['business_id'=>1])->toList();
        $this->paginate = [
            'contain' => ['Department'],
            'conditions' => ['dept_id in'=>$department_ids]
        ];
    //    $departments = $this->Department->find()->contain(['Employee'])->where(['business_id'=>1])->all();
        $employee = $this->paginate($this->Employee);

        $this->set(compact('employee'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employee->get($id, [
            'contain' => ['Department', 'Qualification'],
        ]);

        $this->set(compact('employee'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employee->newEmptyEntity();
        if ($this->request->is('post')) {
        //    pr($this->request->getData()); exit;
            $postData = $this->request->getData();
            $qualification_ids = $postData['qualification']['_ids'];
            unset($postData['qualification']);
            $postData['first_name'] = ucfirst($postData['first_name']);
            $postData['last_name'] = ucfirst($postData['last_name']);
        //    pr($qualification_ids); exit;
            $employee = $this->Employee->patchEntity($employee, $postData);
            $saveResult = $this->Employee->save($employee);
            if ($saveResult) {
                $employeeId = $saveResult->id;
                $qualifications = [];
                $this->loadModel('EmployeeQualification');
                foreach($qualification_ids as $qualification_id) {
                    $qualification = $this->EmployeeQualification->newEntity([
                        'employee_id' => $employeeId, 'qualification_id' => $qualification_id
                    ]);
                    $qualifications[] = $qualification;
                }
                $this->EmployeeQualification->saveMany($qualifications);
        //        pr($employeeId); exit;
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $department = $this->Employee->Department->find('list', ['limit' => 200]);
        $qualification = $this->Employee->Qualification->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'department', 'qualification'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employee->get($id, [
            'contain' => ['Qualification'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employee->patchEntity($employee, $this->request->getData());
            if ($this->Employee->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $department = $this->Employee->Department->find('list', ['limit' => 200]);
        $qualification = $this->Employee->Qualification->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'department', 'qualification'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employee->get($id);
        if ($this->Employee->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

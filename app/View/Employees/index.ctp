<div class="container">
    <div class="col-lg-12">
      
       <h2 class="form-signin-heading">Employees List</h2>
       <table class="table table-striped table-hover table-bordered">
           <thead><tr><th><?php echo $this->Paginator->sort('Employee.lastname', 'Fullname'); ?></th>
                   <th><?php echo $this->Paginator->sort('gender_id', 'Gender'); ?></th>
                   <th>Job Title</th>
                   <th><?php echo $this->Paginator->sort('team_id', 'Function'); ?></th>
                   <th><?php echo $this->Paginator->sort('team_id', 'Team'); ?></th>
                   <th>Telephone</th>
                   <th>Email</th>
                   <th><?php echo $this->Paginator->sort('employee_type_id', 'Type'); ?></th>
                   <th></th></tr></thead>
            <tbody>
                <?php //echo '<pre>'; print_r($employees); exit;
                if(!empty($employees)){
                    foreach($employees as $e){
                        echo ' <tr><td>'.$e['Employee']['firstname'].' '.$e['Employee']['othernames'].' <b>'.$e['Employee']['lastname'].'</b></td>'
                                . '<td>'.$e['Gender']['title'].'</td>'
                                . '<td>'.$e['JobTitle']['title'].'</td>'
                                . '<td>'.$e['Department']['title'].'</td>'
                                . '<td>'.$e['Team']['title'].'</td>'
                                . '<td>'.$e['Employee']['work_telephone'].'</td>'
                                . '<td><a href="mailto:'.$e['Employee']['email'].'">'.$e['Employee']['email'].'</a></td>'
                                . '<td>'.$e['EmployeeType']['title'].'</td>'
                                . '<td><ul class="nav nav-pills navbar-right">
                            <li role="presentation" class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-label="Actions for item '.$e["Employee"]["firstname"].'">
                                <span class="glyphicon glyphicon-menu-hamburger"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu" id="noAction">
                               <li><li>'.$this->Html->link('View Details',
                                                array('controller'=>'employees', 'action'=>'view', $e["Employee"]["id"]), array('class'=>'view', 'id'=>$e["Employee"]["id"])
                                            ).'</li></li>
                               <li class="divider"></li>
                               <li>'.$this->Html->link('Edit',
                                                array('controller'=>'employees', 'action'=>'edit', $e["Employee"]["id"]), array('class'=>'edit', 'id'=>$e["Employee"]["id"])
                                            ).'</li>
                              </ul>
                            </li>
                            
                          </ul> '
                                . '</td>'
                                . '</tr>';
                    }
                }
            ?>
       </tbody></table>

    <div class="pagination pagination-large">
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('« Previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Next »'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>


    </div>
    </div>
<div class="row">
        <div class="col-md-5">
            <div class=" panel panel-danger ">
                <div class="panel-body">
        <h3 class="form-signin-heading"><?php echo __('Please Login'); ?></h3>
        <br/>
<?php
            echo $this->Form->Create('User', array("action"=>"login", "class"=>"form-horizontal"));
            
            echo $this->Form->input('username', array('type'=>'text', 'placeholder'=>'Enter your email',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Email</label><div class="col-sm-7">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('password', array('type'=>'password', 'placeholder'=>'Enter your password',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Password</label><div class="col-sm-7">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            
            echo $this->Form->submit('Login', array('id'=>'Login',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label"></label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control btn btn-primary') 
                    );
            echo $this->Form->end();
	?>
        
        <br/>
        <p>
        <?php 
            echo $this->Html->link('Forgot your Password?',
                                array('controller'=>'users', 'action'=>'forgot')
                              ); 
        ?>
        </p>
        <p style="height: 100px;">&nbsp;</p>
                </div>
            </div>
    </div>
    
    </div>



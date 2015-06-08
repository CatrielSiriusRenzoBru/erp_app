
<div class="container">
    <div class="col-lg-6">
      
        <h2 class="form-signin-heading">Register</h2>
        <?php 
            echo $this->Form->Create(); 
            echo '<label for="username" class="sr-only">Email address</label>';
            echo $this->Form->input('firstname', array('class'=>'form-control', 'placeholder'=>'Enter Your First name') );
            echo $this->Form->input('othernames', array('class'=>'form-control', 'placeholder'=>'Enter Your Other name(s)') );
            echo $this->Form->input('lastname', array('class'=>'form-control', 'placeholder'=>'Enter Your Last name') );
            echo $this->Form->input('enumber', array('label'=>'Employee Number', 'class'=>'form-control', 'placeholder'=>'Enter Your Employee Number') );
            echo $this->Form->input('username', array('class'=>'form-control', 'placeholder'=>'Enter Your Username') );
            echo $this->Form->input('password', array('class'=>'form-control', 'placeholder'=>'Enter Your Password') );
            echo $this->Form->submit('Register', array('class'=>'btn btn-lg btn-primary btn-block') );
        ?>
    
    </div>
  </div> 
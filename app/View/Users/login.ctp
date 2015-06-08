<div class="container">
    <div class="col-md-4">
      
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php 
            echo $this->Form->Create(); 
            echo '<label for="username" class="sr-only">Email address</label>';
            echo $this->Form->input('username', array('after'=>'<br/>','class'=>'form-control', 'placeholder'=>'Enter Your Username') );
            echo $this->Form->input('password', array('after'=>'<br/>','class'=>'form-control', 'placeholder'=>'Enter Your Password') );
            echo $this->Form->submit('Login', array( 'class'=>'btn btn-primary btn-block') );
        ?>
   
        
        
    </div>
    </div> 



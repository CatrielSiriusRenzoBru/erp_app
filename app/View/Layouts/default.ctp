<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', '360HR');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

	<?php
		echo $this->Html->meta('icon');
                
		echo $this->Html->css([
                    //'cake.generic',
                    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'
                    ,'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css'
                    //'bootstrap'
                    //,'bootstrap.min'
                    ,'tokenizer/token-input'
                    ,'tokenizer/token-input-facebook'
                    ,'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css'
                    ,'assets/css/flexslider'
                    ,'assets/css/font-style'
                    ,'styler'
                ]);
//                

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
        <?php 
     echo $this->Html->script([
                    //'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'
                    'jquery'
                ]);
     echo $this->fetch('script'); 
     echo $this->fetch('scriptBottom');
     ?>
</head>
<body>
    <?php 
        if($login_success){
            echo $this->element('Menu/main'); 
        }
    ?>
    <div class="container">
        <div class="row">
            <p style="margin: 0 0 60px 0;"></p>
                        
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
            
        </div>
		
	
	<?php //echo $this->element('sql_dump'); ?>
        <hr>
        <footer>
            <p>&copy; 360HR 2015</p>
        </footer>
     </div><!--/.container-->  
     <?php 
     echo $this->Html->script([
                    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'
                    ,'general'
                    ,'tokenizer/jquery.tokeninput'
                    ,'https://code.jquery.com/ui/1.11.2/jquery-ui.js'
                ]);
     echo $this->fetch('script'); 
     echo $this->fetch('scriptBottom');
     ?>
</body>
</html>

<?php 
$menus = $this->requestAction('/menus/index'); //echo $menus[0]['Menu']['name']; exit;
?>

<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">First ERP</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php 
            $top = '';
                    foreach($menus as $m){
                        
                        $submenu = '';
                        if( (int)$m['Menu']['parent'] === 0 ){
                            
                            //print sub menus 
                            
                            foreach($menus as $sub)
                            {
                                
                                if( (int) $sub['Menu']['parent'] === (int) $m['Menu']['id'])
                                {
                                    $submenu .= '<li class="">'.$this->Html->link('<span class="'.$sub['Menu']['icon'].'"></span> '.$sub['Menu']['name'],
                                                array('controller'=>$sub['Menu']['controller'], 'action'=>$sub['Menu']['action']),
                                                array('escape'=>false)
                                            ).'</li>';
                                }
                            }
                            if( $submenu <> '')
                            {
                                $top .= '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="'.$m['Menu']['icon'].'"></span> '.$m['Menu']['name'].' <span class="caret"></span></a>'
                                        .'<ul class="dropdown-menu" role="menu">'.$submenu.'</ul></li>';
                            } else {
                                $top .=  '<li>'.$this->Html->link('<span class="'.$m['Menu']['icon'].'"></span> '.__($m['Menu']['name']),
                                                array('controller'=>'users', 'action'=>'home'),
                                                array('escape'=>false)
                                            ).'</li>';
                            }
                        }
                        
                    }
                    echo $top;
            ?>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->Session->read("logged_in_user");?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <?php echo '<li class="">'.$this->Html->link('<span class="glyphicon glyphicon-cog"></span> Account Settings',
                                                array('controller'=>'users', 'action'=>'settings'),
                                                array('escape'=>false)
                                            ).'</li>';?>
                    <li class="divider"></li>
                    <?php echo '<li class="">'.$this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Logout',
                                                array('controller'=>'users', 'action'=>'logout'),
                                                array('escape'=>false)
                                            ).'</li>';?>
                </ul>
            </li>
          </ul>
            
            
            
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-bell"></span> <span class="badge">0</span> <!--<span class="caret">--></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <?php echo '<li class="">'.$this->Html->link('Mawunyo has booked leave',
                                                array('controller'=>'users', 'action'=>'settings')
                                            ).'</li>';?>
                    <li class="divider"></li>
                    <?php echo '<li class="">'.$this->Html->link('Your leave has been approved',
                                                array('controller'=>'users', 'action'=>'logout')
                                            ).'</li>';?>
                </ul>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->




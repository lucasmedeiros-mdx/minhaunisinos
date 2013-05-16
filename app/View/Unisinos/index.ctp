<?php

if ($page == 'login') {

  echo $this->Form->create('Login', array('class' => 'form-signin'));

    echo $this->Session->flash();

    echo $this->Html->tag('h3', 'Login Unisinos');

    echo $this->Form->input('user', array('class' => 'input-block-level', 'placeholder' => 'User', 'label' => false));
    echo $this->Form->input('password', array('class' => 'input-block-level', 'placeholder' => 'Password', 'label' => false));

    echo $this->Form->button('Login', array('class' => 'btn btn-large btn-primary'));

  echo $this->Form->end();

} else if($page = 'contexts') {

  ?>
  <h3>Selecione o contexto</h3>
  <ul class="nav nav-tabs nav-stacked">
    <?php
      foreach ($contexts as $k=>$value) {
        
        ?>
          <li><?php echo $this->Html->link($value, array('controller' => 'unisinos', 'action' => 'menu', $k)); ?></li>
        <?php

      }

    ?>
  </ul>

  <?php

} ?>
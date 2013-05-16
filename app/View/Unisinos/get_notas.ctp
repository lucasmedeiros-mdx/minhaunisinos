<?php
  
  if (empty($etapas)) {
    echo $this->Html->tag('h3', 'Nenhuma nota registrada.');
  }

?>

<div class="tabbable">
  <ul class="nav nav-tabs">
    <?php
      foreach ($etapas as $k => $etapa) {
        echo $this->Html->tag('li', $this->Html->link($etapa['nome'], '#tab'.($k+1), array('data-toggle' => 'tab')), array('class' => $k==0 ? 'active' : ''));
      }
    ?>
  </ul>
  <div class="tab-content">

    <?php foreach ($etapas as $k => $etapa) {
      
    ?>
      <div class="tab-pane <?php echo ($k == 0 ? 'active' : ''); ?>" id="tab<?php echo $k+1;?>">
        
        <?php foreach ($etapa['Materia'] as $key => $materia) {
            echo $this->Html->tag('h4', $materia['nome']);

        ?>
          <table class="table">
            <thead>
              <tr>
                <th>Avaliação</th>
                <th>Peso</th>
                <th>Nota</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($materia['Avaliacao'] as $key => $aval) {
              ?>
                <tr>
                  <?php
                    echo $this->Html->tag('td', $aval['nome']);
                    echo $this->Html->tag('td', $aval['peso']);
                    echo $this->Html->tag('td', $aval['nota']);
                  ?>
                </tr>

              <?php
              }?>
            </tbody>

            <tfoot>
                <?php
                  echo $this->Html->tag('th', '');
                  echo $this->Html->tag('th', 'Σ: '.$materia['pesoTotal']);
                  echo $this->Html->tag('th', 'Σ: '.$materia['notaTotal']);
                ?>
            </tfoot>
          </table>
        <?php
        }?>

      </div>
    <?php

    }?>

  </div>
</div>
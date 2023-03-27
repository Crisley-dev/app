<div class="container text-center py-3">
	<h1>Pedidos de Compra</h1>
</div>


<style>
  
	.btn-floating {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  text-align: center;
  font-size: 24px;
  color: #fff;
}

.btn-floating i {
  margin-top: 16px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}



</style>

    <?php foreach($pedido as $ped):
        $arr = json_decode($ped['pedidos']);
        $num = count((array)$arr[0]);
        
        end($arr[0]);         
        $key = key($arr[0]);
        $str = str_replace('item','',$key);
        $nitem = intval($str);
        

        $item = 'item'.$nitem+1;

       
      
      ?>
      
    <div class="card table-responsive col-md-9 m-auto" style=""> 
    <table class="table table-bordered table-hover">
      <div class="row">
      <?php if($ped['pedido_status'] == 'Ativo'): ?>
      <div class="col col-md-6 m-auto py-3 text-left">
      <h5>Pedido: <?= $ped['cod'] ?> - <h5 class="text-success">Ativo</h5></h5>
      </div>
      <div class="col col-md-6 m-auto py-3 text-right">
        <input type="hidden" id="novo_item" value="<?= $item ?>">
      <a href="" id="<?= $ped['cod']?>/<?= $item ?>" class="btn btn-sm btn-success bt_add_item">
  			<i class="fas fa-plus" title="Adicionar Novo Item"></i>
		  </a>
      <a href="" id="<?= $ped['cod']?>" class="btn btn-sm btn-warning bt_finalize_pedido">
  			<i class="fas fa-check" title="FInalizar Pedido"></i>
		  </a>
      <a href="" id="<?= $ped['cod']?>" class="btn btn-sm btn-danger bt_delete_pedido">
  			<i class="fas fa-trash" title="Excluir Pedido"></i>
		  </a>
      </div>
      </div>
      <?php else: ?>
        <div class="col col-md-12 py-3 text-left">
        <h5>Pedido: <?= $ped['cod'] ?> - <h5 class="text-danger">Finalizado</h5></h5>
        </div>
       <?php endif;?>
        
     
     
    <thead>
      <tr>
        <th>Fornecedor</th>
        <th>Produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Observação</th>
        
      </tr>
    </thead>
    <tbody class="tb-pedido">
      <?php

          
        
         for($n=1; $n<=$num; $n++) {
        
          if(!isset($arr[0]->{'item'.$n})):
            $num+=1;
          else:
          ?>
        <tr>
          <td><?=isset($arr[0]->{'item'.$n}->fornecedor) ? $arr[0]->{'item'.$n}->fornecedor : ""; ?> </td>
          <td><?=isset($arr[0]->{'item'.$n}->produto) ? $arr[0]->{'item'.$n}->produto : ""; ?> </td>
          <td>R$: <?=isset($arr[0]->{'item'.$n}->preco) ? $arr[0]->{'item'.$n}->preco : ""; ?> </td>
          <td><?=isset($arr[0]->{'item'.$n}->quantidade) ? $arr[0]->{'item'.$n}->quantidade : ""; ?> </td>
          <td><?=isset($arr[0]->{'item'.$n}->observacao) ? $arr[0]->{'item'.$n}->observacao : ""; ?> </td>
          <?php if($ped['pedido_status'] == 'Ativo'): ?>

          <td>
            <a href="<?= base_url()?>pedido/edit/<?= $ped['cod']?>/item<?= $n;?>" class="btn btn-sm btn-info">
  			      <i class="fas fa-pencil" title="Editar Pedido"></i>
		        </a>
            <a href="<?= base_url()?>pedido/delete_item/<?= $ped['cod']?>/item<?= $n;?>" class="btn btn-sm btn-danger">
  			      <i class="fas fa-trash" title="Editar Pedido"></i>
		        </a>
    </td>
      <?php endif;?>
        </tr>
      <?php endif; ?>

      <?php
      }
     endforeach; ?>
    </tbody>
  </table>
    </div>

		<a href="<?= base_url()?>pedido/new" class="btn btn-primary btn-floating">
  			<i class="fas fa-plus"></i>
		</a>
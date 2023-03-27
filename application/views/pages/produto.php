<div class="container text-center py-3">
<?php if(isset($mensagens)):?>
      <div class="alert alert-success">
        <?= $mensagens ?>
    </div>
    <?php endif;?>
	<h1>Produtos</h1>
</div>


<style>

.table-responsive {
  max-height: calc(10 * 3.5rem); /* ou o valor que represente 5 linhas */
  overflow-y: scroll;
}

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


    <div class="table-responsive col-md-9 m-auto">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descricao</th>
					<th>Preco</th>
					<th>Quantidade</th>
          <th>Status</th>

				</tr>
			</thead>
			<tbody>
            
            <?php 
            if(isset($produto)):
            foreach($produto as $prod): 
            
                  if($prod['produto_status'] === 'Inativo'):
              ?>
                <tr style="background-color: #c70a0a; color: #fff">
              <?php else: ?>
                <tr>
              <?php endif;?>
					<td><?= $prod['nome']?></td>
                    <td><?= $prod['descricao']?></td>
                    <td><?= $prod['preco']?></td>
                    <td><?= $prod['quantidade']?></td>
                    <td><?= $prod['produto_status']?></td>
                    <?php
                    if($prod['produto_status'] === 'Inativo'):
                    ?>
                    <td></td>
                    <?php else: ?>
					<td>
						<a href="<?= base_url()?>produto/edit/<?= $prod['cod']?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
						<a href="" id="<?= $prod['cod']?>" class="btn btn-sm btn-danger bt_delete_produto"><i class="fas fa-trash-alt"></i></a>
          <?php endif; ?>
					</td>
                </tr>
                <?php endforeach;
                else: ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endif; ?>
			</tbody>
		</table>
    </div>

		<a href="<?= base_url()?>produto" class="btn btn-primary btn-floating">
  			<i class="fas fa-plus"></i>
		</a>
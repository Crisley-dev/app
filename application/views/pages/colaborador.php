<div class="container text-center py-3">
	<h1>Colaboradores</h1>
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
				<th>CPF</th>
				<th>Nome</th>
				<th>Sexp</th>
				<th>email</th>
				<th>Data Nasc</th>
				<th>Telefone</th>
				<th>Endereço</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($store as $colab):
               if($colab['colab_status'] === 'Inativo'):
				?>
			<tr style="background-color: #c70a0a; color: #fff">
				<?php else: ?>
			<tr>
				<?php endif;?>
				<td><?= $colab['cpf']?></td>
				<td><?= $colab['nome']?></td>
				<td><?= $colab['sexo']?></td>
				<td><?= $colab['email']?></td>
				<td><?= $colab['data_nascimento']?></td>
				<td><?= $colab['telefone']?></td>
				<td>
					<?php
						$end = json_decode($colab['endereco']);
						echo "$end->rua, $end->numero, $end->cep, $end->estado, $end->bairro - $end->cidade";
						?>
				</td>
				<td><?= $colab['colab_status']?></td>
				<td>
					<a href="<?= base_url()?>colaborador/edit/<?= $colab['cpf']?>" class="btn btn-sm btn-warning"><i
							class="fas fa-pencil-alt"></i></a>
					<a href="" id="<?= $colab['cpf']?>" class="btn btn-sm btn-danger bt_delete"><i
							class="fas fa-trash-alt"></i></a>

				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<a href="<?= base_url()?>colaborador" class="btn btn-primary btn-floating">
		<i class="fas fa-plus"></i>
	</a>
</div>

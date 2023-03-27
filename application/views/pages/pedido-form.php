<style>
	.form-container {
		margin-top: 50px;
		width: 500px;
		margin-left: auto;
		margin-right: auto;
	}

	.form-control {
		margin-bottom: 10px;
	}

</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="py-4"><?= $title ?></h2>

				<?php if(isset($pedido)) : ?>
				<form id="form-pedido" action="<?= base_url()?>pedido/update/<?= $pedido['cod'] ?>" method="post">
					<?php elseif(isset($add_item)) :?>

						<form action="<?= base_url()?>pedido/add_item/<?= $pedido_item['cod']?>/<?=$add_item?>" method="post">
					<?php else: ?>
					<form action="<?= base_url()?>pedido/salvar" method="post">
						<?php endif; ?>

						<div class="row">
							<div class="col col-sm-6">
								<div class="form-group">
									<label for="fornecedor">Fornecedor</label>
									<select name="fornecedor" id="fornecedor" class="form-control">
										<?php foreach($fornecedor as $fnc): ?>
										<option value="<?= $fnc['nome']?>"><?= $fnc['nome']?></option>
										<?php endforeach;?>
									</select>

								</div>

							</div>
						</div>

						<div class="row">
							<div class="col col-sm-4">
								<div class="form-group">
									<label for="produto">Produto</label>

									<select name="produto" id="produto" class="form-control">
										<?php foreach($produto as $prod): ?>
										<option value="<?= $prod['nome'] ?>"><?= $prod['nome'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col col-sm-4">
								<div class="form-group">
									<label for="preco">Preço</label>
									<input type="text" name="preco" id="preco" class="form-control" value="">
								</div>
							</div>

                            <div class="col col-sm-4">
								<div class="form-group">
									<label for="quantidade">Quantidade</label>
									<input type="number" name="quantidade" id="quantidade" class="form-control"  min="1" max="99" value="1" >
								</div>
							</div>


						</div>

						<div class="form-group">
							<textarea name="observacao" id="observacao" class="form-control"></textarea>

						</div>
						<div class="form-group">

						</div>
						<?php if(isset($add_item)): ?>

						<button type="submit" class="btn btn-primary">Adicionar Item</button>

						<a href="<?=base_url()?>portal/pedido" class="btn  btn-danger" >Cancelar</a>
						<?php else: ?>
						<a href="" class="btn  btn-primary bt_add_pedido" >Adicionar Item</a>
						<button type="submit" class="btn btn-primary">Salvar Pedido</button>
						<?php endif;?>
					
					<input type="hidden" name="pedidoFinal" id="pedidoFinal" value="">

					</form>


			</div>
				<div class="response container "></div>
		</div>
	</div>

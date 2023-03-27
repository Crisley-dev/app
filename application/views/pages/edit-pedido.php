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
<pre>
    <?php 
    $pd = json_decode($pedido['pedidos']);
    $pd = $pd[0]->{$item};
    var_dump(intval($pd->quantidade));
    ?>
</pre>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="py-4"><?= $title ?></h2>
		
				<form id="form-pedido" action="<?= base_url()?>pedido/update/<?= $pedido['cod'] ?>/<?=$item?>" method="post">
						<div class="row">
							<div class="col col-sm-6">
								<div class="form-group">
									<label for="fornecedor">Fornecedor</label>
									<select name="fornecedor" id="fornecedor" class="form-control">
                                       <option value="<?= $pd->fornecedor ?>" selected > <?= $pd->fornecedor ?></option>
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
                                        <option value="<?= $pd->produto ?>"> <?= $pd->produto ?></option>
										<?php foreach($produto as $prod): ?>
										<option value="<?= $prod['nome'] ?>"><?= $prod['nome'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col col-sm-4">
								<div class="form-group">
									<label for="preco">Preço</label>
									<input type="text" name="preco" id="preco" class="form-control" value="<?= $pd->preco?>">
								</div>
							</div>

                            <div class="col col-sm-4">
								<div class="form-group">
									<label for="quantidade">Quantidade</label>
									<input type="number" name="quantidade" id="quantidade" class="form-control"  min="1" max="99" value="<?=intval($pd->quantidade)?>" >
								</div>
							</div>


						</div>

						<div class="form-group">
							<textarea name="observacao" id="observacao" class="form-control"><?=$pd->observacao ?></textarea>

						</div>
						<div class="form-group">

						</div>

						<button type="submit" class="btn btn-primary">Salvar Edição</button>
						<a href="<?=base_url()?>portal/pedido" class="btn  btn-danger" >Cancelar</a>

					
					<input type="hidden" name="pedidoFinal" id="pedidoFinal" value="">

					</form>


			</div>
				<div class="response container "></div>
		</div>
	</div>

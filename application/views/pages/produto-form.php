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

                <?php if(isset($produto)) : ?>
    			    <form action="<?= base_url()?>produto/update/<?= $produto['cod'] ?>" method="post">
			    <?php else : ?>
				    <form action="<?= base_url()?>produto/salvar" method="post">
			    <?php endif; ?>
				
                <div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control <?php echo form_error('nome') ? 'is-invalid' : ''; ?>" value="<?php echo isset($produto) ? $produto['nome'] : set_value('nome'); ?>">
						<?php echo form_error('nome', '<div class="invalid-feedback">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label for="preco">Preço</label>
						<input type="text" name="preco" id="preco" class="form-control <?php echo form_error('preco') ? 'is-invalid' : ''; ?>" value="<?php echo isset($produto) ? $produto['preco'] : set_value('preco'); ?>">
						<?php echo form_error('preco', '<div class="invalid-feedback">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea name="descricao" id="descricao" class="form-control <?php echo form_error('descricao') ? 'is-invalid' : ''; ?>"><?php echo isset($produto) ? $produto['descricao'] : set_value('descricao'); ?></textarea>
						<?php echo form_error('descricao', '<div class="invalid-feedback">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label for="quantidade">Quantidade</label>
						<input type="text" name="quantidade" id="quantidade" class="form-control <?php echo form_error('quantidade') ? 'is-invalid' : ''; ?>" value="<?php echo isset($produto) ? $produto['quantidade'] : set_value('quantidade'); ?>">
						<?php echo form_error('quantidade', '<div class="invalid-feedback">', '</div>'); ?>
					</div>
					<button type="submit" class="btn btn-primary">Cadastrar</button>
					<a href="<?=base_url()?>portal/produto" class="btn  btn-danger" >Cancelar</a>
				</form>
			</div>
		</div>
	</div>
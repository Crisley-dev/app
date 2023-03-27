	
	<div class="m-auto my-4 text-center">
	<h2 class="my-4">Cadastro de Colaborador</h2>
	</div>
	
	<div class="container">
		<?php if(isset($colab)) : ?>
    			<form action="<?= base_url()?>colaborador/update/<?= $colab['cpf'] ?>" method="post">
			<?php else : ?>
				<form action="<?= base_url()?>colaborador/salvar" method="post">
			<?php endif; ?>
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" name="nome" class="form-control"  required value="<?= isset($colab) ? $colab['nome'] : set_value('nome') ?>">
				<?php if(form_error('nome')) ?>
				<div class="alert-danger">
					<?= form_error('nome') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="sexo">Sexo:</label>
				<select name="sexo" class="form-control" >
					<option value="<?= isset($colab) ? $colab['sexo'] : set_value('sexo') ?>" hidden checked><?= isset($colab) ? $colab['sexo'] : "" ?></option>
					<option value="Masculino">Masculino</option>
					<option value="Feminino">Feminino</option>
					<option value="Outro">Prefiro não dizer</option>
				</select>
				<?php if(form_error('sexo')) ?>
				<div class="alert-danger">
					<?= form_error('sexo') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="data_nascimento">Data de nascimento:</label>
				<input type="date" name="data_nascimento" class="form-control"  value="<?= isset($colab) ? $colab['data_nascimento'] : set_value('data_nascimento') ?>">
				<?php if(form_error('data_nascimento')) ?>
				<div class="alert-danger">
					<?= form_error('data_nascimento') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="email">E-mail:</label>
				<input type="email" name="email" class="form-control"  value="<?= isset($colab) ? $colab['email'] : set_value('email') ?>">
				<?php if(form_error('email')) ?>
				<div class="alert-danger">
					<?= form_error('email') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="telefone">Telefone:</label>
				<input type="tel" name="telefone" class="form-control" maxlength="11"  value="<?= isset($colab) ? $colab['telefone'] : set_value('telefone') ?>">
				<?php if(form_error('telefone')) ?>
				<div class="alert-danger">
					<?= form_error('telefone') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="cpf">CPF:</label>
				<input type="text" name="cpf" class="form-control" maxlength="11"  value="<?= isset($colab) ? $colab['cpf'] : set_value('cpf') ?>">
				<?php if(form_error('cpf')) ?>
				<div class="alert-danger">
					<?= form_error('cpf') ?>
				</div>
			</div>

			<div class="form-group">

			<?php
				
				isset($colab) ? $end = json_decode($colab['endereco']) : "";
			?>
				<fieldset>
				<legend>Endereço</legend>
					<label for="cep">CEP</label>
					<input type="text" name="cep" class="form-control"  value="<?= isset($colab) ? $end->cep : set_value('cep') ?>">
					<?php if(form_error('cep')) ?> <div class="alert-danger"><?= form_error('cep') ?></div>

					<label for="estado">Estado</label>
					<input type="text" name="estado" class="form-control"  value="<?= isset($colab) ? $end->estado : set_value('estado') ?>">
					<?php if(form_error('estado')) ?> <div class="alert-danger"><?= form_error('estado') ?></div>

					<label for="cidade">Cidade</label>
					<input type="text" name="cidade" class="form-control"  value="<?= isset($colab) ? $end->cidade : set_value('cidade') ?>">
					<?php if(form_error('cidade')) ?> <div class="alert-danger"><?= form_error('cidade') ?></div>

					<label for="bairro">Bairro</label>
					<input type="text" name="bairro" class="form-control"  value="<?= isset($colab) ? $end->bairro : set_value('bairro') ?>">
					<?php if(form_error('bairro')) ?> <div class="alert-danger"><?= form_error('bairro') ?></div>

					<label for="rua">Rua/Avenida</label>
					<input type="text" name="rua" class="form-control"  value="<?= isset($colab) ? $end->rua : set_value('rua') ?>">
					<?php if(form_error('rua')) ?> <div class="alert-danger"><?= form_error('rua') ?></div>

					<label for="numero">Numero</label>
					<input type="text" name="numero" class="form-control"  value="<?= isset($colab) ? $end->numero : set_value('numero') ?>">
					<?php if(form_error('numero')) ?> <div class="alert-danger"><?= form_error('numero') ?></div>
					
				</fieldset>
				
			</div>

			<div class="form-group">
				<label for="tipo">Tipo:</label>
				<select name="tipo" class="form-control" >
					<option value="<?= isset($colab) ? $colab['tipo'] : "" ?>" hidden checked>
					<?php
					if(isset($colab)){
						if($colab['tipo'] === 'C')
						echo 'Colaborador';
						else
						echo 'Fornecedor';
					}
					?>
				</option>
					<option value="C">Colaborador</option>
					<option value="F">Fornecedor</option>
				</select>
			</div>

			<div class="form-group">
				<label for="status">Status:</label>
				<select name="status" class="form-control" >
				<option value="<?= isset($colab) ? $colab['colab_status'] : "" ?>" hidden checked><?= isset($colab) ? $colab['colab_status'] : "" ?></option>
					<option value="Ativo">Ativo</option>
					<option value="Inativo">Inativo</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="<?=base_url()?>portal/colaborador" class="btn  btn-danger" >Cancelar</a>
		</form>
	</div>

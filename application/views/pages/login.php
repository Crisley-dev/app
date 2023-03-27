
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css" rel="stylesheet">
  </head> 
  <body class="text-center bg-dark">
<div class="card text-center m-auto rounded" style="width: 32rem;">
  <form class="form-signin" method="post" action="<?= base_url()?>login">
  <?php if(isset($error)):?>
  <div class="alert alert-info">
    <?= $error; ?>
  </div>
  <?php endif;?>
  

  <?php if($this->session->flashdata('error')):?>
  <div class="alert alert-info">
    <?= $this->session->flashdata('error') ?>
  </div>
  <?php endif;?>
 
  <img class="mb-4" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Faça o Login</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <label for="inputPassword" class="sr-only">Senha</label>
  <input type="password" name="password" id="inputPasswordMatch" class="form-control" placeholder="Senhas" required>
  <div class="checkbox mb-3">
  </div>
	<p>
		<a href="<?= base_url()?>signup">Criar uma conta?</a>
	</p>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
</form>
</div>
</body>
</html>

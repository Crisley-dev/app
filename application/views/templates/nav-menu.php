<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link Portal" href="<?php echo base_url('portal'); ?>">Portal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link Colaborador" href="<?php echo base_url('portal/colaborador'); ?>">Colaborador</a>
      </li>
      <li class="nav-item">
        <a class="nav-link Produtos" href="<?php echo base_url('portal/produto'); ?>">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link Pedidos" href="<?php echo base_url('portal/pedido'); ?>">Pedidos</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('login/logout'); ?>">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<script>
 var element = document.querySelector(".<?= $link ?>")
element.classList.add("navbar-brand")
</script>

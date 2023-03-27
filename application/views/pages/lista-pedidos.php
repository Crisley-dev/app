
<div class="m-auto py-3">
    <h5>Previe do Pedido</h5>
</div>


<div class="table-responsive">
  <table class="table table-bordered">
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
        <?php for($i=1; $i<=$numpedidos; $i++): ?>
        <tr>
          <td><?= isset($pedidoFinal["item$i"]['fornecedor']) ?$pedidoFinal["item$i"]['fornecedor'] : "" ; ?></td>
          <td><?= isset($pedidoFinal["item$i"]['produto']) ? $pedidoFinal["item$i"]['produto'] : ""; ?></td>
          <td><?= isset($pedidoFinal["item$i"]['preco']) ? $pedidoFinal["item$i"]['preco'] : ""; ?></td>
          <td><?= isset($pedidoFinal["item$i"]['quantidade']) ? $pedidoFinal["item$i"]['quantidade'] : ""; ?></td>
          <td><?= isset($pedidoFinal["item$i"]['observacao']) ? $pedidoFinal["item$i"]['observacao'] : ""; ?></td>
        </tr>
      <?php endfor ?>
    </tbody>
  </table>
</div>
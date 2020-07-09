    </main>

    <footer class="w3-panel w3-<?php echo PRIMARY_COLOR; ?>">
      <p class="w3-large w3-center">
        <b><time datetime="<?php echo date('Y-m-d') . 'T' . date('H:iP'); ?>">
          <i class="material-icons" title="Giờ">schedule</i>
          <?php echo date('H:i') . ' (' . date('P') . ')'; ?>
          <br>
          <i class="material-icons" title="Ngày">today</i>
          <?php echo date('d/m/Y');?>
          </time></b>
      </p>
    </footer>
  </body>
</html>

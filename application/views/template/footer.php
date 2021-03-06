  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url('/assets/theme/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('/assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('/assets/theme/dist/js/adminlte.min.js')?>"></script>
<?php if(!empty($jsCdn)) : ?>
  <?php foreach($jsCdn as $jc) : ?>
    <script src="<?= $jc?>"></script>
  <?php endforeach ?>
<?php endif ?>
<?php if(!empty($javascript)) : ?>
    <?php foreach($javascript as $js) : ?>
      <?php $this->load->view('js/' . $js); ?>
    <?php endforeach ?>
  <?php endif ?>
</body>
</html>

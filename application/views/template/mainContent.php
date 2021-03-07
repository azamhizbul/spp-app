<?php $this->load->view('/template/header') ?>
<?php
    $level = $this->session->userdata('level');
    switch ($level) {
      case "admin":
        $this->load->view('/template/navigation');
        break;
      case "petugas":
        $this->load->view('/template/navigationPetugas');
        break;
      case "siswa":
        $this->load->view('/template/navigationSiswa');
        break;
      default:
        $this->load->view('/template/blankNavigation');
    }
?>
<?php $this->load->view($content); ?>
<?php $this->load->view('/template/footer') ?>
<?php
  $list_template = '<li><a href="{link}"><i class="fa fa-{icon}"></i> <span>{title}</span></a></li>';
  $menu_item = '<li class="header">MAIN NAVIGATION</li>';

  $data_item = array(
      array('title' => 'Dashboard', 'icon' => 'dashboard', 'link' => base_url('dashboard'), 'role' => array('Admin', 'Dosen', 'Mahasiswa')),
      array('title' => 'Mata Kuliah', 'icon' => 'book', 'link' => base_url('mata_kuliah'), 'role' => array('Admin', 'Dosen')),
      array('title' => 'Kategori Ujian', 'icon' => 'laptop', 'link' => base_url('kategori_ujian'), 'role' => array('Admin', 'Dosen')),
      array('title' => 'Kelola Soal', 'icon' => 'files-o', 'link' => base_url('kelola_soal'), 'role' => array('Admin')),
      array('title' => 'Nilai Ujian', 'icon' => 'bar-chart', 'link' => base_url('nilai_ujian'), 'role' => array('Dosen')),
      array('title' => 'Management User', 'icon' => 'users', 'link' => base_url('management_user'), 'role' => array('Admin')),
    );

  foreach ($data_item as $data)
  {
    if(in_array($this->session->userdata('role'), $data['role'])) {
      $menu_item .= $this->parser->parse_string($list_template, $data, TRUE);
    }
  }

  $template = '<ul class="sidebar-menu" data-widget="tree">{menuitems}</ul>';
  $data = array(
    'menuitems' => $menu_item
  );

  $generated_menu = $this->parser->parse_string($template, $data, TRUE);
?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div>
        <p><center>Selamat Datang <?php 
          if (null != $this->session->userdata('userdata')) { 
            echo $this->session->userdata('userdata')['nama']; 
          } else {
            echo 'Administrator';
          } ?></center></p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php echo $generated_menu ?>

    
  </section>
  <!-- /.sidebar -->
</aside>
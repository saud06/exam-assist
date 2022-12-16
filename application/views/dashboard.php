<style type="text/css">
  .content-all {
    display:none;
  }

  .preload { 
      background-image: url("../assets/images/default-loader.gif");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      transform: rotate(180deg);
  }
</style>

<div class="preload"></div>

<div class="content-all">
  <?php 
    if(!$this->session->userdata('email')){
      redirect('auth/login');
    }

    $this->load->view('layout/header');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php 
          echo $this->lang->line('header_dashboard'); 
        ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Welcome, Admin !</h3>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <?php 
    $this->load->view('layout/footer');
  ?>
</div>

<script type="text/javascript">
  $(function(){
    $('.preload').delay(1000).fadeOut(500, function() {
      $('.content-all').fadeIn(500);        
    });
  });
</script>
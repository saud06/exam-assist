<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  $p = array('admin');

  if(!(in_array($this->session->userdata('type'), $p))){
    redirect('auth');
  }

  $this->load->view('layout/header');
?>

<style>
  table>thead>tr>th, table>tbody>tr>td, table>tfoot>tr>th{
    text-align: center;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h5>
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo base_url('auth/dashboard'); ?>" class="text-black"><i class="fa fa-dashboard">&nbsp;</i><strong><?php echo $this->lang->line('header_dashboard'); ?></strong></a>
          </li>

          <li class="active">Student Progress Report</li>
        </ol>
      </h5> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form method="post" action="<?php echo base_url('reports/student_progress_report');?>">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="academic_year">Academic Year <span style="color: red;">*</span></label>
                      
                      <select class="form-control select2" id="academic_year" name="academic_year" style="width: 100%">
                        <option value="">Select</option>
                        <option value="2022(Jan) - 2022(Dec)">2022(Jan) - 2022(Dec)</option>
                      </select>

                      <span class="validation-color" id="err_academic_year"><?php echo form_error('academic_year'); ?></span>
                    </div>

                    <div class="form-group">
                      <label for="class">Class <span style="color: red;">*</span></label>
                      
                      <select class="form-control select2" id="class" name="class" style="width: 100%">
                        <option value="">Select</option>
                        <option value="IX">IX</option>
                        <option value="X">X</option>
                      </select>

                      <span class="validation-color" id="err_class"><?php echo form_error('class'); ?></span>
                    </div>

                    <div class="form-group">
                      <label for="section">Section <span style="color: red;">*</span></label>
                      
                      <select class="form-control select2" id="section" name="section" style="width: 100%">
                        <option value="">Select</option>
                        <option value="A-Science">A-Science</option>
                      </select>

                      <span class="validation-color" id="err_section"><?php echo form_error('section'); ?></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exam_type">Exam Type <span style="color: red;">*</span></label>
                      
                      <select class="form-control select2" id="exam_type" name="exam_type" style="width: 100%">
                        <option value="">Select</option>
                        <option value="Half-Yearly Examination-2022">Half-Yearly Examination-2022</option>
                      </select>

                      <span class="validation-color" id="err_exam_type"><?php echo form_error('exam_type'); ?></span>
                    </div>

                    <div class="form-group">
                      <label for="class_group">Class Group <span style="color: red;">*</span></label>
                      
                      <select class="form-control select2" id="class_group" name="class_group" style="width: 100%">
                        <option value="">Select</option>
                        <option value="Science">Science</option>
                      </select>

                      <span class="validation-color" id="err_class_group"><?php echo form_error('class_group'); ?></span>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="box-footer" style="padding: 0;">
                      <input type="hidden" id="student_id" name="student_id">
                      <input type="hidden" id="student_roll" name="student_roll">
                      <input type="hidden" id="student_name" name="student_name">

                      <button type="button" id="filter" class="button btn btn-info">
                        <span style="left: 26%">Filter</span>
                        <span class="loading"><i class="fa fa-circle-o-notch"></i></span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Students Progress Report</h3>
            </div>
            <!-- /.box-header -->
              
            <div class="box-body">
              <table id="index" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Student ID</th>
                    <th>Roll</th>
                    <th>Student Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="records">
                </tbody>
                <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Student ID</th>
                    <th>Roll</th>
                    <th>Student Name</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
  $this->load->view('layout/footer');
?>

<script type="text/javascript">
  function individualProgressReport(ele, ele2, ele3){
    $('#student_id').val(ele);
    $('#student_roll').val(ele2);
    $('#student_name').val(ele3);

    $('form').attr('target', '_blank').submit();
  }

  $(document).ready(function(){
    $('#filter').click(function(){
      const academicYear = $('#academic_year').val();
      const className = $('#class').val();
      const section = $('#section').val();
      const examType = $('#exam_type').val();
      const classGroup = $('#class_group').val();

      // Validation
      if(academicYear === ''){
        $('#err_academic_year').html('Select Academic Year.');
        return false;
      } else{
        $('#err_academic_year').html('');
      }

      if(className === ''){
        $('#err_class').html('Select Class.');
        return false;
      } else{
        $('#err_class').html('');
      }

      if(section === ''){
        $('#err_section').html('Select Section.');
        return false;
      } else{
        $('#err_section').html('');
      }

      if(examType === ''){
        $('#err_exam_type').html('Select Exam Type.');
        return false;
      } else{
        $('#err_exam_type').html('');
      }

      if(classGroup === ''){
        $('#err_class_group').html('Select Class Group.');
        return false;
      } else{
        $('#err_class_group').html('');
      }

      // Student data
      $.ajax({
        url: "<?php echo base_url('student/student_progress_report_data') ?>/",
        type: "POST",
        dataType: "JSON",
        data: {
          academic_year : academicYear,
          class_name: className,
          section_name: section,
          class_group: classGroup
        },
        async: false,
        success: function(response){
          console.log(response);
          let studentDataTable = $('#index').DataTable();
          studentDataTable.destroy();
          $('#records').empty();

          let trHTML = '';
          
          $.each(response.data, function(i, item){
            trHTML += '<tr>';
              trHTML += '<td></td>';
              trHTML += '<td>' + item.student_class_id + '</td>';
              trHTML += '<td>' + item.roll + '</td>';
              trHTML += '<td>' + item.name + '</td>';
              trHTML += '<td><a class="btn btn-info btn-flat" onclick="individualProgressReport('+item.student_id+', '+item.roll+', \''+item.name+'\')"><i class="fa fa-print"></i></a></td>';
            trHTML += '</tr>';
          });

          $('#records').append(trHTML);

          $(document).ready(function(){
            const t = $('#index').DataTable({
              "order": [[2, 'asc']],
              "pageLength": 100
            });

            t.on('order.dt search.dt', function(){
              t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i){
                cell.innerHTML = i+1;
              });
            }).draw();
          });
        }
      });
    });
  });
</script>
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

<script type="text/javascript">
  function delete_id(exam_id){
     if(confirm('Sure to remove this record?')){
        window.location.href='<?php  echo base_url('exam/delete_exam/'); ?>' + exam_id;
     }
  }
</script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h5>
      <ol class="breadcrumb">
        <li>
          <a href="<?php echo base_url('auth/dashboard'); ?>" class="text-black"><i class="fa fa-dashboard">&nbsp;</i><strong><?php echo $this->lang->line('header_dashboard'); ?></strong></a>
        </li>

        <li>
          <a href="<?php echo base_url('product/local_list'); ?>" class="text-black"><strong><?php echo $this->lang->line('header_exam'); ?></strong></a>
        </li>

        <li class="active">
          <?php echo $this->lang->line('exam_list'); ?>
        </li>
      </ol>
    </h5> 
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php
        if($message = $this->session->flashdata('success_message')){
      ?>
        <div class="col-md-12">
          <div class="alert alert-success">
            <button class="close" data-dismiss="alert" type="button">×</button>
              <?php echo $message; ?>
            <div class="alerts-con"></div>
          </div>
        </div>
      <?php
        }
      ?>
      
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $this->lang->line('exam_list'); ?></h3>

            <a title="<?php echo $this->lang->line('configure_exam'); ?>" class="btn bg-gray" style="margin: 10px" href="<?php echo base_url('exam/configure');?>"><i class="fa fa-plus"></i></a>
          </div>
          <!-- /.box-header -->

          <div class="box-body">
            <table id="index" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Academic Year</th>
                  <th>Class Name</th>
                  <th>Subject Name</th>
                  <th>Section Name</th>
                  <th>Exam Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($data as $row){
                    $exam_id = $row->exam_id;
                ?>
                  <tr>
                    <td></td>
                    <td><?php echo $row->academic_year; ?></td>
                    <td><?php echo $row->class_name; ?></td>
                    <td><?php echo $row->course_name; ?></td>
                    <td><?php echo $row->section_name; ?></td>
                    <td><?php echo $row->exam_type; ?></td>
                    <td><?php echo $row->is_status == 1 ? 'Active' : 'Inactive'; ?></td>
                    <td>
                      <div class="dropdown">
                        <button title="Action" type="button" class="btn btn-sm bg-gray gropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog"></i>&nbsp;
                          <span class="fa fa-angle-double-down"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-right">
                          <li>
                            <a onclick="marks_entry(<?php echo $exam_id; ?>)" href="javascript:void(0);"><i class="fa fa-file-text-o"></i>Marks Entry</a>
                          </li>
                          <?php
                            if($this->session->userdata('type') === 'admin'){
                          ?>
                            <li>
                              <a href="<?php echo base_url('exam/edit/'); ?><?php echo $exam_id; ?>"><i class="fa fa-edit"></i>Edit</a>
                            </li>

                            <li>
                              <a href="javascript:delete_id(<?php echo $exam_id; ?>)"><i class="fa fa-trash-o"></i>Delete</a>
                            </li>
                          <?php
                            }
                          ?>
                        </ul>
                      </div>
                    </td>
                  </tr>
                <?php
                  }
                ?>
              <tfoot>
                <tr>
                  <th>SL.</th>
                  <th>Academic Year</th>
                  <th>Class Name</th>
                  <th>Subject Name</th>
                  <th>Section Name</th>
                  <th>Exam Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->

          <!-- modal -->
          <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog" style="width: 80%">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Marks Entry</h3>
                </div>
                
                <div class="modal-body">
                  <!-- Exam data -->
                  <h4><strong>Exam Data</strong></h4>

                  <table class="table table-bordered table-striped">
                    <tbody id="records">
                    </tbody>
                  </table>

                  <hr>

                  <!-- Student Data -->
                  <h4><strong>Student Data</strong></h4>
                  
                  <table id="index_2" class="table table-bordered table-striped">
                    <thead>
                      <th>SL.</th>
                      <th>Student ID</th>
                      <th>Roll</th>
                      <th>Student Name</th>
                      <th>Obtained Marks</th>
                      <th>Subjective Mark</th>
                      <th>Objective Mark</th>
                      <th>Practical Mark</th>
                    <thead>
                    <tbody id="records_2">
                    <tbody>
                    <tfoot>
                      <th>SL.</th>
                      <th>Student ID</th>
                      <th>Roll</th>
                      <th>Student Name</th>
                      <th>Obtained Marks</th>
                      <th>Subjective Mark</th>
                      <th>Objective Mark</th>
                      <th>Practical Mark</th>
                    </tfoot>
                  </table>

                  <div class="modal-footer" style="padding-left: 0;">
                    <div class="box-footer pull-left" style="padding-left: 0;">
                      <button type="button" onclick="save_marks(this)" class="button btn btn-success save">
                        <span class="submit" style="left: 30%">Save</span>
                        <span class="loading"><i class="fa fa-circle-o-notch"></i></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- /.box -->
      </div>
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
  function subjective_mark(ele, ele2){
    let subjective_mark = $(ele).val();
    const subjective_max_mark = ele2;

    if(+subjective_mark > subjective_max_mark){
      $(ele).val(subjective_max_mark);
      subjective_mark = subjective_max_mark;

      $(ele).closest('tr').find('td:eq(5)').find('span').html(`Subjective mark can be maximum of ${subjective_max_mark}.`);
    }

    const objective_mark = $(ele).closest('tr').find('td:eq(6)').find('.objective-mark').val();
    const practical_mark = $(ele).closest('tr').find('td:eq(7)').find('.practical-mark').val();
    const obtained_mark = parseFloat(subjective_mark ? subjective_mark : 0) + parseFloat(objective_mark ? objective_mark : 0) + parseFloat(practical_mark ? +practical_mark : 0);

    $(ele).closest('tr').find('td:eq(4)').find('.obtained-mark').html(parseFloat(obtained_mark).toFixed(2));
  }

  function objective_mark(ele, ele2){
    let objective_mark = $(ele).val();
    const objective_max_mark = ele2;

    if(+objective_mark > objective_max_mark){
      $(ele).val(objective_max_mark);
      objective_mark = objective_max_mark;

      $(ele).closest('tr').find('td:eq(6)').find('span').html(`Objective mark can be maximum of ${objective_max_mark}.`);
    }
    
    const subjective_mark = $(ele).closest('tr').find('td:eq(5)').find('.subjective-mark').val();
    const practical_mark = $(ele).closest('tr').find('td:eq(7)').find('.practical-mark').val();
    const obtained_mark = parseFloat(objective_mark ? objective_mark : 0) + parseFloat(subjective_mark ? subjective_mark : 0) + parseFloat(practical_mark ? +practical_mark : 0);

    $(ele).closest('tr').find('td:eq(4)').find('.obtained-mark').html(parseFloat(obtained_mark).toFixed(2));
  }

  function practical_mark(ele, ele2){
    let practical_mark = $(ele).val();
    const practical_max_mark = ele2;

    if(+practical_mark > practical_max_mark){
      $(ele).val(practical_max_mark);
      practical_mark = practical_max_mark;

      $(ele).closest('tr').find('td:eq(7)').find('span').html(`Practical mark can be maximum of ${practical_max_mark}.`);
    }

    const subjective_mark = $(ele).closest('tr').find('td:eq(5)').find('.subjective-mark').val();
    const objective_mark = $(ele).closest('tr').find('td:eq(6)').find('.objective-mark').val();
    const obtained_mark = parseFloat(practical_mark ? practical_mark : 0) + parseFloat(subjective_mark ? subjective_mark : 0) + parseFloat(objective_mark ? +objective_mark : 0);

    $(ele).closest('tr').find('td:eq(4)').find('.obtained-mark').html(parseFloat(obtained_mark).toFixed(2));
  }

  function marks_entry(exam_id){
    let academic_year = '';
    let class_name = '';
    let section_name = '';
    let class_group = '';
    let course_name = '';
    let subjective_mark = 0;
    let objective_mark = 0;
    let practical_mark = 0;

    // Exam data
    $.ajax({
      url: "<?php echo base_url('exam/exam_data') ?>/" + exam_id,
      type: "GET",
      dataType: "JSON",
      async: false,
      success: function(response){
        academic_year = response.data[0].academic_year;
        class_name = response.data[0].class_name;
        section_name = response.data[0].section_name;
        class_group = response.data[0].class_group;
        course_name = response.data[0].course_name;
        subjective_mark = response.data[0].subjective_mark;
        objective_mark = response.data[0].objective_mark;
        practical_mark = response.data[0].practical_mark;

        $('#records').empty();
        
        let trHTML = '';
        
        trHTML += '<tr>';
          trHTML += '<td><strong>Academic Year</strong></td>';
          trHTML += '<td>' + response.data[0].academic_year + '</td>';
          trHTML += '<td><strong>Class Name</strong></td>';
          trHTML += '<td>' + response.data[0].class_name + '</td>';
          trHTML += '<td><strong>Subject Name</strong></td>';
          trHTML += '<td>' + response.data[0].course_name + '</td>';
          trHTML += '<td><strong>Section Name</strong></td>';
          trHTML += '<td>' + response.data[0].section_name + '</td>';
        trHTML += '</tr>';
        trHTML += '<tr>';
          trHTML += '<td colspan="2"><strong>Exam Full Marks</strong></td>';
          trHTML += '<td colspan="2">' + response.data[0].total_mark + '</td>';
          trHTML += '<td colspan="2"><strong>Exam Type</strong></td>';
          trHTML += '<td colspan="2">' + response.data[0].exam_type + '</td>';
        trHTML += '</tr>';

        $('#records').append(trHTML);
      }
    });

    // Student data
    $.ajax({
      url: "<?php echo base_url('student/student_data') ?>/",
      type: "POST",
      dataType: "JSON",
      data: {
        class_name: class_name,
        section_name: section_name,
        class_group: class_group,
        exam_id: exam_id
      },
      async: false,
      success: function(response){
        let studentDataTable = $('#index_2').DataTable();
        studentDataTable.destroy();
        $('#records_2').empty();

        let trHTML2 = '';
        
        $.each(response.data, function(i, item){
          trHTML2 += '<tr>';
            trHTML2 += '<td></td>';
            trHTML2 += '<td>' + item.student_class_id + '<input type="hidden" value="'+item.student_id+'"><input type="hidden" value="'+course_name+'"></td>';
            trHTML2 += '<td>' + item.roll + '</td>';
            trHTML2 += '<td>' + item.name + '</td>';

            let obtained_mark = '';

            if(response.data2.length > 0){
              if(response.data2[i]?.obtained_mark){
                obtained_mark = response.data2[i].obtained_mark;
              }
            }

            trHTML2 += '<td><span class="obtained-mark">'+ obtained_mark +'</span></td>';
            trHTML2 += '<td><input type="number" step="any" class="form-control subjective-mark" placeholder="Input" value="'+(response.data2.length > 0 ? response.data2[i]?.subjective_mark : '')+'" oninput="subjective_mark(this, '+subjective_mark+')" onchange="subjective_mark(this, '+subjective_mark+')"><br><span style="color: red"></span></td>';
            trHTML2 += '<td><input type="number" step="any" class="form-control objective-mark" placeholder="Input" value="'+(response.data2.length > 0 ? response.data2[i]?.objective_mark : '')+'" oninput="objective_mark(this, '+objective_mark+')" onchange="objective_mark(this, '+objective_mark+')"><br><span style="color: red"></span></td>';
            trHTML2 += '<td><input type="number" step="any" class="form-control practical-mark" placeholder="Input" value="'+(response.data2.length > 0 ? response.data2[i]?.practical_mark : '')+'" oninput="practical_mark(this, '+practical_mark+')" onchange="practical_mark(this, '+practical_mark+')"><br><span style="color: red"></span></td>';
          trHTML2 += '</tr>';
        });

        $('#records_2').append(trHTML2);

        $(document).ready(function(){
          const t = $('#index_2').DataTable({
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

    $('.save').attr('data-id', exam_id);

    $('#modal_form').modal('show');
  }

  function save_marks(ele){
    const exam_id = $(ele).attr('data-id');
    const data_arr = [];
    let table = $('#index_2').DataTable();
    
    table.rows().every(function(){
      let row = $(this.node());
      let data_obj = {};

      data_obj['student_id'] = row.find('td:eq(1)').find('input:eq(0)').val();
      data_obj['exam_id'] = exam_id;
      data_obj['course_name'] = row.find('td:eq(1)').find('input:eq(1)').val();
      data_obj['obtained_mark'] = row.find('td:eq(4)').find('span').html();
      data_obj['subjective_mark'] = row.find('td:eq(5)').find('.subjective-mark').val();
      data_obj['objective_mark'] = row.find('td:eq(6)').find('.objective-mark').val();
      data_obj['practical_mark'] = row.find('td:eq(7)').find('.practical-mark').val();

      data_arr.push(data_obj);
    });

    $.ajax({
      url: "<?php echo base_url('student/marks') ?>/",
      type: "POST",
      dataType: "JSON",
      data: {
        marks: JSON.stringify(data_arr)
      },
      async: false,
      success: function(response){
        if(response){
          window.location.reload();
        }
      }
    });
  }
</script>
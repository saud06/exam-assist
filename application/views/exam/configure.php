<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  $p = array('admin');

  if(!(in_array($this->session->userdata('type'), $p))){
    redirect('auth');
  }

  $this->load->view('layout/header');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h5>
      <ol class="breadcrumb">
        <li>
          <a href="<?php echo base_url('auth/dashboard'); ?>" class="text-black"><i class="fa fa-dashboard">&nbsp;</i><strong><?php echo $this->lang->line('header_dashboard'); ?></strong></a>
        </li>

        <li>
          <a href="<?php echo base_url('exam/exam_list'); ?>" class="text-black"><strong><?php echo $this->lang->line('header_exam'); ?></strong></a>
        </li>

        <li class="active">
          <?php echo $this->lang->line('configure_exam'); ?>
        </li>
      </ol>
    </h5>    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php
        if($message = $this->session->flashdata('failure_message')){
      ?>
        <div class="col-md-12">
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert" type="button">×</button>
              <?php echo $message; ?>
            <div class="alerts-con"></div>
          </div>
        </div>
      <?php
        }
      ?>

      <!-- right column -->
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $this->lang->line('configure_exam'); ?></h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <form role="form" id="form" method="post" action="<?php echo base_url('exam/add_exam');?>">
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

                  <div class="form-group">
                    <label for="course_name">Course Name <span style="color: red;">*</span></label>
                    
                    <select class="form-control select2" id="course_name" name="course_name" style="width: 100%">
                      <option value="">Select</option>
                      <option value="Bangla I">Bangla I</option>
                      <option value="Bangla II">Bangla II</option>
                      <option value="English I">English I</option>
                      <option value="English II">English II</option>
                      <option value="Physics">Physics</option>
                    </select>

                    <span class="validation-color" id="err_course_name"><?php echo form_error('course_name'); ?></span>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="marks_config">Marks Configuration <span style="color: red;">*</span></label>

                    <table class="table items table-striped table-bordered table-condensed table-hover">
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group">
                              <input type="checkbox" name="is_subjective" id="is_subjective" value="1" class="minimal"/>&nbsp;
                              <label for="subjective_mark">Subjective <span style="color: red;">*</span></label>

                              <input type="number" step="any" class="form-control" id="subjective_mark" name="subjective_mark" placeholder="Input" value="<?php echo set_value('subjective_mark'); ?>">

                              <span class="validation-color" id="err_subjective_mark"><?php echo form_error('is_subjective') . ' ' . form_error('subjective_mark'); ?></span>
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <label for="subjective_pass_mark">Pass Mark <span style="color: red;">*</span></label>

                              <input type="number" step="any" class="form-control" id="subjective_pass_mark" name="subjective_pass_mark" placeholder="Input" value="<?php echo set_value('subjective_pass_mark'); ?>">

                              <span class="validation-color" id="err_subjective_pass_mark"><?php echo form_error('subjective_pass_mark'); ?></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group">
                              <input type="checkbox" name="is_objective" id="is_objective" value="1" class="minimal"/>&nbsp;
                              <label for="objective_mark">Objective <span style="color: red;">*</span></label>

                              <input type="number" step="any" class="form-control" id="objective_mark" name="objective_mark" placeholder="Input" value="<?php echo set_value('objective_mark'); ?>">

                              <span class="validation-color" id="err_objective_mark"><?php echo form_error('is_objective') . ' ' . form_error('objective_mark'); ?></span>
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <label for="objective_pass_mark">Pass Mark <span style="color: red;">*</span></label>

                              <input type="number" step="any" class="form-control" id="objective_pass_mark" name="objective_pass_mark" placeholder="Input" value="<?php echo set_value('objective_pass_mark'); ?>">

                              <span class="validation-color" id="err_objective_pass_mark"><?php echo form_error('objective_pass_mark'); ?></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group">
                              <input type="checkbox" name="is_practical" id="is_practical" value="1" class="minimal"/>&nbsp;
                              <label for="practical_mark">Practical <span style="color: red;" class="practical_mark_span"></span></label>

                              <input type="number" step="any" class="form-control" id="practical_mark" name="practical_mark" placeholder="Input" value="<?php echo set_value('practical_mark'); ?>">

                              <span class="validation-color" id="err_practical_mark"><?php echo form_error('is_practical') . ' ' . form_error('practical_mark'); ?></span>
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <label for="practical_pass_mark">Pass Mark <span style="color: red;" class="practical_pass_mark_span"></span></label>

                              <input type="number" step="any" class="form-control" id="practical_pass_mark" name="practical_pass_mark" placeholder="Input" value="<?php echo set_value('practical_pass_mark'); ?>">

                              <span class="validation-color" id="err_practical_pass_mark"><?php echo form_error('practical_pass_mark'); ?></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <div class="form-group">
                              <label for="total_mark">Exam Mark <span style="color: red;">*</span></label>

                              <input type="number" step="any" class="form-control" id="total_mark" name="total_mark" placeholder="Input" value="<?php echo set_value('total_mark'); ?>">

                              <span class="validation-color" id="err_total_mark"><?php echo form_error('total_mark'); ?></span>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="form-group">
                    <input type="checkbox" name="is_attendance" id="is_attendance" value="1" class="minimal"/>&nbsp;
                    <label style="margin-right: 10px;">Attendance</label>

                    <input type="checkbox" name="is_status" id="is_status" value="1" class="minimal"/>&nbsp;
                    <label>Status <span style="color: red;">*</span></label>

                    <br>

                    <span class="validation-color" id="err_status"><?php echo form_error('is_status'); ?></span>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="box-footer" style="padding: 0;">
                    <button type="submit" id="submit" class="button btn btn-success">
                      <span class="submit" style="left: 30%">Save</span>
                      <span class="loading"><i class="fa fa-circle-o-notch"></i></span>
                    </button>

                    <span class="btn btn-danger" id="cancel" onclick="cancel('exam/exam_list')">Cancel</span>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
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

<script>
  $(document).ready(function(){
    $('#course_name').change(function(){
      const courseName = $(this).val();

      if(courseName === 'Physics'){
        $('.practical_mark_span, .practical_pass_mark_span').html('*');
      } else{
        $('.practical_mark_span, .practical_pass_mark_span').html('');
      }
    });

    $('#form').submit(function(){
      const academicYear = $('#academic_year').val();
      const className = $('#class').val();
      const section = $('#section').val();
      const examType = $('#exam_type').val();
      const classGroup = $('#class_group').val();
      const courseName = $('#course_name').val();

      const isSubjective = $('#is_subjective').is(':checked');
      const isObjective = $('#is_objective').is(':checked');
      const isPractical = $('#is_practical').is(':checked');

      const subjectiveMark = $('#subjective_mark').val();
      const objectiveMark = $('#objective_mark').val();
      const practicalMark = $('#practical_mark').val();

      const subjectivePassMark = $('#subjective_pass_mark').val();
      const objectivePassMark = $('#objective_pass_mark').val();
      const practicalPassMark = $('#practical_pass_mark').val();

      const totalMark = $('#total_mark').val();

      const attendance = $('#attendance').val();
      const isStatus = $('#is_status').is(':checked');

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

      if(courseName === ''){
        $('#err_course_name').html('Select Course Name.');
        return false;
      } else{
        $('#err_course_name').html('');
      }

      if(!isSubjective){
        $('#err_subjective_mark').html('Check Subjective.');
        return false;
      } else if(subjectiveMark === ''){
        $('#err_subjective_mark').html('Input Subjective Mark.');
        return false;
      } else{
        $('#err_subjective_mark').html('');
      }

      if(subjectivePassMark === ''){
        $('#err_subjective_pass_mark').html('Input Subjective Pass Mark.');
        return false;
      } else{
        $('#err_subjective_pass_mark').html('');
      }

      if(!isObjective){
        $('#err_objective_mark').html('Check Objective.');
        return false;
      } else if(objectiveMark === ''){
        $('#err_objective_mark').html('Input Objective Mark.');
        return false;
      } else{
        $('#err_objective_mark').html('');
      }

      if(objectivePassMark === ''){
        $('#err_objective_pass_mark').html('Input Objective Pass Mark.');
        return false;
      } else{
        $('#err_objective_pass_mark').html('');
      }

      if(courseName === 'Physics'){
        if(!isPractical){
          $('#err_practical_mark').html('Check Practical.');
          return false;
        } else if(practicalMark === ''){
          $('#err_practical_mark').html('Input Practical Mark.');
          return false;
        } else{
          $('#err_practical_mark').html('');
        }

        if(practicalPassMark === ''){
          $('#err_practical_pass_mark').html('Input Practical Pass Mark.');
          return false;
        } else{
          $('#err_practical_pass_mark').html('');
        }
      }

      if(totalMark === ''){
        $('#err_total_mark').html('Input Exam Mark.');
        return false;
      } else{
        $('#err_total_mark').html('');
      }

      if(courseName !== 'Physics'){
        if(+subjectiveMark !== (+totalMark*70)/100){
          $('#err_subjective_mark').html('Subjective Mark should be 70% of Exam Mark.');
          return false;
        } else{
          $('#err_subjective_mark').html('');
        }

        if(+subjectivePassMark !== (+subjectiveMark*40)/100){
          $('#err_subjective_pass_mark').html('Subjective Pass Mark should be 40% of Subjective Mark.');
          return false;
        } else{
          $('#err_subjective_pass_mark').html('');
        }

        if(+objectiveMark !== (+totalMark*30)/100){
          $('#err_objective_mark').html('Objective Mark should be 30% of Exam Mark.');
          return false;
        } else{
          $('#err_objective_mark').html('');
        }

        if(+objectivePassMark !== (+objectiveMark*40)/100){
          $('#err_objective_pass_mark').html('Objective Pass Mark should be 40% of Objective Mark.');
          return false;
        } else{
          $('#err_objective_pass_mark').html('');
        }
      } else{
        if(+subjectiveMark !== (+totalMark*50)/100){
          $('#err_subjective_mark').html('Subjective Mark should be 50% of Exam Mark.');
          return false;
        } else{
          $('#err_subjective_mark').html('');
        }

        if(+subjectivePassMark !== (+subjectiveMark*40)/100){
          $('#err_subjective_pass_mark').html('Subjective Pass Mark should be 40% of Subjective Mark.');
          return false;
        } else{
          $('#err_subjective_pass_mark').html('');
        }

        if(+objectiveMark !== (+totalMark*25)/100){
          $('#err_objective_mark').html('Objective Mark should be 25% of Exam Mark.');
          return false;
        } else{
          $('#err_objective_mark').html('');
        }

        if(+objectivePassMark !== (+objectiveMark*40)/100){
          $('#err_objective_pass_mark').html('Objective Pass Mark should be 40% of Objective Mark.');
          return false;
        } else{
          $('#err_objective_pass_mark').html('');
        }

        if(+practicalMark !== (+totalMark*25)/100){
          $('#err_practical_mark').html('Practical Mark should be 25% of Exam Mark.');
          return false;
        } else{
          $('#err_practical_mark').html('');
        }

        if(+practicalPassMark !== (+practicalMark*40)/100){
          $('#err_practical_pass_mark').html('Practical Pass Mark should be 40% of Prqactical Mark.');
          return false;
        } else{
          $('#err_practical_pass_mark').html('');
        }
      }

      if(!isStatus){
        $('#err_status').html('Check Status.');
        return false;
      } else{
        $('#err_status').html('');
      }

      $(this).find(':button[type=submit]').prop('disabled', true);
      $('.button').css('cursor', 'default');
      $('.button').toggleClass('active');
    });
  }); 
</script>
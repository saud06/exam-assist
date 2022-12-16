<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  $p = array('admin');

  if(!(in_array($this->session->userdata('type'), $p))){
    redirect('auth');
  }

  $this->load->view('layout/header');
?>

<table>
  <tbody>
    <tr>
      <td style="width: 150px; text-align: center"></td>
      <td style="width: 400px; text-align: center; font-weight: bold;">
        <?php echo $exam_data[0]->exam_type; ?><br>
        Class - <?php echo $exam_data[0]->class_name; ?>
      </td>
      <td style="width: 150px; text-align: center">
        <table border="1">
          <thead>
            <tr>
              <th style="text-align: center; padding: 2px; border: 1px solid black">Letter Grade</th>
              <th style="text-align: center; padding: 2px; border: 1px solid black">Class Interval</th>
              <th style="text-align: center; padding: 2px; border: 1px solid black">Point</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">A+</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">80-100</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">5.00</td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">A</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">70-79</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">4.00</td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">A-</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">60-69</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">3.50</td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">B</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">50-59</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">3.00</td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">C</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">40-49</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">2.00</td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">D</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">33-39</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">1.00</td>
            </tr>
            <tr>
              <td style="text-align: center; padding: 2px; border: 1px solid black">F</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">0-32</td>
              <td style="text-align: center; padding: 2px; border: 1px solid black">0.00</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>

<br>

<?php
  $total = 0;
  $total2 = 0;
  $total3 = 0;
  $lg = '';
  $lg2 = '';
  $lg3 = '';
  $gp = '';
  $gp2 = '';
  $gp3 = '';

  // Get totals
  foreach($marks_data as $key => $row){
    if($key == 0 || $key == 1){
      $total += $row->subjective_mark + $row->objective_mark;
    } elseif($key == 2 || $key == 3){
      $total2 += $row->subjective_mark + $row->objective_mark;
      if($row->subjective_mark + $row->objective_mark < 33){
        $lg2 = 'F';
        $gp2 = '0.00';
      }
    } else{
      $total3 += $row->subjective_mark + $row->objective_mark + $row->practical_mark;
    }
  }

  // Get LG & GP for Bangla
  if($total/2 >= 80){
    $lg = 'A+';
    $gp = '5.00';
  } elseif($total/2 >= 70 && $total/2 <= 79){
    $lg = 'A';
    $gp = '4.00';
  } elseif($total/2 >= 60 && $total/2 <= 69){
    $lg = 'A-';
    $gp = '3.50';
  } elseif($total/2 >= 50 && $total/2 <= 59){
    $lg = 'B';
    $gp = '3.00';
  } elseif($total/2 >= 40 && $total/2 <= 49){
    $lg = 'C';
    $gp = '2.00';
  } elseif($total/2 >= 33 && $total/2 <= 39){
    $lg = 'D';
    $gp = '1.00';
  } else{
    $lg = 'F';
    $gp = '0.00';
  }

  // Get LG & GP for English
  if(!$lg2 && !$gp2){
    if($total2/2 >= 80){
      $lg2 = 'A+';
      $gp2 = '5.00';
    } elseif($total2/2 >= 70 && $total2/2 <= 79){
      $lg2 = 'A';
      $gp2 = '4.00';
    } elseif($total2/2 >= 60 && $total2/2 <= 69){
      $lg2 = 'A-';
      $gp2 = '3.50';
    } elseif($total2/2 >= 50 && $total2/2 <= 59){
      $lg2 = 'B';
      $gp2 = '3.00';
    } elseif($total2/2 >= 40 && $total2/2 <= 49){
      $lg2 = 'C';
      $gp2 = '2.00';
    } elseif($total2/2 >= 33 && $total2/2 <= 39){
      $lg2 = 'D';
      $gp2 = '1.00';
    } else{
      $lg2 = 'F';
      $gp2 = '0.00';
    }
  }

  // Get LG & GP for Physics
  if($total3 >= 80){
    $lg3 = 'A+';
    $gp3 = '5.00';
  } elseif($total3 >= 70 && $total3 <= 79){
    $lg3 = 'A';
    $gp3 = '4.00';
  } elseif($total3 >= 60 && $total3 <= 69){
    $lg3 = 'A-';
    $gp3 = '3.50';
  } elseif($total3 >= 50 && $total3 <= 59){
    $lg3 = 'B';
    $gp3 = '3.00';
  } elseif($total3 >= 40 && $total3 <= 49){
    $lg3 = 'C';
    $gp3 = '2.00';
  } elseif($total3 >= 33 && $total3 <= 39){
    $lg3 = 'D';
    $gp3 = '1.00';
  } else{
    $lg3 = 'F';
    $gp3 = '0.00';
  }
?>

<table>
  <tbody>
    <tr>
      <td style="width: 200px;">Faculty: <?php echo $exam_data[0]->class_group; ?></td>
      <td style="width: 300px;">Name of Student: <?php echo $student_data['student_name']; ?></td>
      <td style="width: 200px;">GPA: <?php echo number_format(((float)$gp + (float)$gp2 + (float)$gp3)/3, 2, '.', ''); ?></td>
    </tr>
    <tr>
      <td style="width: 200px;">Section: <?php echo $exam_data[0]->section_name; ?></td>
      <td style="width: 350px;">Roll: <?php echo $student_data['student_roll']; ?></td>
      <td style="width: 200px;"></td>
    </tr>
  </tbody>
</table>

<br>

<table>
  <thead>
    <tr>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">SL.</th>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">Subjects</th>
      <th colspan="3" style="text-align: center; padding: 5px; border: 1px solid black">Full marks</th>
      <th colspan="3" style="text-align: center; padding: 5px; border: 1px solid black">Obtained marks</th>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">Total of<br>(Written+MCQ)</th>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">100 of<br>(Written+MCQ)</th>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">Total Marks</th>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">LG</th>
      <th rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">GP</th>
    </tr>
    <tr>
      <th style="text-align: center; padding: 5px; border: 1px solid black">Sub</th>
      <th style="text-align: center; padding: 5px; border: 1px solid black">Obj</th>
      <th style="text-align: center; padding: 5px; border: 1px solid black">Prac</th>
      <th style="text-align: center; padding: 5px; border: 1px solid black">Written</th>
      <th style="text-align: center; padding: 5px; border: 1px solid black">MCQ</th>
      <th style="text-align: center; padding: 5px; border: 1px solid black">Practical</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($marks_data as $key => $row){
    ?>
      <tr>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $key+1; ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->course_name; ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->max_subjective ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->max_objective ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->max_practical ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->subjective_mark ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->objective_mark ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->practical_mark ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->subjective_mark + $row->objective_mark + $row->practical_mark ?></td>
        <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->subjective_mark + $row->objective_mark + $row->practical_mark ?></td>
        <?php
          if($key == 0 || $key == 2){
        ?>
          <td rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">
            <?php
              if($key == 0){
                echo $total;
              } elseif($key == 2){
                echo $total2;
              }
            ?>
          </td>
          <td rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">
            <?php
              if($key == 0){
                echo $lg;
              } elseif($key == 2){
                echo $lg2;
              }
            ?>
          </td>
          <td rowspan="2" style="text-align: center; padding: 5px; border: 1px solid black">
            <?php
              if($key == 0){
                echo $gp;
              } elseif($key == 2){
                echo $gp2;
              }
            ?>
          </td>
        <?php
          } elseif($key == 4){
        ?>
          <td style="text-align: center; padding: 5px; border: 1px solid black"><?php echo $row->subjective_mark + $row->objective_mark + $row->practical_mark ?></td>
          <td style="text-align: center; padding: 5px; border: 1px solid black">
            <?php
              if($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 80) echo 'A+';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 70 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 79) echo 'A';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 60 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 69) echo 'A-';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 50 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 59) echo 'B';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 40 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 49) echo 'C';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 33 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 39) echo 'D';
              else echo 'F';
            ?>
          </td>
          <td style="text-align: center; padding: 5px; border: 1px solid black">
            <?php
              if($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 80) echo '5.00';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 70 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 79) echo '4.00';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 60 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 69) echo '3.50';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 50 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 59) echo '3.00';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 40 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 49) echo '2.00';
              elseif($row->subjective_mark + $row->objective_mark + $row->practical_mark >= 33 && $row->subjective_mark + $row->objective_mark + $row->practical_mark <= 39) echo '1.00';
              else echo '0.00';
            ?>
          </td>
        <?php
          }
        ?>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
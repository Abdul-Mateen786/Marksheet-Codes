
<?php
$global_arr = array();
//echo print_array($global_arr);die();

$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
$promote_to = $data['promote_to'];
$global_arr = get_student_by_id($id);

 $co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];

//   echo print_array($global_arr);die();
}
$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$parent_mobile = !(isset($global_arr['parent_credentials']['parent_mobile']) || empty($global_arr['parent_credentials']['parent_mobile'])) ?'':'';

$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';
$stud_fname = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper($global_arr['student_details'][0]['first_name']):'';
$stud_mname = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name']))?strtoupper($global_arr['student_details'][0]['middle_name']):'';
$stud_lname = (isset($global_arr['student_details'][0]['last_name']) && !empty($global_arr['student_details'][0]['last_name']))?strtoupper($global_arr['student_details'][0]['last_name']):'';

$stud_name = $stud_lname.' '.$stud_fname.' '.$stud_mname;

$stud_nationality = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
$gr_number = (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'';
$aadhar_no = (isset($global_arr['student_details'][0]['aadhar_no']) && !empty($global_arr['student_details'][0]['aadhar_no']))?''.$global_arr['student_details'][0]['aadhar_no'].'':'';
$dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';
$place_of_birth = (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';
$admission_year = (isset($global_arr['student_details'][0]['admission_year']) && !empty($global_arr['student_details'][0]['admission_year']))?''.$global_arr['student_details'][0]['admission_year'].'':'';
$religion = (isset($global_arr['student_details'][0]['religion']) && !empty($global_arr['student_details'][0]['religion']))?''.$global_arr['student_details'][0]['religion'].'':'';
$caste = (isset($global_arr['student_details'][0]['caste']) && !empty($global_arr['student_details'][0]['caste']))?''.$global_arr['student_details'][0]['caste'].'':'';
$stud_img = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_std = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard']:'';
$stud_div = (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section']:'';
$stud_dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_roll = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$parent_email = (isset($global_arr['parent_credentials']['parent_email']) && !empty($global_arr['parent_credentials']['parent_email']))?''.$global_arr['parent_credentials']['parent_email'].'':'';
$class_rank = (isset($global_arr['student_selected_class'][0]['rank']) && !empty($global_arr['student_selected_class'][0]['rank']))?''.$global_arr['student_selected_class'][0]['rank'].' '.$global_arr['student_selected_class'][0]['rank']:'';

$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];

$array_data = unserialize(base64_decode(get_session_data()['marksheet']));

//$this->session->unset_userdata('marksheet');
// $co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];

// echo print_array($array_data);die();

$sem1=[];
$sem2=[];
$sorted_arr = [];
$sem1_exms = [];
$sem2_exms = [];
$sem1_exms_name = [];
$sem2_exms_name = [];
$sem1_exms_tots = [];
$sem2_exms_tots = [];
$sem1_exms_marks_obt =[];
$sem2_exms_marks_obt=[];

$subjects = [];

$all_exams = [];

foreach ($array_data['exams'] as $k => $v) {
    // echo print_array($v);
    
$all_exams[$v['id']] =$v;
}

$subject_sequence_primary =['english','marathi','hindi','maths','e.v.s','computer','art','craft','health & p.Edu'];
if($class_rank > 80){

   $subject_sequence =['english','marathi','hindi','maths', 'science','social_science','drawing','computer','art','p.e'];

}else{
    $subject_sequence =['english','marathi','hindi','maths','science','e.v.s','evs','evs_1','evs_2','e.v.s_1','e.v.s_2','computer','art','craft','sports','p.e','w.e','drawing'];

}

    foreach ($subject_sequence as $k_sub => $v_sub)
    
        {
                foreach($array_data['data'] as $key_data => $data)
    
                        {
    
    
                                $arr_subj = str_replace(' ','_',(strtolower(trim($data['subject_name']))));
                                if($v_sub == $arr_subj)
                                {
                                $sorted_arr[] = $data;
                                }
                        }
        }

//         end

foreach($array_data['data'] as $key_data => $data)
        {


        $temp=[];
        $temp1=[];
                foreach($data['exam'] as $key_exam => $v1)
                {


              //-------- ADD SUBJECTS IN SUBJECTS ARRAY
                        (!(in_array($data['subject_name'],$subjects))) ? $subjects[] = $data['subject_name'] : FALSE;

                        $v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
                        $t = $data['exam'][$key_exam];
                        $t['subject_name'] = $data['subject_name'];
                        //----------------------------FOR SEM 1-------------------
                        if( $v1['sem'] == 1){
                            $temp[$v1['exam_id']]  = $t;
                    $sem1_exms_tots[$v1['exam_id']] = !(isset($sem1_exms_tots[$v1['exam_id']])) ? 0 :$sem1_exms_tots[$v1['exam_id']];
                    $sem1_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem1_exms_tots[$v1['exam_id']];
                                        !(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;
                                        $sem1[$key_data]['subject_name'] = $data['subject_name'];
                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[$v1['exam_id']]  = $t;
                    $sem2_exms_tots[$v1['exam_id']] = !(isset($sem2_exms_tots[$v1['exam_id']])) ? 0 :$sem2_exms_tots[$v1['exam_id']];
                    $sem2_exms_name[$v1['exam_id']] = $v1['exam_name'];
                    $sem2_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem2_exms_tots[$v1['exam_id']];
                                        !(in_array($v1['exam_id'],$sem2_exms)) ? $sem2_exms[] = $v1['exam_id'] : FALSE;
                                        $sem2[$key_data]['subject_name'] = $data['subject_name'];
                                        

          }
                }
                !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
                !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
        }

        foreach ($sem1 as $k => $v) 
        {

            foreach ($all_exams as $k3 => $v3) {
                if(isset($sem1[$k])){
                    $pcs_id = max(array_unique(array_column($sem1[$k]['exam'],'pcs_id')));
                    $sub_name = array_column($sem1[$k]['exam'],'subject_name');
                    if(!(isset($sem1[$k]['exam'][$k3])) && ($v3['sem'] == '1') ) {
                        $v3['exam_id'] =$v3['id']; 
                        $v3['exam_name'] =$v3['name']; 
                        $v3['pcs_id'] =$pcs_id; 
                        $v3['marks_obtained'] = '-';
                        $v3['passing_marks'] = '-';
                        $v3['total_marks'] = '-';
                        $v3['exam_type'] = '';
                        $v3['subject_name'] = $sub_name[0];
                        $sem1[$k]['exam'][$k3] = $v3;
                    }
                }
            }
            ksort($sem1[$k]['exam']);
        }
        foreach($sem1 as $k => $val) {
            foreach($val['exam'] as $k1 => $v1) {
                $sem1_exms_name[$v1['exam_id']] = $v1['exam_name'];
            }
        }
        
        foreach ($sem2 as $k => $v) 
        {

            foreach ($all_exams as $k3 => $v3) {
                if(isset($sem2[$k])){
                    $pcs_id = max(array_unique(array_column($sem2[$k]['exam'],'pcs_id')));
                    $sub_name = array_column($sem2[$k]['exam'],'subject_name');
                    if(!(isset($sem2[$k]['exam'][$k3])) && ($v3['sem'] == '2') ) {
                        $v3['exam_id'] =$v3['id']; 
                        $v3['exam_name'] =$v3['name']; 
                        $v3['marks_obtained'] = '-';
                        $v3['total_marks'] = '-';
                        $v3['subject_name'] = $sub_name[0];
                        $v3['passing_marks'] = '-';
                        $v3['pcs_id'] =$pcs_id; 
                        $v3['exam_type'] = '';
                        $sem2[$k]['exam'][$k3] = $v3;
                    }
                }

            }
            ksort($sem2[$k]['exam']);
        }
        
        foreach($sem2 as $k => $val) {
            foreach($val['exam'] as $k1 => $v1) {
                $sem2_exms_name[$v1['exam_id']] = $v1['exam_name'];
            }
        }
        // echo print_array($sem2);die();


$sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + count($sem1[0]['exam']))+1 : 4;
$sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) +count($sem2[0]['exam']))+1 : 4;
$sem1_m =  isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) +0) : 0;
$sem2_m =  isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 0) : 0;
//echo print_array($sem1_e);die();

   // GRADE FUNCTION

$gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];
function check_grade($marks)
{
    $grade ;
    if($marks <= 20){ $grade = 'E-2';  return $grade;   }
    elseif($marks >= 21 && $marks <= 32)    {$grade = 'E-1';   return $grade; }
    elseif($marks >= 33 && $marks <= 40)    {$grade = 'D';     return $grade; }
    elseif($marks >= 41 && $marks <= 50)    {$grade = 'C-2';   return $grade; }
    elseif($marks >= 51 && $marks <= 60)    {$grade = 'C-1';   return $grade; }
    elseif($marks >= 61 && $marks <= 70)    {$grade = 'B-2';   return $grade; }
    elseif($marks >= 71 && $marks <= 80)    {$grade = 'B-1';   return $grade; }
    elseif($marks >= 81 && $marks <= 90)    {$grade = 'A-2';   return $grade; }
    elseif($marks >= 91 && $marks <= 100)   {$grade = 'A-1';   return $grade; }
}

function check_grade1($grade)
{
    $remarks = 'NA';
    // echo $grade;die('reached');
    ($grade == 'D') ? $remarks =  'Not fit for the current standard' : FALSE;
    ($grade == 'C-2') ? $remarks =  'Need to work hard' : FALSE;
    ($grade == 'C-1') ? $remarks =  'Can do better' : FALSE;
    ($grade == 'B-2') ? $remarks =  'Fiar' : FALSE;
    ($grade == 'B-1') ? $remarks =  'Good' : FALSE;
    ($grade == 'A-2') ? $remarks =  'Very Good' : FALSE;
    ($grade == 'A-1') ? $remarks =  'Excellent' : FALSE;
    return $remarks;
    // if($marks <= 20){ $remarks = '';}
    // elseif($marks >= 21 && $marks <= 32)    {$remarks =  '';}
    // elseif($marks >= 33 && $marks <= 40)    {$remarks =  'Not fit for the current standard';}
    // elseif($marks >= 41 && $marks <= 50)    {$remarks =  'Need to work hard';}
    // elseif($marks >= 51 && $marks <= 60)    {$remarks =  'Can do better';}
    // elseif($marks >= 61 && $marks <= 70)    {$remarks =  'Fair';}
    // elseif($marks >= 71 && $marks <= 80)    {$remarks =  'Good';}
    // elseif($marks >= 81 && $marks <= 90)    {$remarks =  'Very Good';}
    // elseif($marks >= 91 && $marks <= 100)   {$remarks =  'Excellent';}
    // return $remarks; 
}


?>

<?php if ($stud_std == '9' || $stud_std == '10' ) { ?>

<section onload="setTimeout(myFunction(), 3000)">
<style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }

    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;} {page-break-after: always;page-break-inside : avoid;} }
    td { vertical-align:center;border: 1px; border-style:solid;}
    th { text-align: center; vertical-align:center;border: 1px;}
    .center{text-align: center; }
    .my-table tbody,.my-table td,.my-table th,.my-table {
    border : 0;
}

.grid-container {
  display: grid;
  grid-template-columns: 48% 52%;
  
  padding: 3px;
}

.grid-1 { grid-area: 1; }
.grid-2 { grid-area: 1; }

</style>

<?php if(count($sem1) && count($sem2)==0): ?>
    <style> .grid-container { grid-template-columns: 100% !important; } .grid-2{ display:none !important; }</style>
<?php elseif(count($sem2) && count($sem1)==0): ?>
    <style> .grid-container { grid-template-columns: 100% !important; } .grid-1{ display:none !important; }</style>
<?php else: ?>
    <style> .grid-container { grid-template-columns: 48% 52% !important; }</style>
<?php endif; ?>

<!-- <script>
$('.common_input').keyup(function(){
        $(this).attr('value',$(this).val());
    });
</script> -->
<!--MARKSHEET DIV STARTS-->
<div class="marksheet-div" style="padding:3%;">
    <div>
        <div style="width:10%; height:4%; border:1px solid black; float:right;">
        RollNo:<?php echo $stud_roll;  ?>
        </div>
        <!--START OF HEADER BLOCK-->
        <div id="header_block" style="display:flex;">
            <div id="school_logo" style="width:15%">
                <img width="100px" height="100px" src="<?php echo $stud_school_logo; ?>">
            </div>
            <div id="school_name" style="width:85%;">
                <center>
                    <span style="font-size:1.5em;font-weight:700;font-family:Arial, Helvetica, sans-serif;"><?php echo strtoupper($stud_school_name); ?></span><br>
                    <span style="font-size:70%;font-weight:300;font-family:Arial, Helvetica, sans-serif;"><i>M. U. MANDLECHA MARG, CHEMBUR, MUMBAI - 400071</i></span><br><br>
                    <span style="font-size:2em;font-weight:300;"> </span><b>PROGRESS CARD</b> <br>
                </center>
            </div>
        </div>
    </div>
    <div>
        <span style="font-size:1em;font-weight:300;"> </span><b>Name of the Student:</b> <?php echo $stud_name;  ?>&emsp;
        <span style="font-size:1em;font-weight:300;"> </span><b>Class: </b><?php echo $stud_std;  ?> &nbsp;&nbsp;<b>Div:</b><?php echo $stud_div;  ?>&emsp;
        <span style="font-size:1em;font-weight:300;"> </span><b>Date of Birth:</b> <?php echo $dob;  ?>&emsp;
        <span style="font-size:1em;font-weight:300;"> </span><b>G. R. No:</b> <?php echo $gr_number;  ?><br>
    </div>
    <div class="grid-container">
        <div class="grid-1">
            <table style="width:100%;border-style:solid; border-collapse: collapse; line-height:20px;border:1px;font-size:0.8rem;">
                <tr>
                <?php
                echo "<td></td><td colspan='$sem1_e' class='center' > <b><font color='black'> I SEMESTER<font></b></td>";
                ?>
                </tr>

                <tr style="font-size:70%;">
                <?php 
                
                    echo "<th style='border:solid 1px;'>SUBJECTS</th>";

                foreach($sem1_exms_name as  $v_exam)
                    {
                            echo "<th style='border:solid 1px;'>". $v_exam ."</th><th>OUT OF</th>";
                    }
                    echo "<th style='border:solid 1px;'>TOTAL</th>";
                    
                    ?>
                </tr>
                                            <!--Sem 1 -->
                <?php
                $sem1_table ='';
                $grand_total=[];
                $grand_max_marks=[];
                $gto =0;
                $gtm =0;
                $percent = 0;   
                if(count($sem1)){

                        foreach ($sem1 as $k1 => $v1) {
                        $sub_name = array_column($v1['exam'],'subject_name');
                        $sem1_table.="<tr class = 'marks_row'><td>".$sub_name[0]."</td>";

                                $total_marks_obtainedsem1 =0;
                                $total_max_markssem1 =0;
                                $sub_name = '';
                                

                                        //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS
                                    ksort($v1['exam']);
                                        foreach ($v1['exam'] as $k2 => $v2) {
                                            $sub_name = $v2['subject_name'];
                                    $percent=0;

                                    (!isset($grand_total[$v2['pcs_id']]))?$grand_total[$v2['pcs_id']]=0:false;
                                    (!isset($grand_max_marks[$v2['pcs_id']]))?$grand_max_marks[$v2['pcs_id']]=0:false;
                                    $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
                                    $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
                                    $total_marks_obtainedsem1 += $v2['marks_obtained'];
                                    $total_max_markssem1 += $v2['total_marks'];
                                    $sem1_table.="<td class='center'>".$v2['marks_obtained'] ."</td>"
                                    ."<td class='center'>".$v2['total_marks']."</td>";
                                    $grand_total[$v2['pcs_id']]+=$v2['marks_obtained'];
                                    $grand_max_marks[$v2['pcs_id']]+=$v2['total_marks'];
                                    $gto +=$v2['marks_obtained'];
                                    $gtm +=$v2['total_marks'];   
                                }
                                
                                //---------Showing Grade for some pericular subjects----------//
                                $percent= round(($total_marks_obtainedsem1/$total_max_markssem1)*100);
                                if($sub_name == "P E" || $sub_name == "RSP/DE" || $sub_name == "S D"){
                                $sem1_table.="<td class='center'>".check_grade($percent)."</td>";
                                }
                                else{
                                $sem1_table.="<td class='center'>$total_marks_obtainedsem1/$total_max_markssem1</td>";
                                }
                                $sem1_table.="</tr>";

                
                        }
                        //------For calculate percentage---------//
                        if(count($sem2)){
                            foreach ($sem2 as $k1 => $v1) {
                                foreach ($v1['exam'] as $k2 => $v2) {
                                    $gto +=$v2['marks_obtained'];
                                    $gtm +=$v2['total_marks'];                            
                                }
                            }
                        }
                        $percent= round(($gto/$gtm)*100);
                        
                        // END OF SEM 2 FOR LOOP
                    
                    $pc_id = $global_arr['student_selected_class'][0]['pc_id'];


                            if(count($co_scho_res)){
                            if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0))
                            {
                            
                            
                            $trs = "";
                            // echo print_array($co_scho_res[$pc_id]);die;
                            foreach($co_scho_res[$pc_id]['1'] as $k => $v) {

                                $sem1_table.="<tr><td>".$v['curriculum_name']."</td>";

                                foreach($sem1_exms_name as  $v_exam)
                                        {
                                            $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                        }
                                        $sem1_table.="<td class='center' contenteditable='true'></td></tr>";
                                    }
                                    }
                                    }
                    
                                $sem1_table.='<tr><td>TOTAL</td>';
                                foreach($sem1_exms_name as  $v_exam){
                                    $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem1_table.='<td class="center" contenteditable="true"></td></tr>';

                                $sem1_table.='<tr><td>PERCENTAGE</td><td class="center" contenteditable="true">'.$percent.' &#37;</td>';
                                foreach($sem1_exms_name as  $v_exam){
                                    $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem1_table.='</tr>';

                                $sem1_table.='<tr><td colspan="2">RANK</td>';
                                foreach($sem1_exms_name as  $v_exam){
                                    $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem1_table.='</tr>';

                                $sem1_table.='<tr><td colspan="2">CLASS TEACHER\'S SIGN</td>';
                                foreach($sem1_exms_name as  $v_exam){
                                    $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem1_table.='</tr>';

                                $sem1_table.='<tr><td colspan="2">PARENT\'S SIGN</td>';
                                foreach($sem1_exms_name as  $v_exam){
                                    $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem1_table.='</tr>';

                                $sem1_table.='<tr><td colspan="2">HEADMISTRESS SIGN</td>';
                                foreach($sem1_exms_name as  $v_exam){
                                    $sem1_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem1_table.='</tr>';
                }
                $sem1_table.='</table>';
                echo  $sem1_table ;
            ?>
        </div>
        <!--End Of Sem1-->
        <div class="grid-2">
        <table style="width:100%;border-style:solid; border-collapse: collapse; line-height:20px;border:1px;font-size:0.8rem;">
        
        <tr>
        <?php
        echo "<td colspan='$sem2_e' class='center' > <b><font color='black'> II SEMESTER<font></b></td>";
        ?>
        <td colspan="2" class="center"> <b><font color="black"><font></b></td>
        </tr>

        <tr style="font-size:70%;">

        <?php 

        foreach($sem2_exms_name as  $v_exam)
            {
                    echo "<th style='border:solid 1px;'>". $v_exam ."</th><th>OUT OF</th>";
            }
            echo "<th style='border:solid 1px;'>TOTAL</th>";
            echo "<th style='border:solid 1px;'>GRAND TOTAL</th>";
            echo "<th style='border:solid 1px;'>AVERAGE</th>";
            
            ?>
        </tr>


                                                <!--Sem 2 -->
        
        <?php
        $sem2_table ='';
        if(count($sem2)){

                foreach ($sem2 as $k1 => $v1) {

                        $total_marks_obtainedsem2 =0;
                        $total_max_markssem2 =0;
                                //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS
                                ksort($v1['exam']);
                        foreach ($v1['exam'] as $k2 => $v2) {
                            
                            //$percent=0;
                            (!isset($grand_total[$v2['pcs_id']]))?$grand_total[$v2['pcs_id']]=0:false;
                            (!isset($grand_max_marks[$v2['pcs_id']]))?$grand_max_marks[$v2['pcs_id']]=0:false;
                            $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
                            $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
                            $total_marks_obtainedsem2 += $v2['marks_obtained'];
                            $total_max_markssem2 += $v2['total_marks'];
                            $sem2_table.="<td class='center'>".$v2['marks_obtained'] ."</td>"
                            ."<td class='center'>".$v2['total_marks']."</td>";
                            $grand_total[$v2['pcs_id']]+=$v2['marks_obtained'];
                            $grand_max_marks[$v2['pcs_id']]+=$v2['total_marks'];
                            
                        }
                        
                        $sem2_table.="<td class='center'>$total_marks_obtainedsem2/$total_max_markssem2</td><td class='center'>".$grand_total[$v2['pcs_id']]."/".$grand_max_marks[$v2['pcs_id']]."</td>"
                        ."<td class='center'>".round($grand_total[$v2['pcs_id']]/2)."</td>"."</tr>";

                }

                // END OF SEM 2 FOR LOOP


            $pc_id = $global_arr['student_selected_class'][0]['pc_id'];


                    if(count($co_scho_res)){
                    if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0)){
                    
                    $trs = "";
                    // echo print_array($co_scho_res[$pc_id]);die;
                    foreach($co_scho_res[$pc_id]['1'] as $k => $v) {

                        $sem2_table.="<tr><td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";

                        foreach($sem2_exms_name as  $v_exam)
                                {
                                    $sem2_table.="<td class='center' contenteditable='true'></td><td class='center' contenteditable='true'></td>";
                                }
                                $sem2_table.="<td class='center' contenteditable='true'></td></tr>";

                            }
                        
                        }
                    }
                        
                        $sem2_table.='<tr><td> <span style="visibility:hidden;">TOTAL</span></td><td></td><td></td>';
                        foreach($sem2_exms_name as  $v_exam){
                                    $sem2_table.="<td class='center'></td><td class='center'></td>";
                                }
                                $sem2_table.='</tr>';

                        $sem2_table.='<tr><td> <span style="visibility:hidden;">PERCENTAGE</span></td><td></td><td></td>';
                        foreach($sem2_exms_name as  $v_exam){
                                    $sem2_table.="<td class='center'></td><td class='center'></td>";
                                }
                                $sem2_table.='</tr>';

                        $sem2_table.='<tr><td style="border-bottom: hidden;"></td><td colspan="2">RANK</td>';
                        foreach($sem2_exms_name as  $v_exam){
                                    $sem2_table.="<td class='center'></td><td class='center'></td>";
                                }
                                $sem2_table.='</tr>';

                        $sem2_table.='<tr><td style="border-bottom: hidden;"></td><td colspan="2">CLASS TEACHER\'S SIGN</td>';
                        foreach($sem2_exms_name as  $v_exam){
                                    $sem2_table.="<td class='center'></td><td class='center'></td>";
                                }
                                $sem2_table.='</tr>';

                        $sem2_table.='<tr><td style="border-bottom: hidden;"></td><td colspan="2">PARENT\'S SIGN</td>';
                        foreach($sem2_exms_name as  $v_exam){
                                    $sem2_table.="<td class='center'></td><td class='center'></td>";
                                }
                        $sem2_table.='</tr>';

                        $sem2_table.='<tr><td style="border-bottom: hidden;"></td><td colspan="2">HEADMISTRESS SIGN</td>';
                        foreach($sem2_exms_name as  $v_exam){
                                    $sem2_table.="<td class='center'></td><td class='center'></td>";
                                }
                        $sem2_table.='</tr>';
        }
            $sem2_table.='</table>';
            echo  $sem2_table ;
        ?>
            <div  style="font-size:0.7em; margin-left:-15%;">Attendance on the FIRST DAY IS COMPULSORY</div><br>
            <div style="font-size:0.7em; margin-left:6%;">PASSED & PROMOTED TO STD.________DETAINED IN STD________</div>
        </div><!--End Grid2-->
    </div><!--End Grid-->
</div>
<!-- End OF MARKSHEET DIV-->

<!-- <script>

for (var index = 0; index < document.getElementsByClassName("empty_row1").length; index++) {
    var s2_ht  = document.getElementsByClassName("marks_row")[index].clientHeight;
    document.getElementsByClassName("empty_row1")[index].style.height = s2_ht;
    document.getElementsByClassName("empty_row2")[index].style.height = s2_ht;
}

</script> -->
</section>

 <!--end of 9th & 10th Marksheet-->

 <!--Start of 5th to 8th Marksheet-->

 <?php } else if($stud_std == '5' || $stud_std == '6' || $stud_std == '7' || $stud_std == '8'){ ?>
<section onload="setTimeout(myFunction(), 3000)">

 <style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }

    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;} {page-break-after: always;page-break-inside : avoid;} }
    td { vertical-align:center;border: 1px; border-style:solid;}
    th { text-align: center; vertical-align:center;border: 1px;}
    .center{text-align: center; }
    .my-table tbody,.my-table td,.my-table th,.my-table {
    border : 0;
}

.grid-container {
  display: grid;
  grid-template-columns: 48% 48%;
  grid-gap: 4%;
  padding: 3px;
}

.grid-1 { grid-area: 1; }
.grid-2 { grid-area: 1; }


</style>

<?php if(count($sem1) && count($sem2)==0): ?>
    <style> .grid-container { grid-template-columns: 100% !important; } .grid-2{ display:none !important; }</style>
<?php elseif(count($sem2) && count($sem1)==0): ?>
    <style> .grid-container { grid-template-columns: 100% !important; } .grid-1{ display:none !important; }</style>
<?php else: ?>
    <style> .grid-container { grid-template-columns: 48% 48% !important; }</style>
<?php endif; ?>

<?php
// $grade1 = "";

// if($grade1 == "A1"){
// $remark = "Excellent";
// }elseif($grade1 == "A2"){
//      $remark = "Very Good";
//  }else($grade1 == "B1"){
//     $remark = "Good"
//  }

?>
<!-- <script>
$('.common_input').keyup(function(){
        $(this).attr('value',$(this).val());
    });
</script> -->
<!--MARKSHEET DIV STARTS-->
<div class="marksheet-div" style="padding:3%;">
<div style="border:1px solid #000;">
 <!--START OF HEADER BLOCK-->
<div id="header_block" style="display:flex;">

<div id="school_logo" style="width:15%">
    <img width="100px" height="100px" src="<?php echo $stud_school_logo; ?>">
</div>

<div id="school_name" style="width:85%;">
    <center>
    <span style="font-size:1.5em;font-weight:700;font-family:Arial, Helvetica, sans-serif;">AFAC ENGLISH SCHOOL</span><br>
    <span style="font-size:70%;font-weight:300;font-family:Arial, Helvetica, sans-serif;"><?php echo $stud_school_addr; ?> </span><br>
    <span style="font-size:-0.5em;font-weight:300;font-family:Arial, Helvetica, sans-serif;"><b>(ENGLISH, MARATHI & SEMI ENGLISH MEDIUM)</b> </span><br>
    <span style="font-size:2em;font-weight:300;"> </span><b>PROGRESS REPORT</b> <br>
    <span style="font-size:1em;font-weight:300;"> </span><b>STD. V / VI / VII / VIII</b> <br>
    <span style="font-size:1em;font-weight:300;"> </span><b><?php echo $academic_year; ?></b> <br>
    </center>
    <div style="float:left; text-align:left;">
    <span style="font-size:1em;font-weight:300;"> </span><b>Name of the Student:</b> <?php echo $stud_name;  ?><br>
    <span style="font-size:1em;font-weight:300;"> </span><b>Class: </b><?php echo $stud_std;  ?> &nbsp;&nbsp;<b>Div:</b><?php echo $stud_div;  ?><br>
    </div>
    <div style="float:right;text-align:left; margin-right:24%;">
    <span style="font-size:1em;font-weight:300;"> </span><b>G. R. No:</b> <?php echo $gr_number;  ?><br>
    <span style="font-size:1em;font-weight:300;"> </span><b>Date of Birth:</b> <?php echo $dob;  ?>
    </div>
    <br>
    
</div>
</div>
<div class="grid-container">
  <div class="grid-1">
<table style="width:100%;border-style:solid; border-collapse: collapse; line-height:20px;border:1px;font-size:0.8rem;">
    <tr>
      <td colspan="6" class="center" bgcolor=#BDBDBD > <b> Academic Performance </b></td>
    </tr>
    
    <tr>
      <td colspan="6" class="center" bgcolor=black> <b><font color="white"> FIRST SEMESTER<font></b></td>
    </tr>

    <tr>
      <td class="center" ><b>SUBJECT</b></td>
      <td class="center" ><b>GRADE</b></td>
      <td class="center" ><b>DESCRIPTIVE REMARKS</b></td>
      <td class="center" ><b>SPECIAL HOBBIES/ PROGRESS</b></td>
    </tr>
                                   <!--Sem 1 -->
    <?php
    $sem1_table ='';

    if(count($sem1)){

            foreach ($sem1 as $k1 => $v1) {
            // echo print_array($v1);die();
             $sem1_table.="<tr class = 'marks_row'><td>".$v1['subject_name']."</td>";
             

                       $total_marks_obtained =0;
                       $total_max_marks =0;

                               //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS

                   
                    foreach ($v1['exam'] as $k2 => $v2) {
                        //(!isset($grand_total[$v2['pcs_id']]))?$grand_total[$v2['pcs_id']]=0:false;

                        $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
                        $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
                        $total_marks_obtained = $v2['marks_obtained'];
                        $total_max_marks = $v2['total_marks'];
                    }
                    $percent =  ($total_marks_obtained != 0) ? round((( $total_marks_obtained / $total_max_marks ) * 100),2) : 0;  
                     
                    // $percent= round(($total_marks_obtained/$total_max_marks)*100);
                    $sem1_table.="<td class='center'>". check_grade($percent)."</td>";
                    $sem1_table.="<td class='center'>". check_grade1(check_grade($percent))."</td>";
                              
                              //$sem1_table.='</td>'
                                // .'<label class="hide_in_print">Select Remark</label>'
                                // .'<select class="browser-default">'
                                // .'<option value="" selected></option>'
                                // .'<option value="">Need to work hard.</option>'
                                // .'<option value="">Can do better.</option>'
                                // .'<option value="">Fair.</option>'
                                // .'<option value="">Good.</option>'
                                // .'<option value="">Excellent.</option>'
                                // ."<td><input class='common_input'style ='width:100%;' type= 'text'></td>"
                                $sem1_table.='<td>'
                                    .'<label class="hide_in_print">Select Remark</label>'
                                    .'<select class="browser-default">'
                                    .'<option value="" selected></option>'
                                    .'<option value="">Reading Book</option>'
                                    .'<option value="">Singing</option>'
                                    .'<option value="">Dance</option>'
                                    .'<option value="">Collecting Stamps</option>'
                                    .'<option value="">Solving Puzzles</option>'
                                    .'<option value="">Drawing</option>'
                                    .'<option value="">Playing Games</option>'
                                    .'<option value="">Composing Poems</option>'
                                    .'</td>'
                                ."</tr>";
            //                     if($percent >= 91 && $percent <= 100){

            //                         echo "<td class='td_class center'><div class ='a1_color marks_color'>" . check_grade($percent). "</div></td>";
            //                   }else if($percent >= 81  && $percent <= 90){
            //                       echo "<td class='td_class center'><div class ='a2_color marks_color'>" . check_grade($percent) . "</div></td>";

             }

            // END OF SEM 2 FOR LOOP

                    

         $sem1_table.= 
                    '<tr><td><b>Attendance</b><br><span style="white-space: nowrap">Present Days</span><br>Total Days</td><td></td><td>Regular/Punctual</td><td></td></tr>'
                    .'<tr><td><b>Genral<br>Remarks</b></td><td></td><td></td><td></td></tr>'
                    .'</table>';

         echo  $sem1_table ;
        
    }
     ?>
     
     <table class="my-table" style="float:left; height:20%;margin-right: 2rem;">
                <tr><td><u>Signature:</u></td></tr>
                <tr><td>1)<u>Class Teacher:</u></td></tr>
                <tr><td>2)<u>Head Mistress:</u></td></tr>
                <tr><td>3)<u>Parent / Guardian:</u></td></tr>


            </table>



            <table style= "float:right;border-collapse:collapse;margin-top:10px; font-size:75% ">
                
                    <tr><td >GRADE KEY</td></tr>
                    
                    <tr><td>91% to 100%</td><td>A1</td></tr>
                    <tr><td>81% to 90%</td><td>A2</td></tr>
                    <tr><td>71% to 80%</td><td>B1</td></tr>
                    <tr><td>61% to 70%</td><td>B2</td></tr>
                    <tr><td>51% to 60%</td><td>C1</td></tr>
                    <tr><td>41% to 50%</td><td>C2</td></tr>
                    <tr><td>33% to 40%</td><td>D</td></tr>
                    <tr><td>21% to 32%</td><td>E1</td></tr>
                    <tr><td>20% to Below</td><td>E2</td></tr>
            </table>
     </div>
     
                                                <!--End Of Sem1-->


     <div class="grid-2">
    <table style="width:100%;border-style:solid; border-collapse: collapse; line-height:20px;border:1px;font-size:0.8rem;">
    <tr>

      <td colspan="6" class="center" bgcolor=#BDBDBD> <b> Academic Performance </b></td>
    </tr>
    <tr>
      <td colspan="6" class="center" bgcolor=black> <b><font color="white"> SECOND SEMESTER<font></b></td>
    </tr>

    <tr>
      <td class="center" ><b>SUBJECT</b></td>
      <td class="center" ><b>GRADE</b></td>
      <td class="center" ><b>DESCRIPTIVE REMARKS</b></td>
      <td class="center" ><b>SPECIAL HOBBIES/ PROGRESS</b></td>

    </tr>

                                              <!--Sem 2 -->
    
    <?php
    $sem2_table ='';

    if(count($sem2)){

            foreach ($sem2 as $k1 => $v1) {
            // echo print_array($v1);die();
             $sem2_table.="<tr class = 'marks_row'><td>".$v1['subject_name']."</td>";

                       $total_marks_obtained =0;
                       $total_max_marks =0;

                               //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS

                    foreach ($v1['exam'] as $k2 => $v2) {

                        $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
                        $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
                        $total_marks_obtained = $v2['marks_obtained'];
                        $total_max_marks = $v2['total_marks'];
                    }

                    $percent =  ($total_marks_obtained != 0) ? round((( $total_marks_obtained / $total_max_marks ) * 100),2) : 0;    
                    //$percent= round(($total_marks_obtained/$total_max_marks)*100);
                    // $sem2_table.="<td class='center'>". check_grade($percent)."</td>"
                    $sem2_table.="<td class='center'>". check_grade($percent)."</td>";
                    $sem2_table.="<td class='center'>". check_grade1(check_grade($percent))."</td>";
                                // .'<td>'
                                // .'<label class="hide_in_print">Select Remark</label>'
                                // .'<select class="browser-default">'
                                // .'<option value="" selected></option>'
                                // .'<option value="">Need to work hard.</option>'
                                // .'<option value="">Can do better.</option>'
                                // .'<option value="">Fair.</option>'
                                // .'<option value="">Good.</option>'
                                // .'<option value="">Excellent.</option>'
                                // .'</td>'
                                $sem2_table.='<td>'
                                    .'<label class="hide_in_print">Select Remark</label>'
                                    .'<select class="browser-default">'
                                    .'<option value="" selected></option>'
                                    .'<option value="">Reading Book</option>'
                                    .'<option value="">Singing</option>'
                                    .'<option value="">Dance</option>'
                                    .'<option value="">Collecting Stamps</option>'
                                    .'<option value="">Solving Puzzles</option>'
                                    .'<option value="">Drawing</option>'
                                    .'<option value="">Playing Games</option>'
                                    .'<option value="">Composing Poems</option>'
                                .'</td>'
                                ."</tr>";

            }

            // END OF SEM 2 FOR LOOP

        // $sem2_table .= "</table>";
        $sem2_table.='<tr><td><b>Attendance</b><br><span style="white-space: nowrap">Present Days</span><br>Total Days</td><td></td><td>Regular/Punctual</td><td></td></tr>'
        .'<tr><td><b>Genral<br>Remarks</b></td><td></td><td></td><td></td></tr>'
        .'</table>';
         echo  $sem2_table ;

    }

     ?>
     <table class="my-table" style="float:left; height:20%;margin-left: 0rem;">
                <tr><td>Congratulations!</td></tr>
                <tr><td>________________ moves a step forward from __________ class to __________ class.</td></tr>
                <tr><td><u>Class Teacher:</u></td></tr>
                <tr><td><u>Head Mistress:</u></td></tr>
                <tr><td><u>Parent / Guardian:</u></td></tr>

            </table>
     </div>
</div>
</div>
</div>
<!-- End OF MARKSHEET DIV-->
           
<!-- <script>

for (var index = 0; index < document.getElementsByClassName("empty_row1").length; index++) {
    var s2_ht  = document.getElementsByClassName("marks_row")[index].clientHeight;
    // var ht_big  = document.getElementsByClassName("pt_marks")[index].clientHeight;
    // var sbj_tab = document.getElementsByClassName("subj_mrx_tab")[index].clientHeight;
    // var fin_ht = (ht_big - ht_sml) + sbj_tab;
    document.getElementsByClassName("empty_row1")[index].style.height = s2_ht;
    document.getElementsByClassName("empty_row2")[index].style.height = s2_ht;
}

</script> -->

</section>
 <!-- END OF MARKSHEET OF 5TH TO 8TH -->

<!-- START OF MARKSHEET 1ST TO 4TH -->
<?php }else{ ?>
    <section onload="setTimeout(myFunction(), 3000)">
<style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }

    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
    
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;} {page-break-after: always;page-break-inside : avoid;} }
    td { vertical-align:center;border: 1px; border-style:solid;}
    th { text-align: center; vertical-align:center;border: 1px;}
    .center{text-align: center; }
    .my-table tbody,.my-table td,.my-table th,.my-table {
    border : 0;

}
    
.grid-container {
  display: grid;
  grid-template-columns: 48% 48%;
  /* grid-gap: 4%; */
  padding: 3px;
}

.grid-1 { grid-area: 1; }
.grid-2 { grid-area: 1; }
/* .td_empty{border:hidden;} */
.extra-td{
  border-bottom: 1px solid #000;
  margin: 0;
  position: absolute;
  width: 100%;
  top: 0;
}
.pos-relative{
  position: relative;
  padding: 0;
}
</style>

<?php if(count($sem1) && count($sem2)==0): ?>
    <style> .grid-container { grid-template-columns: 100% !important; } .grid-2{ display:none !important; }</style>
<?php elseif(count($sem2) && count($sem1)==0): ?>
    <style> .grid-container { grid-template-columns: 100% !important; } .grid-1{ display:none !important; }</style>
<?php else: ?>
    <style> .grid-container { grid-template-columns: 48% 48% !important; }</style>
<?php endif; ?>
<!-- <script>
$('.common_input').keyup(function(){
        $(this).attr('value',$(this).val());
    });
</script> -->
<!--MARKSHEET DIV STARTS-->
<div class="marksheet-div" style="padding:3%;">
<div style="border:1px solid #000;">
 <!--START OF HEADER BLOCK-->
<div id="header_block" style="display:flex;">


<div id="school_name" style="width:85%;">
    <center>
    <span style="font-size:1.5em;font-weight:700;font-family:Arial, Helvetica, sans-serif;">COMPLETE COMPREHENSIVE EVALUTION <?php echo $academic_year?></span><br><br><br>
   
    </center>
    <div style="float:left; text-align:left;padding-left: 5%;">
    <span style="font-size:1em;font-weight:300;"> </span><b>Name of the Student:</b> <u><?php echo $stud_name;?></u>&nbsp;&nbsp;
    <span style="font-size:1em;font-weight:300;"> </span><b>Class: </b><u><?php echo $stud_std;  ?></u> &nbsp;&nbsp;<b>Div:</b><u><?php echo $stud_div;?></u>&nbsp;&nbsp;&nbsp; </span><b>Roll no:</b> <u><?php echo $stud_roll;?></u><br>
    </div>
  
    <br>
    <br>
</div>
</div>
<div class="grid-container">
  <div class="grid-1">
<table style="width:100%;border-style:solid; border-collapse: collapse; line-height:20px;border:1px;font-size:0.8rem;">
    <!-- <tr>
      <td colspan="6" class="center" bgcolor=#BDBDBD > <b> Academic Performance </b></td>
    </tr> -->
    <tr>
      <td colspan="6" class="center"> <b> 1 SEMESTER</b></td>
    </tr>
    <tr>
      <td class="center" ><b>SUBJECT</b></td>
      <td class="center" ><b>GRADE</b></td>
      <td  class="center" ><b>REMARKS DESCRIPTIVE</b></td>
    </tr>
   <!--Sem 1 -->
    <?php
    $sem1_table ='';
    if(count($sem1)){
      $count=1;
      foreach ($sem1 as $k1 => $v1) {
         // echo print_array($sem1);die();
        $subcount=count($subjects); $remainder=$subcount % 2; $first=floor($subcount/2); $second=$first+$remainder;
        $sem1_table.="<tr class = 'marks_row'><td>".$v1['subject_name']."</td>";
        $total_marks_obtained = $total_max_marks = 0;
        //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS
        foreach ($v1['exam'] as $k2 => $v2) {
          $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
          $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
          $total_marks_obtained = $v2['marks_obtained'];
          $total_max_marks = $v2['total_marks'];
        }
        
        $percent = round(($total_marks_obtained/$total_max_marks)*100);
        $sem1_table.="<td class='center'>". check_grade($percent)."</td>";
        
        if($count == 1) {
          $sem1_table.="<td rowspan='".$first."' class='empty_td'></td>";
        }
        if($count == ($second)+1) {
          $sem1_table.="<td rowspan='".$second."' class='empty_td pos-relative center'><h6 class='extra-td'>INTEREST/HOBBIES</h6></td>";
        }
        // ."<td><input class='common_input'style ='width:100%;' type= 'text'></td>"
        $sem1_table.="</tr>";
        $count++;
      }
     $sem1_table.= 
                '<tr><td><b>Attendance</b><br><span style="white-space: nowrap">Present Days</span><br>Total Days</td><td></td><td  style="border-top:1px solid black;" class="center pos-relative" rowspan="1"><h6 class="extra-td">IMPROVEMENT NEEDED</h6></td></tr>'
                .'</table>';
     echo  $sem1_table ;

    }
  ?>
   <br>
   <br>
   <table class="my-table" style="float:left; height:20%;margin-right: 2rem;">
      <tr><td>Class Teacher Signature:<u>___________________</u></td></tr>
      <tr><td>Head Mistress Signature:<u>___________________</u></td></tr>
      <tr><td>Parent Signature:       <u>___________________</u></td></tr>
      <tr><td>Moves a step forward from __________ class to __________ class.</td></tr>
    </table>
  </div>
  <!--End Of Sem1-->

  <div class="grid-2">
    <table style="width:100%;border-style:solid; border-collapse: collapse; line-height:20px;border:1px;font-size:0.8rem;">
    
    <tr>
      <td colspan="6" class="center"> <b>SEMESTER 2</b></td>
    </tr>

    <tr>
      <td class="center" ><b>GRADE</b></td>
      <td  class="center" ><b>REMARKS DESCRIPTIVE</b></td>
    </tr>
  <!--Sem 2 -->
    
<?php
  $sem2_table ='';
  if(count($sem2)){
    $count = 1;
    foreach ($sem2 as $k1 => $v1) {
        $subcount=count($subjects); $remainder=$subcount % 2; $first=floor($subcount/2); $second=$first+$remainder;
        // echo print_array($v1);die();
        $sem2_table.="<tr class = 'marks_row'>";
        $total_marks_obtained =0;
        $total_max_marks =0;
        //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS
        foreach ($v1['exam'] as $k2 => $v2) {
          $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
          $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
          $total_marks_obtained = $v2['marks_obtained'];
          $total_max_marks = $v2['total_marks'];
        }
        $percent= round(($total_marks_obtained/$total_max_marks)*100);
        $sem2_table.="<td class='center'>". check_grade($percent)."</td>";
        if($count == 1) {
          $sem2_table.="<td rowspan='".$first."' class='empty_td'></td>";
        }
        if($count == ($second)+1) {
          $sem2_table.="<td rowspan='".$second."' class='empty_td center pos-relative'><h6 class='extra-td'>INTEREST/HOBBIES</h6></td>";
        }
        $sem2_table.="</tr>";
        $count++;
      }
      $sem2_table.='<tr><td><b>Attendance</b><br><span style="white-space: nowrap">Present Days</span><br>Total Days</td><td class="center pos-relative" rowspan="1"><h6 class="extra-td">IMPROVEMENT NEEDED</h6></td></tr>'
      .'</table>';
      echo  $sem2_table ;
    }

     ?>

<br>

     <table class="my-table" style="float:left; height:20%;margin-left: 0rem;">
                <tr><td>Head Mistress Signature:<u>_____________</u></td></tr>
                <tr><td>Class Teacher Signature:<u>_____________</u></td></tr>
                <tr><td>Parent Signature:<u>_______________</u></td></tr>
                <tr><td>School Re-opens on:<u>_______________</u></td></tr>
            </table>
     </div>
</div>
</div>
</div>
<?php } ?>
</section>


          <!-- CCE Marksheet Start From Here -->
<?php

// $global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
// $global_arr = get_student_by_id($id);
$co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];
;}

$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';
$stud_name = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper(''.$global_arr['student_details'][0]['first_name'].'  '.$global_arr['student_details'][0]['last_name'].''):'';
$stud_nationality = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
$gr_number = (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'';
$aadhar_no = (isset($global_arr['student_details'][0]['aadhar_no']) && !empty($global_arr['student_details'][0]['aadhar_no']))?''.$global_arr['student_details'][0]['aadhar_no'].'':'';
$dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';
$place_of_birth = (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';
$admission_year = (isset($global_arr['student_details'][0]['admission_year']) && !empty($global_arr['student_details'][0]['admission_year']))?''.$global_arr['student_details'][0]['admission_year'].'':'';
$religion = (isset($global_arr['student_details'][0]['religion']) && !empty($global_arr['student_details'][0]['religion']))?''.$global_arr['student_details'][0]['religion'].'':'';
$caste = (isset($global_arr['student_details'][0]['caste']) && !empty($global_arr['student_details'][0]['caste']))?''.$global_arr['student_details'][0]['caste'].'':'';
$stud_img = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_std = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard']:'';
$stud_div = (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section']:'';
$stud_dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_roll = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];


$array_data = unserialize(base64_decode(get_session_data()['marksheet']));

$exam_name_map = [];

$this->session->unset_userdata('marksheet');

foreach($array_data['exams'] as $key => $all_exam)
{
    $exam_name_map[$all_exam['id']]['name'] = $all_exam['name'];
    $exam_name_map[$all_exam['id']]['exam_table_id'] = $all_exam['exam_table_id'];
    
                foreach($array_data['data'] as $key1 => $data)
        {
                $datas = array();
                $temp_key = 0;
                foreach($data['exam'] as $key2 => $single_exam)
                {
                $datas[] = $single_exam['exam_id'];
                if($all_exam['id']==$single_exam['exam_id'])
                {
                $array_data['exams'][$key]['total_marks'] = $single_exam['total_marks'];
                $array_data['exams'][$key]['passing_marks'] = $single_exam['passing_marks'];
                }
                $temp_key = $key2;
                }

                if (in_array($all_exam['id'], $datas)) {
                }
                else
                {
                $array_data['data'][$key1]['exam'][$temp_key+1] = array(
                'exam_id' => $all_exam['id'],
                'marks_obtained' => '-'
                );
                foreach ($array_data['data'][$key1]['exam'] as $key9 => $row9) 
                {
                $exam_id_temp[$key9]  = $row9['exam_id'];
                }
                array_multisort($exam_id_temp, SORT_ASC, $array_data['data'][$key1]['exam']);
                $exam_id_temp = [];
                }
        }
}

$month = 0;

$year = 0;

foreach($array_data['exams'] as $key => $all_exam)
{
        if($key==0)
        {
         if($all_exam['month']<6)
         {
         $month = $all_exam['month'];
         $year = $all_exam['end_year'];
         }
         else 
         {
         $month = $all_exam['month'];
         $year = $all_exam['start_year'];
         }
        }

        $new_year;
        if($all_exam['month']<6)
        {
        $new_year = $all_exam['end_year'];
        }
        else
        {
        $new_year = $all_exam['start_year'];
        }
        if($new_year>$year)
        { $month = $all_exam['month'];
        $year = $new_year;
        }
}
$month_arr[1] = "Jan";
$month_arr[2] = "Feb";
$month_arr[3] = "March";
$month_arr[4] = "April";
$month_arr[5] = "May";
$month_arr[6] = "June";
$month_arr[7] = "July";
$month_arr[8] = "August";
$month_arr[9] = "Sept";
$month_arr[10] = "Oct";
$month_arr[11] = "Nov";
$month_arr[12] = "Dec";

$price = array();
foreach ($array_data['exams'] as $key => $row)
{
        $price[$key] = $row['id'];
}
array_multisort($price, SORT_ASC, $array_data['exams']);



$sem1=[];
$sem2=[];      
$sem1_exms = [];
$sem2_exms = [];
$sem1_exms_name = [];
$sem1_marks_obt = [];
$sem2_exms_name = [];
$subj_all_tots = [];
$sorted_arr =[];
// $t_name = [];
$summative =['oral','practical','theory','summative'];
$sem1_frmt_exam_name = [];
$sem1_smt_exam_name = [];
$sem2_frmt_exam_name = [];
$sem2_smt_exam_name = [];

$all_exams = [];

foreach ($array_data['exams'] as $k => $v) {
  $all_exams[$v['id']]  =$v;
}


// -------------------------------------------------

        foreach($array_data['data'] as $key_data => $data)
        { 
        $temp=[];                                                               
        $temp1=[];          
        // echo print_array($data);die();
        
        
                foreach($data['exam'] as $key_exam => $v1)
                {

                              //  echo print_array($v1);

                        $v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
                        $t = $data['exam'][$key_exam];
                        $t['subject_name'] = $data['subject_name'];
                        $t['subject_id'] = $data['subject_id'];
                        //----------------------------FOR SEM 1-------------------
                        if( $v1['sem'] == 1){
                                $temp[$v1['exam_id']]  = $t;
                                $sem1_exms_name[$v1['exam_id']] = $v1['exam_name'];

                                !(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;
                                $sem1[$key_data]['subject_name'] = $data['subject_name'];

                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[$v1['exam_id']]  = $t;
                                $sem2_exms_name[$v1['exam_id']] = $v1['exam_name'];
                                !(in_array($v1['exam_id'],$sem2_exms)) ? $sem2_exms[] = $v1['exam_id'] : FALSE;
                                $sem2[$key_data]['subject_name'] = $data['subject_name'];

                        }

                }
                !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
                !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
  
        }
            //  echo print_array($sem1);

            // sem 1 exams summative and formative wise seperation
         
           foreach ($sem1 as $k => $v)  
              {

                foreach ($all_exams as $k3 => $v3) {

                        if(!(isset($sem1[$k]['exam'][$k3]))   && ($v3['sem'] == '1')  )  {
                             
                              $v3['exam_id'] =$v3['id']; 
                              $v3['exam_name'] =$v3['name']; 
                              $v3['marks_obtained'] = '-';
                              $v3['total_marks'] = '-';
                              $v3['exam_type'] = '';
                              $sem1[$k]['exam'][$k3] = $v3;
                        }
                      }

                foreach ($sem1[$k]['exam'] as $k2 => $v2) {
                                $e = $v2['exam_id'];  
                                $arr_exam = str_replace(' ','_',(strtolower(trim($v2['exam_name']))));
                                if(in_array($arr_exam,$summative)) {
                                        $sem1[$k]['exam'][$e]['exam_type'] = 'summative';
                                }else{
                                        $sem1[$k]['exam'][$e]['exam_type'] = 'formative';  
                                }
                }

              }
//       echo print_array($sem1);die();

              // To print summative and formative sem1 exam names

              foreach ($sem1 as $k => $v)  
              {
                ksort($v['exam']);

      
                foreach ($v['exam'] as $k2 => $v2) {


                        if($v2['exam_type'] == 'formative'){
                        //    print_r($v2['exam_name']);
                        $sem1_frmt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                            }

                      if($v2['exam_type'] == 'summative'){
                    //    print_r($v2['exam_name']);
                         $sem1_smt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                           }
                   }
                }     
                // end
              // sem 2 exams summative and formative wise seperation

              
           foreach ($sem2 as $k => $v)  
           {

             foreach ($all_exams as $k3 => $v3) {

                     if(!(isset($sem2[$k]['exam'][$k3]))   && ($v3['sem'] == '2')  )  {
                          
                           $v3['exam_id'] =$v3['id']; 
                           $v3['exam_name'] =$v3['name']; 
                           $v3['marks_obtained'] = '-';
                           $v3['total_marks'] = '-';
                           $v3['exam_type'] = '';
                           $sem2[$k]['exam'][$k3] = $v3;
                     }
                   }

             foreach ($sem2[$k]['exam'] as $k2 => $v2) {
                             $e = $v2['exam_id'];  
                             $arr_exam = str_replace(' ','_',(strtolower(trim($v2['exam_name']))));
                             if(in_array($arr_exam,$summative)) {
                                     $sem2[$k]['exam'][$e]['exam_type'] = 'summative';
                             }else{
                                     $sem2[$k]['exam'][$e]['exam_type'] = 'formative';  
                             }
             }

           }
           // end


//        echo print_array($sem2);die();

              // To print summative and formative sem2s exam names

              foreach ($sem2 as $k => $v)  
              {

                foreach ($v['exam'] as $k2 => $v2) {


                        if($v2['exam_type'] == 'formative'){
                        //    print_r($v2['exam_name']);
                         $sem2_frmt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                            }

                      if($v2['exam_type'] == 'summative'){
                    //    print_r($v2['exam_name']);
                         $sem2_smt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                           }
                   }
                }     
                // end
         //  echo print_array($sem1);die();

     //   echo print_array($sem1_exms_name);
        
        
?><?php


function check_co_scho_grade($marks){


        if($marks < 2){
                $grade = 'C';
        } elseif($marks == 2) {
                $grade = 'B';
        }elseif ($marks >= 3) {
                $grade = 'A';
        }
        return $grade; 
}
?>
<section onload="setTimeout(myFunction(), 3000)">
<!-- <style>
    .cce-div{
    width:95%;
    height:auto;
    display:inline-block;
    
    }
   .center{
      text-align:center;
   }
    
    .slip-input1 {
    min-width: 100px;
    border-bottom: 1px solid black;
    display: inline-block;
    }
    /* css for print */
    @media print
    {
    span{border:none}
    * {-webkit-print-color-adjust:exact;}

    /* #sem2_div{
        margin-top:20%;
        margin-right:-2.4%
    }
    #sem1_div{
        margin-right:-2.4%;
        /* page-break-after: always;
    } */
    .main_div{
      /* page-break-before: always; */
      /* page-break-after: always; */
      /* page-break-inside: avoid; */
      /* page-break-after: always;*/
      page-break-inside : avoid;
      /* page-break-after:always; */
      /* position: relative;  */
    }
    .main_div-div{
      page-break-inside : auto; 
    }
    div{
        page-break-inside: avoid;
    }
    }

    /* end of print css */

    .th_class{
    border:1px;
    border-style:solid;
    }
    .td_class{
    border:1px;
    border-style:solid;
    }
    .head-div{
    margin-top:2%;
    }
    .max_marks{
    /* float: right; */
    }
    .marks_obt{
    margin-left: 34%;
    margin-top: 0%;
    }
    @page{
        size:A3;
        /* margin:5%; */
        page-break-after: always;page-break-inside : avoid;
    }
    #sem1_div{
     border:1px solid black;
     border-radius:25px;
    }
    #sem2_div{
     border:1px solid black;
     border-radius:25px;
    }
    
.table{
  width:96%;border-collapse:collapse;font-size:72%;border:1px; border-style:solid; border-right-width:0px;   
}
</style> -->
<?php if ($stud_std == '9' || $stud_std == '10' ) { ?>
    <style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }

    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;} {page-break-after: always;page-break-inside : avoid;} }
    td { vertical-align:center;border: 1px; border-style:solid;}
    th { text-align: center; vertical-align:center;border: 1px;}
    .center{text-align: center; }
    .my-table tbody,.my-table td,.my-table th,.my-table {
    border : 0;
}

.grid-container {
  display: grid;
  grid-template-columns: 48% 52%;
  
  padding: 3px;
}

.grid-1 { grid-area: 1; }
.grid-2 { grid-area: 1; }

</style>

<?php } else if($stud_std == '5' || $stud_std == '6' || $stud_std == '7' || $stud_std == '8'){ ?>

<style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }

    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;} {page-break-after: always;page-break-inside : avoid;} }
    td { vertical-align:center;border: 1px; border-style:solid;}
    th { text-align: center; vertical-align:center;border: 1px;}
    .center{text-align: center; }
    .my-table tbody,.my-table td,.my-table th,.my-table {
    border : 0;
}
    
.grid-container {
  display: grid;
  grid-template-columns: 48% 48%;
  grid-gap: 4%;
  padding: 3px;
}

.grid-1 { grid-area: 1; }
.grid-2 { grid-area: 1; }

</style>

<?php } else if($stud_std == '1' || $stud_std == '2' || $stud_std == '3' || $stud_std == '4'){ ?>

<style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }

    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
    
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;} {page-break-after: always;page-break-inside : avoid;} }
    td { vertical-align:center;border: 1px; border-style:solid;}
    th { text-align: center; vertical-align:center;border: 1px;}
    .center{text-align: center; }
    .my-table tbody,.my-table td,.my-table th,.my-table {
    border : 0;

}
    
.grid-container {
  display: grid;
  grid-template-columns: 48% 48%;
  /* grid-gap: 4%; */
  padding: 3px;
}

.grid-1 { grid-area: 1; }
.grid-2 { grid-area: 1; }
/* .td_empty{border:hidden;} */
.extra-td{
  border-bottom: 1px solid #000;
  margin: 0;
  position: absolute;
  width: 100%;
  top: 0;
}
.pos-relative{
  position: relative;
  padding: 0;
}
</style>
<?php }//else{ ?>

<style>
.table{
  border-collapse:collapse;font-size:73%;border:1px solid;   
  width:100%;
}
/* td{
    padding:2px 2px;
    border:1px solid #000;
} */

/* .cce-div{
    width:95%;
    height:auto;
    display:inline-block;
    
} */

.center{
      text-align:center;
}

.slip-input1 {
    min-width: 100px;
    border-bottom: 1px solid black;
    display: inline-block;
}

/* css for print */
    @media print
    {
    span{border:none}
     {-webkit-print-color-adjust:exact;}

     .main_div{
      /* page-break-before: always; */
      page-break-after: always;
      page-break-inside : avoid;
    }

    .main_div-div{
      page-break-inside : auto; 
    }

    select#remark{

        border: 0px;
        outline: 0px;
        /* border: none; */
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: none; /* If you want to remove the border as well */
        background: none;
    }

    .hide_in_print{

        display: none;
    }

}


/* end of print css */

.th_class{
    border:1px;
    border-style:solid;
    }
.td_class{
    border:1px;
    border-style:solid;
    }

.marks_obt{
    margin-left: 34%;
    margin-top: 0%;
    }

/* @page{
        size:A3;
        page-break-after: always;page-break-inside : avoid;
    } */

    #sem1_div{
     border:1px solid black;
     border-radius:25px;
    }
    #sem2_div{
     border:1px solid black;
     border-radius:25px;
    }

    /* .dont_shift{
        background: #ff000040;
    } */

</style>

<?php if(count($sem1) && count($sem2)==0): ?>
    <style>.cce_sem2{ display:none !important; }</style>
<?php elseif(count($sem2) && count($sem1)==0): ?>
    <style>.cce_sem1{ display:none !important; }</style>
<?php else: ?>
    
<?php endif; ?>

<?php //} ?>
<!-- start of marksheet -->


<?php if($stud_std == "9" || $stud_std == "10"):?>
<style>.cce_sem1{ display:none !important; }</style>
<style>.cce_sem2{ display:none !important; }</style>
<?php else: ?>
<?php endif; ?>












<div class="cce-div main_div-div" style = "display:none;">

<!-- start of sem1 div -->

<div id ="sem1_div" class="main_div cce_sem1" style="line-height:2em;">
      <!-- header -->
<center>
<h5><b>CONTINUOUS COMPREHENSIVE EVALUATION RECORD BOOK</b></h5>
</center>
<br>

<table>
        <tr>
                <td>Name of the Student &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span></td>
        </tr>
        <tr>
                <td> <b>FIRST SEMESTER</b> &emsp; &emsp;G.R.No &emsp; <span class="slip-input1"><?php echo $gr_number ;?></td>
                <td>Std &emsp;<span class="slip-input1"><?php echo $stud_std ;?></td>
                <td>Div &emsp;<span class="slip-input1"><?php echo $stud_div ;?></td>
                <td>Roll No &emsp;<span class="slip-input1"><?php echo $stud_roll ;?></td>
                
        </tr>
</table><br>

<!-- end of header -->

<!-- main body start -->
<?php 

      
$sem1_e_fr = isset($sem1_frmt_exam_name) ? (count($sem1_frmt_exam_name) + 0) : 0; 
$sem1_e_sm = isset($sem1_smt_exam_name) ? (count($sem1_smt_exam_name) + 0) : 0; 
$sem2_e_fr = isset($sem2_frmt_exam_name) ? (count($sem2_frmt_exam_name) + 1) : 1; 
$sem2_e_sm = isset($sem2_smt_exam_name) ? (count($sem2_smt_exam_name) + 1) : 1; 


        // echo sizeof($sem1_frmt_exams_name);
        // echo print_array($sem1_e_fr);
        // echo print_array($sem1_frmt_exam_name);
    


?>
           <!-- start of sem1 table -->
                    <!-- start of sem1 table -->
<table cellpadding="6" class ="table cust_table">

<tr>    <!--Printing first row Term name  -->
  <?php 
  $sem1_e_no ='';
  $sem1_e_no = $sem1_e_fr-1;

  ?>

 </tr> 
 <tr rowspan ="2" class="dont_shift">
<?php    //printing second row exam names
 echo "<th class='td_class'></th><th class='td_class'></th><th class='td_class'></th>";
//  echo print_array($sem2);die;
if(sizeof($sem1) > 0)
{
        // foreach($sem1_frmt_exam_name as $k_exam => $v_exam)
        //  {
                echo "<th class='th_class center' colspan ='$sem1_e_fr'>Formative</th>";
        // }
}

echo "<th class ='th_class'>Total</th><th class ='th_class' colspan='$sem1_e_sm'>Summative Ev.</th><th class ='th_class'>Total </th><th class ='th_class'>Total</th><th class ='th_class'></th>";

?>
</tr>
<tr>
<th class ="td_class">Sr.No</th>
<th class ="td_class">Subject</th>
<th>Total Marks</th>
<?php
//  echo "<th class='td_class'><div class ='center'>1</div></th>";

$count =0;

// Print formative exam names
if(sizeof($sem1) > 0)
{
        foreach($sem1_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'>". $v_exam. "</th>";
        }
}

// end
echo "<th class='td_class'><div>A</div></th>";

// Print summative exam names
if(sizeof($sem1) > 0)
{
        foreach($sem1_smt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'>". $v_exam. "</th>";
        }
}
// end



      echo "<th class='td_class'>B</th><th class='td_class'>A+B</th><th class='td_class'>Grade</th></tr>";


?>

</tr>
 <?php
//  echo print_array($sem1_exm_name);
 
 $serial_no = 0;

         // to print subject names

 foreach ($sem1 as $k => $v) {
      //    echo print_array($v);



        $sem1_table ='';
        $subj_name = $v['subject_name'];


        $sem1_table .= "<tr><td class ='td_class' rowspan ='2'>".++$serial_no."</td><td class ='td_class'  rowspan ='2'>
        <div>".$subj_name ."</div></td><td class ='td_class center'>Out of</td>";
        $max_marks_tot_sem1_frm = 0;
        $marks_obt_tot_sem1_frm = 0;
        $max_marks_tot_sem1_sm = 0;
        $marks_obt_tot_sem1_sm = 0;
        $grand_max_tot_sem1 = '';
        $grand_marks_obt_tot_sem1 = '';
        $percent ='';

        ksort($v['exam']);

        // To print total marks formative
         foreach($v['exam'] as $k1 => $v1){
             //   echo print_array($v1);


            if($v1['exam_type'] == 'formative' ){

                $sem1_table .="<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem1_frm += $v1['total_marks'];

            }

      } // end of total marks print


      $sem1_table .= "<td class ='td_class center'>".$max_marks_tot_sem1_frm."</td>";


                 //  summative calculation

            // To print total marks for summative
         foreach($v['exam'] as $k1 => $v1){
                //  echo print_array($v1);
  
              if($v1['exam_type'] == 'summative' ){
  
                $sem1_table .= "<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem1_sm += $v1['total_marks'];
  
              }
  
         } // end of total marks print

         $grand_max_tot_sem1 = $max_marks_tot_sem1_frm + $max_marks_tot_sem1_sm;

        $sem1_table .="<td class ='td_class center'>".$max_marks_tot_sem1_sm."</td><td class ='td_class center'>".$grand_max_tot_sem1."</td><td class ='td_class'></td></tr><tr><td class ='td_class center'>Obtained</td>";

          


          // end

      // To print marks obtained formative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'formative'){

            $sem1_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem1_frm += $v1['marks_obtained'];

        }
    }
    $sem1_table .= "<td class ='td_class center'>".$marks_obt_tot_sem1_frm."</td>";



                  // To print marks obtained for summative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'summative'){

            $sem1_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem1_sm  += $v1['marks_obtained'];

        }
    }
// end




        $grand_marks_obt_tot_sem1 = $marks_obt_tot_sem1_frm + $marks_obt_tot_sem1_sm;


        $percent = ($grand_marks_obt_tot_sem1 != 0) ? round((( $grand_marks_obt_tot_sem1 / $grand_max_tot_sem1 ) * 100),2) : 0;


    $sem1_table .= "<td class ='td_class center'>".$marks_obt_tot_sem1_sm."</td><td class ='td_class center'>". $grand_marks_obt_tot_sem1."</td><td class ='td_class center'>".check_grade($percent)."</td></tr>";

               echo $sem1_table;

 }// end of marks obtained print

 // end of foreach for subjects


 
?>

</table><br><br>
            <!-- end of sem1 table -->
           
            <!-- Signature start -->

<div style="width: 100%;display:flex;font-size:0.8rem;">
  <div style="width:33.33%;text-align:left;padding-left:1%;"><b>Sign. of Class Teacher:</b></div>
  <div style="width:33.33%;text-align:center;"><b>Sign. of Head Master/Mistress</b></div>
  <div style="width:33.33%;text-align:center;"><b>Sign. of Center Incharge</b></div>
</div><br>

                  <!-- Signature end -->
                  
  
<table cellpadding ="6" class ="table">
  <tr>
          <th class ="td_class">Subject</th>
          <th class ="td_class">Particular Note</th>
  </tr>
<!-- Print Subjects & Dropdown -->
  <?php

foreach ($sem1 as $k => $v) {
    $max_marks_tot_sem1_frm = 0;
    $marks_obt_tot_sem1_frm = 0;
    $max_marks_tot_sem1_sm = 0;
    $marks_obt_tot_sem1_sm = 0;
    $grand_max_tot_sem1 = '';
    $grand_marks_obt_tot_sem1 = '';
    $percent ='';
    //    echo print_array($v);

      $sem1_table ='';
      $subj_name = $v['subject_name'];
 
      $sem1_table.='<tr>'

      .'<td>'.$subj_name.' </td>';
      foreach($v['exam'] as $k1 => $v1){
        //   echo print_array($v1);


       if($v1['exam_type'] == 'formative' ){

           $max_marks_tot_sem1_frm += $v1['total_marks'];

       }

 } // end of total marks print




            //  summative calculation

       // To print total marks for summative
    foreach($v['exam'] as $k1 => $v1){
           //  echo print_array($v1);

         if($v1['exam_type'] == 'summative' ){

           $max_marks_tot_sem1_sm += $v1['total_marks'];

         }

    } // end of total marks print

    $grand_max_tot_sem1 = $max_marks_tot_sem1_frm + $max_marks_tot_sem1_sm;

     


     // end

 // To print marks obtained formative
 foreach($v['exam'] as $k1 => $v1){



   if($v1['exam_type'] == 'formative'){

       $marks_obt_tot_sem1_frm += $v1['marks_obtained'];

   }
}




             // To print marks obtained for summative
 foreach($v['exam'] as $k1 => $v1){



   if($v1['exam_type'] == 'summative'){

       $marks_obt_tot_sem1_sm  += $v1['marks_obtained'];

   }
}
// end




   $grand_marks_obt_tot_sem1 = $marks_obt_tot_sem1_frm + $marks_obt_tot_sem1_sm;


   $percent = ($grand_marks_obt_tot_sem1 != 0) ? round((( $grand_marks_obt_tot_sem1 / $grand_max_tot_sem1 ) * 100),2) : 0;


$sem1_table .= "<td class ='td_class center'>".check_grade($percent)."</td></tr>";

echo $sem1_table;

    //   .'<td>'
    //   .'<label class="hide_in_print">Select Remark</label>'
    //   .'<select class="browser-default remark">'
    //   .'<option value="" selected></option>'
    //   .'<option value="">Able to understand the concepts well, but needs to practice.</option>'
    //   .'<option value="">Often shows keenness to participate in class activities, discussions and task assigned</option>'
    //   .'<option value="">Started showing improvement in academics as well as in class activities.</option>'
    //   .'<option value="">Understands language but has to concentrate on grammar, writing skills to avoid spelling
    //   mistakes.</option>'
    //   .'<option value="">Can do better in academics with hard work, concentration and regular studies.</option>'
    //   .'<option value="">Regular Practice of reading and writing needed to improve the result.</option>'
    //   .'<option value="">Understands the subject but commits silly mistakes.</option>'
    //   .'<option value="">A little more efforts will bring out the best.</option>'
    //   .'<option value="">Needs to improve handwriting and speak with confidence.</option>'
    //   .'<option value="">Exhibits great leadership quality.</option>'
    //   .'<option value="">Writing while learning will improve spelling.</option>'
    //   .'<option value="">Lack of interest and patience.</option>'
    //   .'<option value="">Good in practical, needs to improve the theory.</option>'
    //   .'<option value="">Overall good in academics.</option>'
    //   .'<option value="">Has to concentrate more on calculations.</option>'
    //   .'</select>' 
    //   .'</td>'


}

    $pc_id = $global_arr['student_selected_class'][0]['pc_id'];

      if(count($co_scho_res)){
              if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0))
                      {
                        
                              foreach($co_scho_res[$pc_id]['1'] as $k => $v) {
                                      $sem1_table ='';
                               
                                   $sem1_table.="<tr><td class ='td_class'>".$v['curriculum_name']."</td><td contenteditable='true'></td>"
                                   ."</tr>";

                        echo $sem1_table;
                                   
                              }
                       }
                }
  ?>

  <!-- <?php

            for($i=1;$i<=10;$i++)
         {
            echo "<tr>";
              for ($j=1;$j<=2;$j++)
             {
             echo "<td class ='td_class' contenteditable = 'true'></td>";
             }
              echo "</tr>";
         }

  ?> -->
  
  </table><br><br>

</div>


         <!-- end of sem1 div -->
<br>


          <!-- start of sem2 div -->

   <div id ="sem2_div" class="main_div cce_sem2">       

          <!-- start of sem2 table -->


             <center><h4>SECOND SEMESTER</h4></center><br>


<table cellpadding="6" class ="table">

<tr>    <!--Printing first row Term name  -->
  <th class="th_class"  rowspan="2"> Sr<br> No: </th>
  <th class="th_class" rowspan="2"> Particulars: <div style ="display:inline-block;font-size: 1.5em;"> &#10142; &#8595;</div> </th>
  <?php 
  $sem2_e_no ='';
  $sem2_e_no = $sem2_e_fr-1;

  echo "<th class='th_class center'  colspan='$sem2_e_fr'>(A) Formative Evaluation<br></th><th class='th_class'  colspan='$sem2_e_sm' style ='border-bottom:hidden;'>(B) Summative Evaluation<br></th><th class ='th_class' rowspan ='3'>Grand Total A+B</th><th class ='th_class' rowspan ='3'>Grade</th>"; 
  ?>

 </tr> 
 <tr>
<?php    //printing second row exam names
//  echo "<th class='td_class'><div></div></th>";
//  echo print_array($sem2);die;
if(sizeof($sem2) > 0)
{
        foreach($sem2_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class center'><div>". $v_exam . "</div></th>";
        }
}

echo "<th class='td_class'><div></div></th>";

?>
</tr>
<tr>
<td class ="td_class"></td>
<td>Subject</td>
<?php
//  echo "<th class='td_class'><div class ='center'>1</div></th>";

$count =0;

// Print formative exam names
if(sizeof($sem2) > 0)
{
        foreach($sem2_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'><div class ='center'>". ++$count . "</div></th>";
        }
}

// end
echo "<th class='td_class'><div>Total</div></th>";

// Print summative exam names
if(sizeof($sem2) > 0)
{
        foreach($sem2_smt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'>". $v_exam. "</th>";
        }
}
// end



      echo "<th class='td_class'>Total</th></tr>";


?>

</tr>
 <?php
 
 $serial_no = 0;

         // to print subject names

 foreach ($sem2 as $k => $v) {
        $sem2_table ='';
        $subj_name = $v['subject_name'];


        $sem2_table .= "<tr><td class ='td_class' rowspan ='2'>".++$serial_no."</td><td class ='td_class'  rowspan ='2'><div>". $subj_name ."</div><div class ='max_marks'>Max Marks</div><div class ='marks_obt'>Marks Obtd</div></td>";
        $max_marks_tot_sem2_frm = 0;
        $marks_obt_tot_sem2_frm = 0;
        $max_marks_tot_sem2_sm = 0;
        $marks_obt_tot_sem2_sm = 0;
        $grand_max_tot_sem2 = '';
        $grand_marks_obt_tot_sem2 = '';
        $percent ='';

        ksort($v['exam']);


        // To print total marks formative
         foreach($v['exam'] as $k1 => $v1){
             //   echo print_array($v1);

            if($v1['exam_type'] == 'formative' ){

                $sem2_table .="<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem2_frm += $v1['total_marks'];

            }

      } // end of total marks print


      $sem2_table .= "<td class ='td_class center'>".$max_marks_tot_sem2_frm."</td>";


                 //  summative calculation

            // To print total marks for summative
         foreach($v['exam'] as $k1 => $v1){
                //  echo print_array($v1);
  
              if($v1['exam_type'] == 'summative' ){
  
                $sem2_table .= "<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem2_sm += $v1['total_marks'];
  
              }
  
         } // end of total marks print

         $grand_max_tot_sem2 = $max_marks_tot_sem2_frm + $max_marks_tot_sem2_sm;

        $sem2_table .="<td class ='td_class center'>".$max_marks_tot_sem2_sm."</td><td class ='td_class center'>".$grand_max_tot_sem2."</td><td class ='td_class'></td></tr><tr>";

          // end

      // To print marks obtained formative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'formative'){

            $sem2_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem2_frm += $v1['marks_obtained'];

        }
    }
    $sem2_table .= "<td class ='td_class center'>".$marks_obt_tot_sem2_frm."</td>";


                  // To print marks obtained for summative
      foreach($v['exam'] as $k1 => $v1){


        if($v1['exam_type'] == 'summative'){

            $sem2_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem2_sm  += $v1['marks_obtained'];

        }
    }
// end


        $grand_marks_obt_tot_sem2 = $marks_obt_tot_sem2_frm + $marks_obt_tot_sem2_sm;


        $percent = ($grand_marks_obt_tot_sem2 != 0) ? round((( $grand_marks_obt_tot_sem2 / $grand_max_tot_sem2 ) * 100),2) : 0;


    $sem2_table .= "<td class ='td_class center'>".$marks_obt_tot_sem2_sm."</td><td class ='td_class center'>". $grand_marks_obt_tot_sem2."</td><td class ='td_class center'>".check_grade($percent)."</td></tr>";

               echo $sem2_table;

 }// end of marks obtained print

 // end of foreach for subjects

// Printing co-scholastic subjects for sem 2
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];

if(count($co_scho_res)){
        if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0))
                {
                  
                        foreach($co_scho_res[$pc_id]['2'] as $k => $v) {
                                $sem2_table ='';
                         
                             $sem2_table.="<tr><td class ='td_class center' rowspan ='2'>".++$serial_no."</td><td class ='td_class' rowspan ='2'>".$v['curriculum_name']."</td>";



                                       // formative td for max marks 
                             if(sizeof($sem2) > 0)
                             {
                                     foreach($sem2_frmt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem2_table.= "<td class='td_class'></td>";
                                     }
                                     $sem2_table.= "<td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td>";
                             }
                             // end



                            // formative td for  marks obtained


                             if(sizeof($sem1) > 0)
                             {
                                     foreach($sem2_smt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem2_table.= "<td class='td_class'></td>";
                                     }
                                //      $sem1_table.= "<td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td>";
                             }

                             // end


                             $sem2_table.="</tr>";


                             $sem2_table.= "<tr>";



                             if(sizeof($sem2) > 0)
                             {
                                     foreach($sem2_frmt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem2_table.= "<td class='td_class'></td>";
                                     }
                                     $sem2_table.="<td class='td_class center'>".$v['grade']."</td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td></tr>";
                             }


                             echo $sem2_table;

                        }
                        // end of co-scho loop
                }
                
                
        }  
        //end 
 
?>

</table><br><br>


      <!-- end of sem2 table -->

    
      <!-- Signature start -->

<div style="width: 100%;display:flex;font-size:0.8rem;">
  <div style="width:33.33%;text-align:left;padding-left:1%;"><b>Sign. of Class Teacher:</b></div>
  <div style="width:33.33%;text-align:center;"><b>Sign. of Head Master/Mistress</b></div>
  <div style="width:33.33%;text-align:center;"><b>Sign. of Center Incharge</b></div>
</div><br>

                  <!-- Signature end -->
<table cellpadding ="6" class ="table"> 
<tr>
        <th class ="td_class">Subject</th>
        <th class ="td_class">Particular Note</th>
</tr>

<?php

foreach ($sem2 as $k => $v) {
    //    echo print_array($v);

      $sem2_table ='';
      $subj_name = $v['subject_name'];
 
      $sem2_table.='<tr>'
      .'<td>'.$subj_name.' </td>'
      .'<td>'
      .'<label class="hide_in_print">Select Remark</label>'
      .'<select class="browser-default remark">'
      .'<option value="" selected></option>'
      .'<option value="">Able to understand the concepts well, but needs to practice.</option>'
      .'<option value="">Often shows keenness to participate in class activities, discussions and task assigned</option>'
      .'<option value="">Started showing improvement in academics as well as in class activities.</option>'
      .'<option value="">Understands language but has to concentrate on grammar, writing skills to avoid spelling
      mistakes.</option>'
      .'<option value="">Can do better in academics with hard work, concentration and regular studies.</option>'
      .'<option value="">Regular Practice of reading and writing needed to improve the result.</option>'
      .'<option value="">Understands the subject but commits silly mistakes.</option>'
      .'<option value="">A little more efforts will bring out the best.</option>'
      .'<option value="">Needs to improve handwriting and speak with confidence.</option>'
      .'<option value="">Exhibits great leadership quality.</option>'
      .'<option value="">Writing while learning will improve spelling.</option>'
      .'<option value="">Lack of interest and patience.</option>'
      .'<option value="">Good in practical, needs to improve the theory.</option>'
      .'<option value="">Overall good in academics.</option>'
      .'<option value="">Has to concentrate more on calculations.</option>'
      .'</select>' 
      .'</td>'
      .'</tr>';

      echo $sem2_table;
}

    $pc_id = $global_arr['student_selected_class'][0]['pc_id'];

      if(count($co_scho_res)){
              if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0))
                      {
                        
                              foreach($co_scho_res[$pc_id]['2'] as $k => $v) {
                                      $sem2_table ='';
                               
                                   $sem2_table.="<tr><td class ='td_class'>".$v['curriculum_name']."</td><td contenteditable='true'></td>"
                                   ."</tr>";

                        echo $sem2_table;
                                   
                              }
                       }
                }
  ?>

<!-- <?php

          for($i=1;$i<=10;$i++)
       {
          echo "<tr>";
            for ($j=1;$j<=2;$j++)
           {
           echo "<td class ='td_class' contenteditable = 'true'></td>";
           }
            echo "</tr>";
       }

?> -->
</table>
<table class ="table" cellpadding ="6">

<tr rowspan ="2">
        <td  class = "td_class" style ="border-bottom:hidden;" ><b>Working Day</b></td>
        <td  class = "td_class" ><b>June</b></td>
        <td  class = "td_class" ><b>July</b></td>
        <td  class = "td_class" ><b>August</b></td>
        <td  class = "td_class" ><b>September</b></td>
        <td  class = "td_class" ><b>October</b></td>
        <td  class = "td_class" ><b>November</b></td>
        <td  class = "td_class" ><b>December</b></td>
        <td  class = "td_class" ><b>January</b></td>
        <td  class = "td_class" ><b>February</b></td>
        <td  class = "td_class" ><b>March</b></td>
        <td  class = "td_class" ><b>April</b></td>
        <td  class = "td_class" ><b>May</b></td>
</tr>
<tr>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
</tr>
<tr>
        <td class = "td_class"><b>Present</b></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
</tr>

</table><br><br>


 </div>     


       <!-- end of sem2 div -->


</div>

<!-- CCE Marksheet End Here -->
<?php if ($doc_index == $doc_len-1): //---------Echo Functions on last doc ?>
<div class="col s12 print_hide" style="">
    <select class = "marsheets-select browser-default" style="right:0;padding:0.5rem 2rem;position: absolute;margin:1rem;top:-14rem; width:157px; border: 1px solid;">
        <option value="1">Marksheet</option>
        <option value="2">CCE</option>
    </select>
    <!-- <button style="right:0;padding:0.5rem 2rem;position: absolute;margin: 1rem 20rem;top:0;cursor:pointer;background-color:#26a69a;color:#fff;" class="print_hide" id="grace_button">Apply Grace</button>
    <button style="right:0;padding:0.5rem 2rem;position: absolute;margin: 1rem 10rem;top:0;cursor:pointer;background-color:#26a69a;color:#fff;" class="print_hide" id="calc_grades">Get Grades</button>
    <button style="right:0;padding:0.5rem 2rem;position: absolute;margin:1rem;top:0;cursor:pointer;background-color:#26a69a;color:#fff;" class="print_hide hidden" onclick="window.print()">Print</button> -->
</div>


<script>

$('.marsheets-select').change(function(){
        $('footer.footer-class').remove();
       //1:mark sheet
       //2:cc
       if($('option:selected',this).val()==2){
            $('.marksheet-div').css({'display':'none'});
            $('.cce-div').css({'display':''});
            $('section:last').append('<footer class="footer-class"></footer>');
            $('.footer-class').html('<style> @page{ size:A3; page-break-after: always;page-break-inside : avoid;} </style>');
            // $("section:last").html('<style> @page{ size:A3; page-break-after: always;page-break-inside : avoid;} </style>');

       }else{
            $('.marksheet-div').css({'display':''});
            $('.cce-div').css({'display':'none'});
       }
   });

</script>
<?php endif; //End Doc Number Check ?>
</section>
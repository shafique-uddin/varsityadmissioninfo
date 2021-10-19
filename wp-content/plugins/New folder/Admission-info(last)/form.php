<?php 
// Check Have Any Edit Data

if(isset($_GET['edit'])){
    $post_id_no = sanitize_text_field($_GET['edit']);
    include_once('lib/admin_info_select_by_id_from_tbl.php');

    // get_admin_url('admin.php?page=add-varsity-info');

    // echo esc_url( get_admin_url().'?page=add-varsity-info' ); exit;

    echo '<div class="admission-info-add-new-post"><a href="'.esc_url( get_admin_url().'admin.php?page=add-varsity-info' ).'" id="admission_info_add_new_post">Add New - University Info</a></div>';
    

    

    $form_action = plugin_dir_url( __FILE__ ).'admission_info_input_db_update.php';
}
else {
    include_once('lib/admin_info_select_all_from_tbl.php');
    if(empty($results)){
        echo 'empt';
    }

}


?>




<div id="varsityinfowrap" class="my-form-wrap">


<?php _e('Date: '.date('d-F-Y')); ?>
    

<form action="<?php $action = (isset($form_action)) ? $form_action : ' '; //echo $action; ?>" method="POST">
<div class="mycampus-field mycampus-input-label">
    <div class="mycampus-title">
        <label for="university_name">University Name</label>
    </div>
    <div class="mycampus-input-field">
        <input type="text" autocomplete="off" name="unversity_name" id="university_name" value="<?php if(isset( $universityName)) echo $universityName; ?>">
    </div>
    </div>
    <div class="mycampus-field mycampus-input-label">
        <div class="mycampus-title">
            <label for="unit_name">Unit Name</label>
        </div>
        <div class="mycampus-input-field">
            <input type="text" autocomplete="off" name="unit_name" id="unit_name" value="<?php if(isset( $universityUnitName)) echo $universityUnitName; ?>">
        </div>
    </div>
    <div class="mycampus-field mycampus-input-label">
        <div class="mycampus-title">
            <label for="ssc-gpa">SSC GPA</label>
        </div>
        <div class="mycampus-input-field">
            <input type="text" autocomplete="off" name="ssc_gpa" id="ssc-gpa" value="<?php if(isset( $minimumSSCgpa)) echo $minimumSSCgpa; ?>">
        </div>
    </div>
    <div class="mycampus-field">
        <div class="mycampus-title">
            <p>SSC Group</p>
        </div>
        <div class="mycampus-input-field-radio">

        <?php 
            $ssc_group_list = array(
                'all' => 'All',
                'scienceBH' => 'Science (Biology + Higher Math)',
                'scienceM' => 'Science (Higher Math)',
                'scienceB' => 'Science (Biology)',
                'arts' => 'Arts',
                'commerce' => 'Commerce'
            );

            foreach ($ssc_group_list as $ssc_group_list_key => $ssc_group_list_value) {

                
                if(isset($minimumSSCgroup)){
                    $selected = ("$minimumSSCgroup" == "$ssc_group_list_key") ? "checked" : "" ;
                } 

                // echo "<pre>";
                // var_dump ($ssc_group_list_key);
                // echo "</pre>";
                // exit;
                ?>
                <input type="radio" <?php if(isset($selected)){ echo $selected; } ?> name="ssc_group" value="<?php echo $ssc_group_list_key; ?>" id="sscGroup_<?php echo $ssc_group_list_value; ?>"><label for="sscGroup_<?php echo $ssc_group_list_value; ?>"><?php echo $ssc_group_list_value; ?></label> <br>
        <?php   } ?>
        </div>
    </div>
    <div class="mycampus-field mycampus-input-label">
        <div class="mycampus-title">
            <label for="hsc-gpa">HSC GPA</label>
        </div>
        <div class="mycampus-input-field">
            <input type="text" autocomplete="off" name="hsc_gpa" id="hsc-gpa" value="<?php if(isset($minimumHSCgpa)) echo $minimumHSCgpa; ?>">
        </div>
    </div>
    <div class="mycampus-field">
        <div class="mycampus-title">
            <p>HSC Group</p>
        </div>
        <div class="mycampus-input-field-radio">

        <?php 
        $hsc_group_list = array(

            'all' => 'All',
            'scienceBH' => 'Science (Biology + Higher Math)',
            'scienceM' => 'Science (Higher Math)',
            'scienceB' => 'Science (Biology)',
            'arts' => 'Arts',
            'commerce' => 'Commerce'
        );

        foreach ($hsc_group_list as $hsc_group_list_key => $hsc_group_list_value) { 
            if(isset($minimumHSCgroup)){
                $selected = ("$minimumHSCgroup" == "$hsc_group_list_key") ? "checked" : "" ;
            } else {
                $selected = '';
            }

            ?>
            <input type="radio" <?php echo $selected; ?> name="hsc_group" value="<?php echo $hsc_group_list_key; ?>" id="hscGroup_<?php echo $hsc_group_list_value; ?>"><label for="hscGroup_<?php echo $hsc_group_list_value; ?>"><?php echo $hsc_group_list_value; ?></label> <br>
        <?php   } ?>
        </div>
    </div>
    <div class="mycampus-field mycampus-input-label">
        <div class="mycampus-title">
            <label for="total_gpa">Total GPA (Minimum Required GPA)</label>
        </div>
        <div class="mycampus-input-field">
            <input type="text" autocomplete="off" name="total_gpa" id="total_gpa" value="<?php if(isset($totalGPA)) echo $totalGPA; ?>">
        </div>
    </div>
    <div class="mycampus-field mycampus-input-label">
        <div class="mycampus-title">
            <label for="datepicker">Admission Date</label>
        </div>
        <div class="mycampus-input-field">
            <input type="text" autocomplete="off" name="admission_date" id="datepicker" value="<?php if(isset($admissionDate)) echo $admissionDate; ?>">
        </div>
        <div class="mycampus-hidden">
            <input type="hidden" name="post_id" value="<?php echo time(); ?>">
            <?php 
            
                if(isset($_GET['edit'])){
                    echo '<input type="hidden" name="row_id" value="'.$row_id.'">';
                } 
            
            ?>
        </div>

        
    </div>
    <?php 
        if(isset($_GET['edit'])){
            echo submit_button( 'Update Data', 'button', 'admission_info_update', true, null );
        } else {
            echo submit_button( 'Save New Data', 'button', 'admission_info_save', true, null );
        }
    ?>
</div>

</form>
</div>





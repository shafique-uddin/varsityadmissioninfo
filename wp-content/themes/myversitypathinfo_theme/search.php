<?php 
/**
 * Template Name: Search Result Page
 */
get_header();
?>

<?php 
 $data = apply_filters( 'taking_rq_from_src', 'form_validation_sty'); 

if(!is_array($data)){
    header('location:'.home_url());

    // include_once('404.php');
    // get_footer();
}
else {







    foreach ($data as $key => $value) {
        if('0' == $key){
            $ssc_gpa = floatval($value);
        }
        if('1' == $key){
            $sscgrp = $value;
        }  
        if('2' == $key){
            $hsc_gpa = floatval($value);
        } 
        if('3' == $key){
            $hscgrp = $value;
        }  
        if('4' == $key){
            $totalGPA = $value;
        }  
     }
    
    
    
    global $wpdb;
    $table_name = $wpdb->prefix . "admission_info_db";
    
    $result = $wpdb->get_results("SELECT * FROM $table_name WHERE (sscGPA <= $ssc_gpa AND hscGPA <= $hsc_gpa) AND (sscGROUP = '$sscgrp' AND hscGROUP = '$hscgrp')");
        ?>
    
    
    
        <!-- Start Content area Jumbotron -->
        <div class="jumbotron jumbotron-fluid text-white bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p>আপনার মোট জিপিএ = <?php echo $totalGPA; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>যোগ্যতা অনুযায়ী যে সকল বিশ্ববিদ্যালয়ের বিভিন্ন ইউনিটে আপনি পরীক্ষা দিতে পারবেন তা নিম্নরূপ -</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-success table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">বিশ্ববিদ্যালয়ের নাম</th>
                                        <th scope="col">ইউনিটের নাম/ বিস্তারিত</th>
                                        <th scope="col">বিস্তারিত তথ্যসমূহ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
    
    
    
    <?php 
        foreach ($result as $row_value) {
        ?>
                                    <tr>
                                        <th scope="col"> <?php echo $row_value->universityName; ?> </th>
                                        <td scope="col"><?php echo $row_value->unitName; ?> </td>
                                        <td scope="col">ক্লিক করুন</td>
                                    </tr>
    
    <?php 
    }
    ?>
    <?php //wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Content area -->
    
    
    
        
    
    
    
    
    
    
    <?php get_footer(); } ?>

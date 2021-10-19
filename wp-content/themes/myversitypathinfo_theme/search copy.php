<?php 

/**
 * Template Name: Old Search Result Page
 */

get_header();
?>

<?php 


 $data = apply_filters( 'taking_rq_from_src', 'form_validation_sty'); 
 echo "<pre>";
 var_dump($data);
 echo "</pre>";
 exit;


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



<?php if( $query->have_posts() ): 
    while ( $query->have_posts() ) : $query->the_post();
    ?>
                                <tr>
                                    <th scope="col"> <?php the_field('university_name') ?> </th>
                                    <td scope="col"><?php the_field('unite_name'); ?> </td>
                                    <td scope="col">ক্লিক করুন</td>
                                </tr>

<?php endwhile;
    endif;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Content area -->



    






<?php get_footer(); ?>
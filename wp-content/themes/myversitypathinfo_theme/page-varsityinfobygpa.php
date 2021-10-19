<?php
/**
* Template Name: all university info
 */

get_header(); 

$query = new WP_Query( array( 
    'post_type' => 'varsityunitewithgpa',
    'order' => 'ASC',
    ) );
?>







<div class="container-fluid">
    <!-- Start Content area Jumbotron -->

    <div class="jumbotron jumbotron-fluid text-white bg-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="fs-3 text-center mb-4">- সকল বিশ্ববিদ্যালয়গুলোর বিভাগ অনুযায়ী ভর্তি তথ্যসমূহঃ -</h1>
                    <hr class="my-2">
                    <p class="text-center">( বিস্তারিত জানতে বিশ্ববিদ্যালয়ের নামের উপর ক্লিক করুন। )</p>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <table class="table table-success table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">বিশ্ববিদ্যালয়ের নাম</th>
                            <th scope="col">ইউনিটের নাম</th>
                            <th scope="col">এসএসসি জিপিএ</th>
                            <th scope="col">এইচএসসি জিপিএ</th>
                            <th scope="col">ভর্তি পরীক্ষার তারিখ</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>


                        <tr>
                            <th scope="col"><?php the_field('university_name'); ?></th>
                            <td scope="col"><?php the_field('unite_name'); ?></td>
                            <td scope="col"><?php the_field('ssc_gpa'); ?></td>
                            <td scope="col"><?php the_field('hsc_gpa'); ?></td>
                            <td scope="col"><?php the_field('admission_date'); ?></td>
                        </tr>

<?php endwhile; // end of the loop. ?>


                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content area -->
</div>













<?php get_footer(); ?>
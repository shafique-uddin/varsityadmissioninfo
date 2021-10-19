<?php get_header(); ?>


<!-- জাম্বোট্রন এর কাজ শুরু -->
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-5">এ পর্যন্ত প্রকাশিত সকল বিশ্ববিদ্যালয়ের ভর্তি সার্কুলার নিম্নরূপঃ</h1>
                        <hr class="my-2">
                        <p>সমস্যা নেই। সমাধান আছে আমাদের কাছে।</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- জাম্বোট্রন এর কাজ শেষ -->    




<?php 
    while (have_posts()) : the_post(); ?>
        <?php 

        $file = get_field('file_upload');
        if($file){
            $link = $file["url"];
            $title = $file['title'];
        }

        ?>
            <a class="btn btn-primary mb-2" href="<?php echo the_permalink(); ?>" role="button"><?php echo get_the_title(); ?></a> <br>
        <!--
        <a class="btn btn-primary mb-2" href="<?php echo $link; ?>" role="button"><?php echo $title; ?></a> <br> -->
<?php endwhile; ?>


<?php get_footer(); ?>
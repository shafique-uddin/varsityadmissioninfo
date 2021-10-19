<?php get_header(); ?>










<?php 
    while (have_posts()) : the_post(); ?>
        <?php 

            $file = get_field('file_upload');
            if($file){
                $link = $file["url"];
            } 
        ?>
<div class="row">
    <div class="col-sm-12">
        <a href="<?php echo $link; ?>" download>Click here to download</a>
    </div>
</div>
    <div class="row">
        <div class="col">

                <iframe src="<?php echo $link; ?>" width="100%" height="700px"></iframe>
    <?php endwhile; ?>
    </div>
</div>
    






<?php get_footer(); ?>
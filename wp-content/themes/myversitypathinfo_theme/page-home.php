<?php 
/*
* Template Name: Main Page
*/
?>

<?php get_header(); ?>
    <!-- জাম্বোট্রন এর কাজ শুরু -->
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="lead">কি চিন্তিত?</p>
                        <h1 class="display-5">জিপিএ অনুযায়ী কোন বিশ্ববিদ্যালয়গুলোতে পরীক্ষা দেওয়া যাবে?</h1>
                        <p>- এটা ভেবে চিন্তিত?</p>
                        <hr class="my-2">
                        <p>সমস্যা নেই। সমাধান আছে আমাদের কাছে।</p>
                        <p class="lead text-success">এখানেই জানতে পারবে, তুমি তোমার জিপিএ এর উপর ভিত্তি করে কোন কোন বিশ্ববিদ্যালয়গুলোতে ভর্তি পরীক্ষা দিতে পারবে।</p>
                        <p class="lead text-success font-weight-bold">তাই আমাদের এই ওয়েব সাইটে তোমাকে স্বাগতম।</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- জাম্বোট্রন এর কাজ শেষ -->    
</div>


<div class="container-fluid">
    <!-- Start Content area Jumbotron -->

    <div class="jumbotron jumbotron-fluid text-white bg-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="fs-3 text-center mb-4">- চলুন শুরু করা যাক -</h1>
                </div>
            </div>
            <?php echo apply_filters( 'get_search_form', 'Search Form' ); ?>
        </div>
    </div>
    <!-- End Content area -->
</div>


<?php get_footer(); ?>
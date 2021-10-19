<?php
if ( ! function_exists( 'myversitypathinfo_function' ) ) :
	
	function myversitypathinfo_function() {
	
		load_theme_textdomain( 'myversitypathinfo', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-one' => esc_html__( 'Primary', 'myversitypathinfo' ),
			)
		);

	
	}
endif;
add_action( 'after_setup_theme', 'myversitypathinfo_function' );

function custom_menu_list_class($classes, $items){
    $classes[] = "nav-item";
    return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_menu_list_class', 10, 2 );

function add_class_to_all_menu_anchors( $atts ) {
    $atts['class'] = 'nav-link';
 
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10 );






function wpdocs_my_search_formone( $form ) {
    $form = '<form role="search" method="GET" id="searchform" class="searchform" action="' . home_url( 'search' ) . '" >
    <div class="row">
                <div class="col-md-3">
                        <div class="">
                            <label for="sscgpalevel" class="form-label">SSC GPA</label>
                            <input type="text" name="sscgpa" placeholder="5" class="form-control" id="sscgpalevel" aria-describedby="emailHelp">
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="">
                            <label for="sscdivisionlevel" class="form-label">SSC Group</label>
                            <select name="sscgrp" class="form-select form-control" aria-label="Default select example" id="sscdivisionlevel">
                                <option selected disabled>Select One</option>
                                <option value="scienceBH">Science (Biology + Higher Math)</option>
                                <option value="scienceB">Science (Biology)</option>
                                <option value="scienceM">Science (Higher Math)</option>
                                <option value="arts">Arts</option>
                                <option value="commerce">Commerce</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="hscgpalevel" class="form-label">এইচএসসি জিপিএ</label>
                        <input type="text" name="hscgpa" placeholder="5" class="form-control" id="hscgpalevel">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="hscdivisionlevel" class="form-label">এইচএসসি বিভাগ</label>
                            <select name="hscgrp" class="form-select form-control" aria-label="Default select example" id="hscdivisionlevel">
                                <option selected disabled>Select One</option>
                                <option value="scienceBH">Science (Biology + Math)</option>
                                <option value="scienceB">Science (Biology)</option>
                                <option value="scienceM">Science (Math)</option>
                                <option value="arts">Arts</option>
                                <option value="commerce">Commerce</option>
                            </select>
                    </div>
                
                    <button type="submit" value="submit" name="submit" class="btn btn-primary mt-3 float-right">বিশ্ববিদ্যালয়গুলো খুঁজুন</button>
                </form>
                </div>
            </div>
            </div>
            </div>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_formone', 10, 1 );






// function cptui_register_my_cpts_varsityunitewithgpa() {

//     /**
//      * Post Type: Varsity unites by gpa.
//      */

//     $labels = [
//         "name" => __( "Varsity unites by gpa", "custom-post-type-ui" ),
//         "singular_name" => __( "Varsity unite by gpa", "custom-post-type-ui" ),
//         "menu_name" => __( "Versity, Unite & GPA", "custom-post-type-ui" ),
//         "all_items" => __( "All University Info", "custom-post-type-ui" ),
//         "add_new" => __( "Add New Varsity Info", "custom-post-type-ui" ),
//         "add_new_item" => __( "Add new post", "custom-post-type-ui" ),
//         "edit_item" => __( "Edit this post", "custom-post-type-ui" ),
//         "new_item" => __( "Varsity info", "custom-post-type-ui" ),
//         "view_item" => __( "View Post", "custom-post-type-ui" ),
//         "view_items" => __( "View this Post", "custom-post-type-ui" ),
//         "items_list" => __( "Varsity Gpa by Unite List", "custom-post-type-ui" ),
//     ];

//     $args = [
//         "label" => __( "Varsity unites by gpa", "custom-post-type-ui" ),
//         "labels" => $labels,
//         "description" => "All university unite according to GPA",
//         "public" => true,
//         "publicly_queryable" => true,
//         "show_ui" => true,
//         "show_in_rest" => true,
//         "rest_base" => "",
//         "rest_controller_class" => "WP_REST_Posts_Controller",
//         "has_archive" => false,
//         "show_in_menu" => true,
//         "show_in_nav_menus" => true,
//         "delete_with_user" => false,
//         "exclude_from_search" => false,
//         "capability_type" => "post",
//         "map_meta_cap" => true,
//         "hierarchical" => false,
//         "rewrite" => [ "slug" => "varsityunitewithgpa", "with_front" => true ],
//         "query_var" => true,
//         "supports" => [ "title", "custom-fields", "post-formats" ],
//     ];

//     register_post_type( "varsityunitewithgpa", $args );
// }

// add_action( 'init', 'cptui_register_my_cpts_varsityunitewithgpa' );



// add_filter('acf/settings/show_admin', '__return_false');






function form_validation_sty($request){


    if (!empty($_GET['sscgpa']) && !empty($_GET['sscgrp']) && !empty($_GET['hscgpa']) && !empty($_GET['hscgrp']) && !empty($_GET['submit'])) { 
        
        $sscgpa_for_total_val = floatval($_GET['sscgpa']);
        $sscgpa = $_GET['sscgpa'];
        $sscgrp = $_GET['sscgrp'];
        
        $hscgpa_for_total_val = floatval($_GET['hscgpa']);        
        $hscgpa = $_GET['hscgpa'];
        $hscgrp = $_GET['hscgrp'];
        $total_GPA = round($sscgpa_for_total_val + $hscgpa_for_total_val, 2);

        $request = array();

        $request[] = $sscgpa;
        $request[] = $sscgrp;
        $request[] = $hscgpa;
        $request[] = $hscgrp;
        $request[] = $total_GPA;

        return $request;



        /* Query

            $text = '<div class="jumbotron jumbotron-fluid text-white bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p>আপনার মোট জিপিএ = '.$total_GPA .'</p>
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
                                <tr>
                                    <th scope="col">'.the_field('university_name').'</th>
                                    <td scope="col">'.the_field('unite_name').'</td>
                                    <td scope="col">ক্লিক করুন</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>';
        return $text;
        */

    }
    else {
        $text = '<div class="container-fluid">
        <!-- Start Content area Jumbotron -->
        <div class="jumbotron jumbotron-fluid text-white bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="fs-3 text-center mb-4">দুঃখিত! <br> আপনার কাঙ্ক্ষিত তথ্য খুজে পাওয়া যায়নি।<br> নিশ্চয়ই আপনার ভুল হয়েছে।</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content area -->
    </div>';
    return $text;
    }
}

 add_filter('taking_rq_from_src','form_validation_sty', 10, 1);
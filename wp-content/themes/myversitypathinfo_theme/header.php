<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title><?php bloginfo( 'name' ); ?></title>
<?php wp_head(); ?>
</head>
<body>


<div class="container-fluid">
<!-- Content here -->
    <div class="row">
        <div class="col">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
            <?php bloginfo( 'name' ); ?>.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            

<?php 

wp_nav_menu(
    array(
        'theme_location' => 'menu-one',
        'container' => '', 
        'menu_id' => '',
        'menu_class' => 'navbar-nav mr-auto',
    )
  );


?>



            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="কি খুঁজছেন?" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">খুঁজুন</button>
            </form>
            </div>
            </nav>
        </div>
    </div>
    <!-- হেডারের কাজ শেষ -->
<?php 

global $wpdb;
$results = $wpdb->get_results( 
	"SELECT * FROM {$wpdb->prefix}admi_varsity_info" 
);

// echo "<pre>";
// var_dump ($results);
// echo "</pre>";
// exit;

?>


<div class="wrap">
<h1 class="wp-heading-inline">Varsity unites by gpa</h1>

 <a href="http://localhost/myversitypathinfo/wp-admin/post-new.php?post_type=varsityunitewithgpa" class="page-title-action">Add New Varsity Info</a>
<hr class="wp-header-end">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Varsity Name</th>
      <th scope="col">Unit</th>
      <th scope="col">Admission Date</th>
      <th scope="col">Publish</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>



<?php foreach ($results as $everyRow) {
	$updatelink = admin_url('admin.php?page=add-varsity-info&edit='.$everyRow->post_id);
	$deletelink = admin_url('admin.php?page=add-varsity-info&del='.$everyRow->post_id);
	?>
    <tr>
      <td><?php echo $everyRow->universityName; ?></td>
      <td><?php echo $everyRow->unitName; ?></td>
      <td><?php echo $everyRow->admission_date; ?></td>
      <td><?php echo $everyRow->post_publish; ?></td>
	  <td><a href="<?php echo $updatelink; ?>">Edit</a> | <a href="<?php echo $deletelink; ?>">Delete</a></td>
    </tr>

<?php } ?>

  </tbody>
</table>





		
		
<div id="ajax-response"></div>
<div class="clear"></div>
</div>
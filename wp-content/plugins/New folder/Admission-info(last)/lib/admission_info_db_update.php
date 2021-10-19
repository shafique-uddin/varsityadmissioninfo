<?php 

$toadaydate = date('d-F-Y');


global $wpdb;
$table_name = $wpdb->prefix . "admi_varsity_info";
$query = $wpdb->update(
        "$table_name", 
        array( 
            'universityName' => $universityName,   // string
            'unitName' => $unitName,   // string
            'sscGpa' => $SscGpa,   // string
            'sscGroup' => $SscGrp,   // string
            'hscGpa' => $HscGpa,   // string
            'hscGroup' => $HscGrp,   // string
            'totalGpa' => $totalGpa,   // string
            'admission_date' => $admissionDate,    // integer (number) 
            'post_id' => $post_id_no,    // integer (number) 
            'post_publish' => $toadaydate,    // integer (number) 
        ),
        array('id' => $post_db_row_id)
    );


    // $wpdb->update( 
    //     'table', 
    //     array( 
    //         'column1' => 'value1',   // string
    //         'column2' => 'value2'    // integer (number) 
    //     ), 
    //     array( 'ID' => 1 ), 
    //     array( 
    //         '%s',   // value1
    //         '%d'    // value2
    //     ), 
    //     array( '%d' ) 
    // );
?>
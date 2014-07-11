register_activation_hook( __FILE__, 'auto_archive_init' );

function auto_archive_init() {

 //call the auto archive hook every hour
 wp_schedule_event( current_time ( 'timestamp' ), 'hourly', 'auto_archive_hook' );

}

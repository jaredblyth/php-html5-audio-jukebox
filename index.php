<?php 

// Set base directory name
$search_dir = '.';


// Determine current directory
$current_dir = basename(__DIR__);


// Set the time zone:
date_default_timezone_set('Australia/Brisbane');


// If parameters are set, GET them and create master variable
if (isset($_GET['id']) ) {
	
	$master = $_GET['id'];

	// Determine whether master variable refers to a mp3, m4a, wav or otherwise a folder

	// If mp3, build mp3 player
	if (strpos($master,'.mp3') !== false)
	
		{
			print '<h3>';
			
			print $master;
			
			print '</h3>';
			
			print '<audio src="';
		
			print $master;
		
			print '" type="audio/mpeg" controls autoplay >
  			<code> Your browser does not support audio tags</code>
			</audio>';
		
		}
		
		
	// If MP3, build MP3 player
	else if (strpos($master,'.MP3') !== false)
	
		{
			print '<h3>';
			
			print $master;
			
			print '</h3>';
			
			print '<audio src="';
		
			print $master;
		
			print '" type="audio/mpeg" controls autoplay >
  			<code> Your browser does not support audio tags</code>
			</audio>';
		
		}
		

	// If m4a, build m4a player
	else if (strpos($master,'.m4a') !== false)
	
		{
			print '<h3>';
			
			print $master;
			
			print '</h3>';
			
			print '<audio src="';
		
			print $master;
		
			print '" type="audio/x-m4a" controls autoplay >
  			<code> Your browser does not support audio tags</code>
			</audio>';
		
		}


	// If wav, build wav player
	else if (strpos($master,'.wav') !== false)
	
		{
			print '<h3>';
			
			print $master;
			
			print '</h3>';
			
			print '<audio src="';
		
			print $master;
		
			print '" type="audio/wav" controls autoplay >
  			<code> Your browser does not support audio tags</code>
			</audio>';
		
		}
		
	
	// If folder, search directory, list contents and create links (including for both folders & files)	
	else {
		
			print '<h3>Select an artist, album or song</h3>';

			$contents = scandir($master);

			foreach ($contents as $item) {
				
				if ( (is_file($master . '/' . $item)) AND (substr($item, 0, 1) != '.') )
			
				{
					// Print the links (HTML with directories as variables):
					print "<p><a href='?id=$master/$item'>$item</a></p>";
				}

			} // Close the FOREACH.

		} // End else

} // End isset


// If no GET parameters set (i.e. user is in base folder), search directory, list contents and create links
// Only list folders so that sensitive php files are not listed for user to see
else {
	
	print '<h3>Select an artist</h3>';

	$contents2 = scandir($search_dir);

		foreach ($contents2 as $item) {
		if ( 
	
			(is_dir($search_dir . '/' . $item)) // Checks that item is a directory
		
			AND 
		
			(substr($item, 0, 1) != '.') 
		
			)
		
			{ 
			// Print the links (HTML with directories as variables):
			print "<p><a href='?id=$item'>$item</a></p>";
		} // Close the IF.

	} // Close the FOREACH.

} // End else


?>
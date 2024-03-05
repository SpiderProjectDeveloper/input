<?php 

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

//require('auth.php');

//if( isAuthRequired() ) {
//	auth(true);
//}

define( "AUTH_SCRIPT", "<?php require('auth.php'); if( isAuthRequired() ) { auth(true); } ?>\n" );

define( "DATA_FILE", "data.php" );
define( "USER_DATA_FILE", "user_data.php" );

define( "LOCK_FILE", "status.ini");
define( "IS_SYNCHRONIZED_FILE", "download.ini");

if( isset( $_GET['action'] ) ) {
	if( $_GET['action'] == 'store_user_data' ) {
		store();
	} elseif( $_GET['action'] == 'check_synchronization' ) {
    	is_synchronized();
	} elseif( $_GET['action'] == 'lock' ) { 
    	manage_lock(1);
	} elseif( $_GET['action'] == 'unlock' ) { 
    	manage_lock(0);
	} elseif( $_GET['action'] == 'check_lock' ) { 
    	manage_lock(-1);
	} elseif( $_GET['action'] == 'logout' ) {
    	logout();
	}
}
exit(0);

function logout() {
    header("HTTP/1.0 401 Unauthorized");
    echo "<script>window.location.replace('http://www.spiderproject.pro/');</script>";
}

function manage_lock( $locked ) {
    $returnStr = '{'; // The JSON-string To be returned to http client... 
    
    if( $locked == 0 || $locked == 1 ) { 			// If a status must be set...
        $fileHandle = fopen( LOCK_FILE, 'w' ); 		// ... opening "status.ini" file
        if( $fileHandle != FALSE ) { 				// ... if succeeded... 
            $status = fwrite( $fileHandle, '[Data]'. PHP_EOL . 'locked=' . $locked ); 		// ...writing "locked" status...
            if( $status != FALSE ) {										// ... if succeeded...
                   $returnStr .= '"locked":' . $locked;						//
            } else {
                   $returnStr .= '"locked":0, "error":"File write error"';
            }			
            fclose( $fileHandle );
        } else { 														// ... if failed to write into "status.ini" file... 
               $returnStr .= '"locked":0, "error":"File open error"';
        } 
    } else { 												// If not writing but only reading locked/unlocked status... 
        $fileHandle = fopen( LOCK_FILE, 'r' ); 				// .. opening "status.ini" file...
        if( $fileHandle != FALSE ) {						// ... if succeeded ...
            $found = false;
            while( !feof( $fileHandle ) ) {					// ... searching for and reading the "locked" line
                $line = fgets( $fileHandle );
                $explodedLine = explode( '=', $line );
                if( strtolower( $explodedLine[0] ) == 'locked' ) {
                       $returnStr .= '"locked":' . $explodedLine[1];
                    $found = true;
                    break;
                }
            }
            if( !$found ) {									// ... if not found...
                   $returnStr .= '"locked":0';				// ... setting to "unlocked"
            }
            fclose( $fileHandle );					
        } else {													// If failed to open "status.ini" file...
            $fileHandle = fopen( LOCK_FILE, 'w' ); 				// ... creating the one...
            if( $fileHandle != FALSE ) {							// ... if succeeded...
                $status = fwrite( $fileHandle, '[Data]'. PHP_EOL . 'locked=0' );	 	// ... writing "unlocked" status...
                if( $status != FALSE ) {							// ... if succeeded...
                       $returnStr .= '"locked":0';						// ...setting "unlocked" status
                } else {											// . otherwise											
                       $returnStr .= '"locked":0, "error":"File write error"'; // ... adding "error" status
                }
                fclose($fileHandle);
            } else {														// If failed to open "status.ini" for writing...
                   $returnStr .= '"locked":0, "error":"File open error"'; 		// ... reporting "unlocked" and "error" status
            }
        }
    }	
    $returnStr .= ', "ganttmtime":' . filemtime(DATA_FILE); 		// Adding data modification time. 
    $returnStr .= '}';
    
    echo($returnStr); 		// Sending data to client via http.    
}


function is_synchronized() {
    $returnStr = '{"synchronized":1}';
    $fileHandle = fopen( IS_SYNCHRONIZED_FILE, 'r' ); 			// .. opening "download.ini" file...
    if( $fileHandle != FALSE ) {						// ... if succeeded ...
        while( !feof( $fileHandle ) ) {					// ... searching for and reading the "download.ini" line
            $line = fgets( $fileHandle );
            $explodedLine = explode( '=', $line );
            if( strtolower( $explodedLine[0] ) == 'loaded' ) {
                if( strlen( $explodedLine[1] ) > 0 ) {
                    $loaded = (int)$explodedLine[1];
                    $returnStr = '{"synchronized":' . $loaded . '}';
                }
                break;
            }
        }
        fclose( $fileHandle );					
    }
    echo($returnStr); 		// Sending data to client via http.        
}


function store() 
{
    $errorCode = storeData();

    // Creating the response, holding statuses of operations 
    $_response = "{\"errorCode\":" . $errorCode . "}";
    echo( $_response );

    if( $errorCode == 0 ) { 	// Updating download status file to indicate user entered data that hasn't been transfered into Spider yet...
        $fileHandle = fopen( IS_SYNCHRONIZED_FILE, 'w' ); 			// .. opening "download.ini" file...
        if( $fileHandle != FALSE ) {							// ... if succeeded ...
            fwrite( $fileHandle, "loaded=0" );  
            fclose( $fileHandle );					
        }
    }
}


function storeData() 
{
	$errorCode = 1;

	// Check if the form was submitted
	if($_SERVER["REQUEST_METHOD"] != "POST") {
		return $errorCode;
	}
	if( !isset( $_POST['data'] ) ) {
		return $errorCode;
	}

	$result = file_put_contents( USER_DATA_FILE, AUTH_SCRIPT . stripslashes( $_POST['data'] ) );
	if( $result == 0 ) {
		return $errorCode;
	}

	return 0;
}


function logTxt( $txt ) {
	$fp = fopen('log.txt', 'a' );
	fputs( $fp, $txt . "\n" );
	fclose($fp);
}

?>
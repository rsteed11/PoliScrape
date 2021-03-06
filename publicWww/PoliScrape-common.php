<!-- 2016-Oct-12 PoliScrape HTML Heirarchy -->
<!-- Author: Ryan Steed -->

<?php
// Intended to be included by PoliScrape-config, once.
//----------------------------------------------------------------------------------------
// Relative URL Routes

$baseUri     = $prefixUri;
$browseUri   = $prefixUri . "browse.php";


//----------------------------------------------------------------------------------------
// Web Script path setup

$pathInfo = $_SERVER['PATH_INFO'];

// The fully formed URL to the problem file.
// Special Cloudflare logic to detect forwarded SSL  2015Feb25 Brockman
$httpSecure = false;
if ( ! empty($_SERVER['HTTPS']) ) { $httpSecure = true; }
if ( ! empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) { $httpSecure = true; }

$animateFile = $pathInfo;
$baseUrl = ( $httpSecure ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $baseUri;
$browseUrl = ( $httpSecure ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $browseUri;


//----------------------------------------------------------------------------------------
// Filesystem Scanning

// Look for the fiel on disk
$iwpFile =  $animationPath . $pathInfo;
if ( ! file_exists ( $iwpFile ) ) { die("No Such File: " . $iwpFile); }


function readIwpFileJson($fullPath) { 
	 $xml_string = file_get_contents($fullPath);
	 $xml = simplexml_load_string($xml_string);
	 return json_encode($xml);
}

function readIwpFileDescription($fullPath) { 
	 $json = readIwpFileJson($fullPath);
	 $jobject = json_decode($json,true);

	 $text = $jobject['id']['url']['bodyText'];

	 return limit_text ( $text, 35 ); // 35 words
}

//----------------------------------------------------------------------------------------
// Functions

// http://stackoverflow.com/questions/965235/how-can-i-truncate-a-string-to-the-first-20-words-in-php
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '..';
      }
      return $text;
    }

// http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
function endsWith($haystack, $needle) {
  // search forward starting from end minus needle length characters
  return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}
function startsWith($haystack, $needle) {
  // search backwards starting from haystack length characters from the end
  return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function str_replace_first($from, $to, $subject)
{
    $from = '/'.preg_quote($from, '/').'/';
    return preg_replace($from, $to, $subject, 1);
}


// This method is a recursive directory find
// Rather than call find . |grep iwp, I use the readdir to make it system agnos
function recurseFind($dir, $pattern, $depthRemaining )
{
	global $filesep;
	$subFiles = array();
	$subDirs = array();

	$dh = opendir($dir);
	while ( false != ($file = readdir($dh)) ) { 
		if ( $file != '.' && $file != '..' ) {

			$fullFile = $dir . DIRECTORY_SEPARATOR . $file;

			if ( is_dir($fullFile) ) { 
				array_push($subDirs, $fullFile);
			} else {
				if ( preg_match($pattern, $fullFile) ) { 
					array_push($subFiles, $fullFile);
				}
			}
		}
	}
	closedir($dh);

	// 2016-Aug-28 -- Limiting the recursion
	if ( $depthRemaining > 0 ) { 

	foreach ( $subDirs as $subDir ) { 
		foreach ( recurseFind($subDir, $pattern, $depthRemaining-- ) as $subsubFile ) {
			array_push($subFiles, $subsubFile );
		}
	}

	}

	return $subFiles;
}

function recurseDirs($dir, $depthRemaining )
{
	global $filesep;
	$subFiles = array();
	$subDirs = array();

	$dh = opendir($dir);
	while ( false != ($file = readdir($dh)) ) { 
		if ( $file != '.' && $file != '..' ) {

			$fullFile = $dir . DIRECTORY_SEPARATOR . $file;
			if ( is_dir($fullFile) ) { 
				array_push($subDirs, $fullFile);
			} else {
			// SKIP ALL FILES
			}
		}
	}
	closedir($dh);

	// 2016-Aug-28 -- Limiting the recursion
	if ( $depthRemaining > 0 ) { 

	foreach ( $subDirs as $subDir ) { 
		foreach ( recurseDirs($subDir, $depthRemaining-- ) as $subsubFile ) {
			array_push($subDirs, $subsubFile );
		}
	}

	}

	return $subDirs;
}

return '';
?>
<?php
function cleanse($string, $allowedTags = array())
{
	if (get_magic_quotes_gpc()) {
		$string = stripslashes($stringIn);
	}
	
	// $string = kses($string, $allowedTags); // For kses {@see http://sourceforge.net/projects/kses/}

	// ============
	// Remove MS Word Special Characters
	// ============
		
        $search  = array('&acirc;€“','&acirc;€œ','&acirc;€˜','&acirc;€™','&Acirc;&pound;','&Acirc;&not;','&acirc;„&cent;');
        $replace = array('-','&ldquo;','&lsquo;','&rsquo;','&pound;','&not;','&#8482;');
        
        $string = str_replace($search, $replace, $string);
        $string = str_replace('&acirc;€', '&rdquo;', $string);

        $search = array("&#39;", "\xc3\xa2\xc2\x80\xc2\x99", "\xc3\xa2\xc2\x80\xc2\x93", "\xc3\xa2\xc2\x80\xc2\x9d", "\xc3\xa2\x3f\x3f");
        $resplace = array("'", "'", ' - ', '"', "'");
        
        $string = str_replace($search, $replace, $string);

	$quotes = array(
                  "\xC2\xAB"     => '"',
                  "\xC2\xBB"     => '"',
                  "\xE2\x80\x98" => "'",
                  "\xE2\x80\x99" => "'",
                  "\xE2\x80\x9A" => "'",
                  "\xE2\x80\x9B" => "'",
                  "\xE2\x80\x9C" => '"',
                  "\xE2\x80\x9D" => '"',
                  "\xE2\x80\x9E" => '"',
                  "\xE2\x80\x9F" => '"',
                  "\xE2\x80\xB9" => "'",
                  "\xE2\x80\xBA" => "'",
                  "\xe2\x80\x93" => "-",
                  "\xc2\xb0"	   => "°",
                  "\xc2\xba"     => "°",
                  "\xc3\xb1"	   => "&#241;",
                  "\x96"		   => "&#241;",
                  "\xe2\x81\x83" => '&bull;',
                  "\xd5" => "'"
	              );
		
	$string = strtr($string, $quotes);
	if (strpos($string, "Live Wave Buoy Data") !== false)
	{
		for ($i=strpos($string, "Live Wave Buoy Data") ; $i<strlen($string) ; $i++) {
			$byte = $string[$i];
			$char = ord($byte);
			printf('%s:0x%02x ', $byte, $char);
		}
	}
	
            $d = mb_convert_encoding($string, 'UTF-8');
            $d = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S','',$d);
            $d = preg_replace('/[^\x00-\x7F]+/S','',$d);
            
            
	var_dump($d);
	exit;
	*/
		
	
	return $string;
}
?>


<?php

/*
* <google-drive-video-stream.php: streams videos stored in Google Driver.> 
*     Copyright (C) <2019>  <Anaxi Melo>
* 
*     This program is free software: you can redistribute it and/or modify
*     it under the terms of the GNU General Public License as published by
*     the Free Software Foundation, either version 3 of the License, or
*     (at your option) any later version.
* 
*     This program is distributed in the hope that it will be useful,
*     but WITHOUT ANY WARRANTY; without even the implied warranty of
*     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*     GNU General Public License for more details.
* 
*     You should have received a copy of the GNU General Public License
*     along with this program.  If not, see <http://www.gnu.org/licenses/>.
* 
*/

/*
*
* Usage / call: https://host/dir/google-drive-video-stream.php?key=<google-video-key>
*
* Example: https://host/dir/google-drive-video-stream.php?key=0B6b_K8Xv-BAIZVVhOUViZWRIaXc
*
* Note: tested with PHP Version 5.6.38 
*
*/

error_reporting(0);
ini_set("display_errors", 0 );

if(!empty($_GET['key'])) {

  $key = $_GET['key'];

  if ($stream = fopen('http://drive.google.com/uc?export=download&id='.$key, 'rb')) {
    
    ob_get_clean();
    header("Content-Type: video/mp4");
    header("Cache-Control: max-age=2592000, public");
	  echo stream_get_contents($stream);

    fclose($stream);
    
  } else { die("Error!");}

}

?>

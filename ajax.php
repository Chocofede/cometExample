<?php

/**
 *  comet.php is part of cometExample.
 *
 *  cometExample is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.

 *  cometExample is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Federico Jiménez, chocofede@github.com, chococroc@stackoverflow.com
 */

$filename = 'data.txt';

$fileLastModTime = (isset($_GET['timestamp'])) ? $_GET['timestamp'] : 0;

$fileCurrentModTime = filemtime( $filename );

// Max execution time of PHP files in your server, mine is 30, so I wrote 28
// for being sure is not exceeding execution time
$maxWaitTime = 28;
$waitTime = 0;

while ( $fileCurrentModTime == $fileLastModTime AND $waitTime < $maxWaitTime ) {
   // Time of checking for new data
   sleep(1);
   $waitTime += 1;
   clearstatcache();
   $fileCurrentModTime = filemtime('data.txt');
}

$response = array(
    'msg' => file_get_contents( $filename )
  , 'timestamp' => $fileCurrentModTime
);

echo json_encode( $response );
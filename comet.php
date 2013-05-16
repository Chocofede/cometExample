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
?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf8">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
      <script type="text/javascript">

         var timestamp = null;

         function waitForMessage() {
            $.ajax({
               type: 'get'
             , url: 'ajax.php?timestamp=' + timestamp
             , cache: false
             , dataType: 'json'
             , success: function(data) {
                if ( data.msg != '' ) {
                   alert( data.msg );
                   timestamp = data.timestamp;
                   setTimeout( waitForMessage(), 1000 );
                }
             }
             , error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("error: " + textStatus + ", " + errorThrown)
                setTimeout( waitForMessage(), 15000 );
             }
            });
         };

         $(document).ready(function(){
            waitForMessage();
         });

      </script>



   </head>
   <body>
      <h1>Prueba COMET</h1>

      <h2>Resultados</h2>
      <div id="resultados">
      </div>
   </body>
</html>

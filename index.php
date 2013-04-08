<?php  $d = dirname($_SERVER['SCRIPT_FILENAME']); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php  echo'Index of '.$d.'';?></title>
    <style type="text/css">
    html,body{font-family: helvetica,arial,verdana,sans-serif;}  
    #ft p{color: #888;font-size: 14px;margin-left: 25px;font-family: sans-serif;font-style: oblique}
    </style>
    <script src="http://www.google.com/jsapi?key=ABQIAAAA1XbMiDxx_BTCY2_FkPh06RRaGTYH6UMl8mADNa0YKuWNNa8VNxQEerTAUcfkyrr6OwBovxn7TDAH5Q"></script>
    <script type="text/javascript">google.load("mootools", "1.4.2");</script>
    <script type="text/javascript" src="http://moo.thinkphp.ro/playground/ElementFilter/ElementFilter-yui-compressed.js"></script>
    <script type="text/javascript">

          window.addEvent('domready',function(){

                 var ef = new ElementFilter('mysearch','#mylist li',{

                              cache: true,

                              trigger: 'keyup',  

                              onShow: function(element) {

                                      element.set('morph',{onComplete: function(){

						element.setStyle('background-color','#fff');
                                      }}) 

                                      element.morph({'padding-left':140,'background-color':'#a5faa9'});                                   
                              },

                              onHide: function(element) {

                                      element.set('morph',{onComplete: function(){

						element.setStyle('background-color','#fff');
                                      }}) 

                                      element.morph({'padding-left':0,'background-color':'#fac3a5'});
                              }
                          }); 
          }); 

    </script>
  </head>
  <body>

<?php

 echo"<h1>Index of ".$d."</h1>";

 echo'<label for="mysearch">Search: </label><input type="text" id="mysearch" name="mysearch">';

 $dir = opendir($d);

        $files = array();

        while(($file=readdir($dir)) !== false) {

                 if($file != '.') {

                       if($file == 'index.php') {continue;}

                       array_push($files,$file); 
                 }
        } 

        closedir($dir);

        $files = selectByMin($files);

        echo"<ul id='mylist'>";
 
        foreach($files as $file) {

                if($file == '..') {echo"<li><a href='../'>Parent Directory</a></li>"; continue;}

                echo"<li><a href='".$file."' title='".$title."'>".$file."</a></li>";

        }

        echo"</ul>";

?>

<div id="ft"><p>Created By Adrian Statescu using readdir and opendir</p></div>
  </body>
</html>
<?php

    function selectByMin($arr) {

             $n = count($arr);

             for($i=0;$i<$n-1;$i++) {

                  $min = $arr[$i];

                  $k = $i;

                  for($j=$i+1;$j<$n;$j++) {
 
                       if($arr[$j] < $min) {$min = $arr[$j];$k=$j;}
                  }  

                  $arr[$k] = $arr[$i];

                  $arr[$i] = $min;                  
             }  

        return $arr;
    }
?>
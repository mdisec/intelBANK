<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="span9 well">
    <script type="text/javascript">
        var imageName = location.hash.split("#")[1];
        if(typeof imageName == 'undefined')
        {
            imageName="promo";
        }
        var hostname = location.hostname;
        var src = 'http://'+hostname+'/img/'+imageName+".jpg";
        var result="<center><img src="+src+"></center>";
        document.write(result);
    </script>
</div>


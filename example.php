<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <?php
            include 'lib/html.php';
            
            $div = new html_tag('div');
            $div->add_content('this is a test');
            echo $div->render();
            
            ?>
            
        </div>
    </body>
</html>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    </head>
    <body>
        <div>
            <?php
            include 'lib/html.php';
            
//            $div = new html_tag('div');
//            $div->add_content('this is a test');
//            
//            echo $div->render();
            
            // Table
            $table = new html_table();
            $table->add_class('table')
                  ->add_class('table-bordered');
            
            $row = new html_tag('tr');
            $td = new html_tag('td', 'column');
//            $row->add_content($td)->add_content($td);
            
            $cols = array(
                new html_tag('td', 'column 1'), 
                new html_tag('td', 'column 2')
            );
            
            $row->add_content($cols);
            
            $table->add_tbody($row);
            
            echo $table->render();
            ?>
            
        </div>
    </body>
</html>

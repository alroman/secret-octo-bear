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
            
            // Create a row
            $row = new html_tag('tr');
            
            // Add row columns as array
            $cols = array(
                new html_tag('td', 'column 1'), 
                new html_tag('td', 'column 2')
            );
            
            $row->add_content($cols);
            
            // Add the row to the table body,
            // and add another row via constructor
            $table->add_tbody($row)
                  ->add_tbody(new html_tag('tr', array(
                                                new html_tag('td', 'foo'), 
                                                new html_tag('td', 'bar')
                                            )));
            
            // Render table
            echo $table->render();
            ?>
            
        </div>
    </body>
</html>

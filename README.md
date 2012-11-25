HTML rendering library
======================

This library will allow you to print HTML in a more programatic way with PHP and Javascript (for now...).
Some examples:

## PHP

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


## Javascript

    var tag = new html_element({
        tag : 'div',
        content : 'some initial content',
        attribs : {
            'id' : 'gargar'
        }
    })

    tag.addClass('classa');

    // Render the tag with
    tag.render()


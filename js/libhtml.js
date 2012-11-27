/* HTML rendering lib */

function html_element(elem) {

    this.tag = elem.tag || 'div';
    this.content = elem.content || '';
    this.attribs = elem.attribs || {};

    // Render the contents of this tag
    this.render = function() {
        var out = '<';
        out += this.tag;

        var name;
        for(name in elem.attribs) {
            out += ' ' + name + '="' + elem.attribs[name] + '"';
        }

        out += '>';
        out += this.content;
        out += '</' + this.tag + '>' + "\n";

        // return HTML
        return out;
    };

    this.addClass = function(name) {
        if(this.attribs['class'] === undefined) {
            this.attribs['class'] = name;

        } else {
            this.attribs['class'] += ' ' + name;

        }
    };
}

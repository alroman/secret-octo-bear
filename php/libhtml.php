<?php
error_reporting(E_ALL);
ini_set('display_errors', True);


class html_tag {
    
    private $tag;
    private $attribs;
    private $content;
    
    public function __construct($tag, $content = null, $attribs = array()) {
        $this->tag = $tag;
        
        $this->content = '';
        
        if($content) {
            $this->add_content($content);
        }
        
        $this->attribs = $attribs;
    }
    
    public function add_attribs($attribs) {
        foreach($attribs as $k => $v) {
            $this->add_attrib($k, $v);
        }
        
        return $this;
    }
    
    public function add_attrib($name, $val) {
        
        if(key_exists($name, $this->attribs)) {
            $this->attribs[$name] .= ' ' . $val;
        } else {
            $this->attribs[$name] = $val;
        }
        
        return $this;
    }
    
    function add_class($class) {
        return $this->add_attrib('class', $class);
    }
    
    public function add_content($content) {
        $this->content .= $this->_add_content($content);
        return $this;
    }
    
    private function _add_content($content) {
        
        // Handle objects
        if(is_object($content) && $content instanceof html_tag) {
            $out = $content->render();
        
        // Handle arrays of objects
        } else if (is_array($content)) {
            
            $out = '';

            foreach($content as $c) {
                if($c instanceof html_tag) {
                    $out .= $c->render();
                }
            }
            
        // Handle plain ol strings
        } else if(is_string($content)) {
            $out = $content;
        }
        
        return $out;
    }
    
    public function render() {
        $out = '';
        $out .= '<' . $this->tag;
        
        // Write attributes
        if(!empty($this->attribs)) {
            foreach($this->attribs as $k => $v) {
                $out .= ' ' . $k . '="' . $v . '"';
            }
        }
        
        // end tag
        if($this->content == '') {
            $out .= ' />' . "\n";
        } else {
            $out .= '>' . "\n";
            $out .= $this->content . "\n";
            $out .= '</' . $this->tag . '>' . "\n";
        }
        
        return $out;
    }
}

class html_table extends html_tag {
    private $thead;
    private $tfooter;
    private $tbody;
    
    public function __construct($content = null, $attribs = array()) {
        parent::__construct('table', $content, $attribs);
        
        $this->thead = '';
        $this->tfooter = '';
        $this->tbody = '';
    }
    
    public function add_thead($content) {
        $this->thead .= $this->add_content($content)->render();
        return $this;
    }
    
    public function add_tbody($content) {
        $this->tbody .= $this->add_content($content)->render();
        return $this;
    }
    
    public function add_tfooter($content) {
        $this->tfooter .= $this->add_content($content)->render();
        return $this;
    }
    
    public function render() {
        $thead = new html_tag('thead', $this->thead);
        $tbody = new html_tag('tbody', $this->tbody);
        $tfoot = new html_tag('tfoot', $this->tfooter);
        
        $this->content = $thead->render() 
                       . $tbody->render()
                       . $tfoot->render();
        
        return parent::render();
    }
}

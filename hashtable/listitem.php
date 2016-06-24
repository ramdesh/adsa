<?php
class ListItem {
    var $_value;
    var $_next;

    public function __construct($value) {
        $this->_value = $value;
    }
}
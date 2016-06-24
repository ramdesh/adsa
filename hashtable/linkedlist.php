<?php
require('listitem.php');

class LinkedList {
    var $_head;

    /**
     * Create the List
     */
    public function __construct() {
        $_head = null;
    }

    /**
     * Inserts a list item to the list
     * @param $listItem ListItem item to insert
     */
    public function insert(ListItem $listItem) {
        $key = $listItem->_value;
        $previous = null;
        $current = $this->_head;
        while($current != null && $key > $current->_value) {
            $previous = $current;
            $current = $current->_next;
        }
        if($previous == null) {
            $this->_head = $listItem;
        } else {
            $previous->_next = $listItem;
            $listItem->_next = $current;
        }
    }

    /**
     * Searches for a list item by a given key
     * @param $key int the key to search for
     * @return ListItem the matching list item
     */
    public function search($key) {
        $current = $this->_head;
        while($current != null && $current->_value <= $key) {
            if($current->_value == $key) {
                //echo "Found a match!\n";
                return $current;
            }
            $current = $current->_next;
        }
        return null;
    }
}
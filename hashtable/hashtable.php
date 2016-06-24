<?php
require('linkedlist.php');


class HashTable {
    var $_hashes;
    var $_size;

    /**
     * Creates the HashTable
     * @param $size int size of the hashtable
     */
    public function __construct($size) {
        $this->_size = $size;
        $this->_hashes = array();
        for($i = 0; $i < $size; $i++) {
            $this->_hashes[$i] = new LinkedList();
        }
    }

    /**
     * Returns a hash value for a given key
     * @param $key int the key
     * @return int The hash value for the key
     */
    public function hashFunction($key) {
        return $key % $this->_size;
    }

    /**
     * Add an item node to the list
     * @param ListItem $listItem
     */
    public function insert(ListItem $listItem) {
        $key = $listItem->_value;
        $hashValue = $this->hashFunction($key);
        $this->_hashes[$hashValue]->insert($listItem);
    }

    /**
     * Search for a node in the list for a given key
     * @param $key int The key to search for
     * @return ListItem The found list item
     */
    public function search($key) {
        //echo "Searching hashtable for " . $key . "\n";
        $hashValue = $this->hashFunction($key);
        //echo "Hash value is " . $hashValue . "\n";
        $listItem = $this->_hashes[$hashValue]->search($key);
        return $listItem;
    }

}
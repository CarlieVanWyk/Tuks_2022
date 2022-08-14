/**
 * Name: Carlie van wyk
 * Student Number: u21672823
 */



public class OrganisingList {

    public ListNode root = null;

    public OrganisingList() {

    }
    
    /**
     * Calculate the sum of keys recursively, starting with the given node until the end of the list
     * @return The sum of keys from the current node to the last node in the list
     * NOTE: 'int' and not 'Integer' here because it cannot return 'null'
     */
    public static int sumRec(ListNode node) {
        // Your code here...
        if (node.next == null) {
            return node.key;
        }
        else {
            return sumRec(node.next) + node.key;
        }
    }

    /**
     * Calculate and set the data for the given node.
     * @return The calculated data for the given node
     * NOTE: 'int' and not 'Integer' here because it cannot return 'null'
     */
    public static int dataRec(ListNode node) {
        // Your code here...
        //base case?

        if (node.next == null) {
            node.data = node.key;
            return node.data;
        }
        else {
            node.data = (node.key*sumRec(node))-dataRec(node.next);
            return node.data;
        }
    }

    /**
     * Calculate the data field of all nodes in the list using the recursive functions.
     * DO NOT MODIFY!
     */
    public void calculateData() {
        if (root != null) {
            dataRec(root);
        }
    }

    /**
     * Retrieve the data for the node with the specified key and swap the
     * accessed node with its predecessor, then recalculate data fields.
     * @return The data of the node before it has been moved,
     * otherwise 'null' if the key does not exist.
     */
    public Integer getData(Integer key) {
        // Your code here...
        int intData = 0;

        if(contains(key)) {
            ListNode ptr = root;
            ListNode prevptr = null;
            ListNode prevprev = null;
            Integer result = null;

//            while(ptr != null) {
                if(root.key.equals(key)) {
                    result = root.data;
                    //no swop

                    return root.data;
                }
                else if (root.next.key.equals(key)) {
//                    result = ptr.data;
//
//                    //swop:
//                    prevptr.next = ptr.next;
//                    ptr.next = prevptr;

                    ListNode oldRoot = root, cur = root.next;
                    oldRoot.next = cur.next;
                    cur.next = oldRoot;
                    root = cur;
                    calculateData();
                    return cur.data;
                }
//                else if (ptr.key.equals(key) && ptr.next != null) {
//                    result = ptr.data;
//
//                    //swop:
//                    prevptr = ptr.next;
//                    ptr.next = prevptr;
//                    prevprev.next = ptr;
//                }
//                else if (ptr.key.equals(key) && ptr.next == null) {
//                    result = ptr.data;
//
//                    //swop:
//                    prevptr.next = null;
//                    ptr.next = prevptr;
//                    prevprev.next = ptr;
//                }

                while (ptr.next.key != key) {
                    prevptr = ptr;
                    ptr = ptr.next;
                }
                ListNode ptrHolder = ptr.next;
                prevptr.next = ptrHolder;
                ptr.next = ptrHolder.next;
                ptrHolder.next = ptr;

                intData = ptrHolder.data;

                calculateData();
                return intData;

//                prevprev = prevptr;
//                prevptr = ptr;
//                ptr = ptr.next;
//            }

//            calculateData();
//            return result;
        }
        else {
            return null;
        }
    }

    /**
     * Delete the node with the given key.
     * calculateData() should be called after deletion.
     * If the key does not exist, do nothing.
     */
    public void delete(Integer key) {
        // Your code here...
        if(contains(key)) {
            ListNode ptr = root;
            ListNode prev;

            if (ptr.key.equals(key)) {
                root = root.next;
            }

            while(ptr.next != null) {
                prev = ptr;
                ptr = ptr.next;
                if(ptr.key.equals(key)) {
                    prev.next = ptr.next;
                }
            }

            calculateData();
        }
    }


    /**
     * Insert a new key into the linked list.
     * 
     * New nodes should be inserted to the back
     * Duplicate keys should not be added.
     */
    public void insert(Integer key) {
        // Your code here...

        if(contains(key)) {
            //do nothing
        }
        else {
            ListNode newNode = new ListNode(key);

            ListNode ptr = root;

            if(ptr == null) {
                root = newNode;
            }
            else {
                while (ptr.next != null) {
                    ptr = ptr.next;
                }
                ptr.next = newNode;
            }

            calculateData();
        }
    }

    /**
     * Check if a key is contained in the list
     * @return true if the key is in the list, otherwise false
     */
    public Boolean contains(Integer key) {
        // Your code here...
        if (root == null) {
            return false;
        }
        ListNode ptr = root;

        while(ptr != null) {
            if (ptr.key.equals(key)) {
                return true;
            }
            else {
                ptr = ptr.next;
            }
        }
        return false;
    }


    /**
     * Return a string representation of the Linked List.
     * DO NOT MODIFY!
     */
    public String toString() {
        if (root == null) {
            return "List is empty";
        }

        String result = "";
        for (ListNode node = root; node != null; node = node.next) {
            result = result.concat("[K: " + node.key + ", D: " + node.data + "]");

            if (node.next != null) {
                result = result.concat(" ");
            }
        }

        return result;
    }

    /**
     * Return a string representation of the linked list, showing only the keys of nodes.
     * DO NOT MODIFY!
     */
    public String toStringKeysOnly() {

        if (root == null) {
            return "List is empty";
        }

        String result = "";
        for (ListNode node = root; node != null; node = node.next) {
            result = result + node.key;

            if (node.next != null) {
                result = result.concat(", ");
            }
        }

        return result;
    }

    
}
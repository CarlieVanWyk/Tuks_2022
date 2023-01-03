import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

public class Optimistic<T> extends Thread{
    private Node head;
    private Lock lock = new ReentrantLock();

    public Optimistic() {
        head = new Node(Integer.MIN_VALUE);
        head.next = new Node(Integer.MAX_VALUE);
    }
    public boolean add(T item, int timeInGal, int n) {
        int key = item.hashCode();
        while (true) {
            Node pred = head;
            Node curr = pred.next;
            while (curr.myKey < key) {
                pred = curr; curr = curr.next;
            }
            pred.lock(); curr.lock();
            try {
                if (validate(pred, curr)) {
                    if (curr.myKey == key) {
                        return false;
                    } else {
                        Node node = new Node(item);
                        node.myTimeInGal = timeInGal;
                        node.number = n;
                        node.next = curr;
                        pred.next = node;
                        return true;
                    }
                }
            } finally {
                pred.unlock(); curr.unlock();
            }
        }
    }

    public boolean remove(T item) {
        int key = item.hashCode();
        while (true) {
            Node pred = head;
            Node curr = pred.next;
            while (curr.myKey < key) {
                pred = curr; curr = curr.next;
            }

            pred.lock(); curr.lock();
            try {
                if (validate(pred, curr)) {
                    if (curr.myKey == key) {
                        pred.next = curr.next;
                        return true;
                        } else {
                        return false;
                    }
                }
            } finally {
                pred.unlock(); curr.unlock();
            }
        }
    }

    public boolean contains(T item) {
        int key = item.hashCode();
        while (true) {
            Node pred = this.head; // sentinel node;
            Node curr = pred.next;
            while (curr.myKey < key) {
                pred = curr; curr = curr.next;
            }
            pred.lock(); curr.lock();
            try {
                if (validate(pred, curr)) {
                    return (curr.myKey == key);
                    }
            } finally { // always unlock
                pred.unlock(); curr.unlock();
            }
        }
    }

    private boolean validate(Node pred, Node curr) {
        Node node = head;
        while (node.myKey <= pred.myKey) {
            if (node == pred)
                return pred.next == curr;
            node = node.next;
        }
        return false;
    }

    public void printList() {
        lock.lock();

        try {
            Node current = head.next;
            System.out.print("[" + Thread.currentThread().getName() + "]:");
            while (current.next != null) {
                System.out.print("([ P-" + current.number + "],[" + current.myTimeInGal + "ms]),");
                current = current.next;
            }
            System.out.print("([ P-" + current.number + "],[" + current.myTimeInGal + "ms])");
            System.out.println();
        }
        finally {
            lock.unlock();
        }
    }

}

import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

public class CoarseGrained<T> extends Thread{
    private Node head;
    private Lock lock = new ReentrantLock();

    public CoarseGrained() {
        head = new Node(Integer.MIN_VALUE);
        head.next = new Node(Integer.MAX_VALUE);
    }

    public boolean add(T item, int timeInGal, int n) {
        Node pred, curr;
        int key = item.hashCode();
        lock.lock();
        try {
            pred = head;
            curr = pred.next;
            while (curr.myKey < key) {
                pred = curr;
                curr = curr.next;
            }
            if (key == curr.myKey) {
                return false;
            } else {
                Node node = new Node(item);
                node.myTimeInGal = timeInGal;
                node.number = n;
                node.next = curr;
                pred.next = node;
                return true;
            }
        } finally {
            lock.unlock();
        }
    }

    public boolean remove(T item) {
        Node pred, curr;
        int key = item.hashCode();
        lock.lock();
        try {
            pred = head;
            curr = pred.next;
            while (curr.myKey < key) {
                pred = curr;
                curr = curr.next;
            }

            if (key == curr.myKey) {
                pred.next = curr.next;
                return true;
            } else {
                return false;
            }
        } finally {
            lock.unlock();
        }

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


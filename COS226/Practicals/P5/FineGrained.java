import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

public class FineGrained<T> extends Thread{
    private Node head;
    private Lock lock = new ReentrantLock();

    public FineGrained() {
        head = new Node(Integer.MIN_VALUE);
        head.next = new Node(Integer.MAX_VALUE);
    }

    public boolean add(T item, int timeInGal, int n) {
        int key = item.hashCode();
        head.lock();
        Node pred = head;
        try {
            Node curr = pred.next;
            curr.lock();
            try {
                while (curr.myKey < key) {
                    pred.unlock();
                    pred = curr;
                    curr = curr.next;
                    curr.lock();
                }
                if (curr.myKey == key) {
                    return false;
                }
                Node newNode = new Node(item);
                newNode.myTimeInGal = timeInGal;
                newNode.number = n;
                newNode.next = curr;
                pred.next = newNode;
                return true;
            } finally {
                curr.unlock();
            }
        } finally {
            pred.unlock();
        }
    }

    public boolean remove(T item) {
        Node pred = null, curr = null;
        int key = item.hashCode();
        head.lock();
        try {
            pred = head;
            curr = pred.next;
            curr.lock();
            try {
                while (curr.myKey < key) {
                    pred.unlock();
                    pred = curr;
                    curr = curr.next;
                    curr.lock();
                }
                if (curr.myKey == key) {
                    pred.next = curr.next;
                    return true;
                }
                return false;
            } finally {
                curr.unlock();
            }
        } finally {
            pred.unlock();
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

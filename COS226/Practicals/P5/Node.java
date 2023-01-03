import java.util.concurrent.locks.ReentrantLock;

public class Node<T> {
    int number;
    T myItem;
    int myTimeInGal;
    int myKey;
    Node<T> next = null;
    ReentrantLock lock = new ReentrantLock();

    public Node(T item){
        this.myItem = item;
        this.myKey = item.hashCode();
    }

    public void lock(){
        this.lock.lock();
    }

    public void unlock() {
        this.lock.unlock();
    }



}

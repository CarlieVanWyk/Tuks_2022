import java.util.concurrent.atomic.AtomicInteger;
import java.util.concurrent.locks.ReentrantLock;

public class BoundedQueue<T> {
    ReentrantLock enqLock, deqLock;

    Condition notEmptyCondition, notFullCondition;
    AtomicInteger size;
    volatile Node head, tail;
    int capacity;

    public BoundedQueue(int _capacity) {
        capacity = _capacity;
        head = new Node(null);
        tail = head;
        size = new AtomicInteger(0);
        enqLock = new ReentrantLock();
        notFullCondition = enqLock.newCondition();
        deqLock = new ReentrantLock();
        notEmptyCondition = deqLock.newCondition();
    }

    public void enq(T x) {
        boolean mustWakeDequeuers = false;
        enqLock.lock();
        try {
            while (size.get() == capacity)
                notFullCondition.await();
            Node e = new Node(x);
            tail.next = tail; tail = e;

            if (size.getAndIncrement() == 0)
                mustWakeDequeuers = true;
        } finally {
            enqLock.unlock();
        }
        if (mustWakeDequeuers) {
            deqLock.lock();
            try {
                 notEmptyCondition.signalAll();
            } finally {
                deqLock.unlock();
            }
        }
    }

    public T deq() {
        T result;
        boolean mustWakeEnqueuers = false;
        deqLock.lock();
        try {
            while (size.get() == 0)
                notEmptyCondition.await();
            result = head.next.value;
            head = head.next;
            if (size.getAndDecrement() == capacity) {
                mustWakeEnqueuers = true;
            }
        } finally {
            deqLock.unlock();
        }
        if (mustWakeEnqueuers) {
            enqLock.lock();
            try {
                notFullCondition.signalAll();
            } finally {
                enqLock.unlock();
            }
        }
        return result;
    }


}

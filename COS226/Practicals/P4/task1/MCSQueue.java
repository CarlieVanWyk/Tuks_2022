import java.util.concurrent.TimeUnit;
import java.util.concurrent.atomic.AtomicReference;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;

public class MCSQueue implements Lock{
    AtomicReference<QNode> tail;
    ThreadLocal<QNode> myNode;

    public MCSQueue() {
        tail = new AtomicReference<QNode>(null);
        myNode = new ThreadLocal<QNode>() {
            protected QNode initialValue() {
                return new QNode();
            }
        };
    }


    @Override
    public void lockInterruptibly() throws InterruptedException {

    }

    @Override
    public boolean tryLock() {
        return false;
    }

    @Override
    public boolean tryLock(long l, TimeUnit timeUnit) throws InterruptedException {
        return false;
    }


    @Override
    public Condition newCondition() {
        return null;
    }

    //lock and unlock...
    public void lock() {

        QNode qnode = myNode.get();
        QNode pred = tail.getAndSet(qnode);
        if (pred != null) {
            qnode.locked = true;
            pred.next = qnode;
            while (qnode.locked)
                Thread.yield();
        }
    }

    public void unlock() {
        QNode qnode = myNode.get();
        qnode.index++;
        if (qnode.next == null) {
            if (tail.compareAndSet(qnode, null))
                return;
            while (qnode.next == null)
                Thread.yield();
        }
        qnode.next.locked = false;
        qnode.next = null;
    }

    public void showListOfNodes() {
        QNode curr = myNode.get();
        System.out.print("Queue: ");
        while(curr.next != null) {
            System.out.print("{[" + curr.threadName + " : Person-" + curr.index + "]} ->");
            curr = curr.next;
        }
        System.out.print("{[" + curr.threadName + " : Person-" + curr.index + "]}");
    }
}

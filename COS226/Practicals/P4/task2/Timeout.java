import java.util.concurrent.TimeUnit;
import java.util.concurrent.atomic.AtomicReference;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;

public class Timeout implements Lock{
    static QNode AVAILABLE = new QNode();
    AtomicReference<QNode> tail;
    ThreadLocal<QNode> myNode;

    public void TOLock() {
        tail = new AtomicReference<QNode>(null);
        myNode = new ThreadLocal<QNode>() {
            protected QNode initialValue() {
                return new QNode();
            }
        };
    }

    @Override
    public void lock() {

    }

    @Override
    public void lockInterruptibly() throws InterruptedException {

    }

    @Override
    public boolean tryLock() {
        return false;
    }

    @Override
    public boolean tryLock(long time, TimeUnit unit) {
            long startTime = System.currentTimeMillis();
            System.out.println(startTime);
            long patience = TimeUnit.MILLISECONDS.convert(time, unit);
            QNode qnode = new QNode();
//            QNode qnode = myNode.get();
//            System.out.println(qnode);
            myNode.set(qnode);
            qnode.pred = null;
            QNode myPred = tail.getAndSet(qnode);

            if (myPred == null || myPred.pred == AVAILABLE) {
                return true;
            }

            while (System.currentTimeMillis() - startTime < patience) {
                QNode predPred = myPred.pred;
                if (predPred == AVAILABLE) {
                    return true;
                } else if (predPred != null) {
                    myPred = predPred;
                }
            }

            if (!tail.compareAndSet(qnode, myPred))
                qnode.pred = myPred;
            return false;
    }

    @Override
    public void unlock() {
        QNode qnode = myNode.get();
        if (!tail.compareAndSet(qnode, null))
            qnode.pred = AVAILABLE;
    }


    @Override
    public Condition newCondition() {
        return null;
    }

    public void showListOfNodes() {
        System.out.println("heyy");
        QNode curr = myNode.get();
        System.out.println(curr);
        System.out.print("Queue: ");
        while(curr.next != null) {
            System.out.print("{[" + curr.threadName + " : Person-" + curr.index + "]} ->");
            curr = curr.next;
        }
        System.out.print("{[" + curr.threadName + " : Person-" + curr.index + "]}");
    }
}



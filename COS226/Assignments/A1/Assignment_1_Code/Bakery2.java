import java.util.concurrent.TimeUnit;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;

// Name: carlie van wyk
// Student Number: u21672823

public class Bakery2 implements Lock
{
    volatile boolean[] flag;
    volatile int[] label;
    volatile private int a;   //a=number of threads
    volatile private int offset;

    public Bakery2 (int a, int offset) {
        this.a = a;
        this.offset = offset;
        flag = new boolean[a];
        label = new int[a];
        for (int i = 0; i < a; i++) {
            flag[i] = false;
            label[i] = 0;
        }
    }

    @Override
    public void lock() {
        String threadId = String.valueOf(Thread.currentThread().getId());
        int i = Integer.parseInt(threadId.substring(threadId.length()-1)) - offset;

        flag[i] = true;

        //find largest
        int max = label[0];
        for (int j = 1; j < label.length; j++) {
            if (label[j] > max)
                max = label[j];
        }
        label[i] = max + 1;
        //label[i] = findMaximumElement(label) + 1;

        for (int k = 0; k < a; k++) {
            while (flag[k] && ((label[k] < label[i]) || ((label[k] == label[i]) && k < i))) {
                //spin wait
            }
        }

    }


    public void lockInterruptibly() throws InterruptedException
    {
        throw new UnsupportedOperationException();
    }

    public boolean tryLock()
    {
        throw new UnsupportedOperationException();
    }

    public boolean tryLock(long time, TimeUnit unit) throws InterruptedException
    {
        throw new UnsupportedOperationException();
    }

    @Override
    public void unlock() {
        String threadId = String.valueOf(Thread.currentThread().getId());
        int i = Integer.parseInt(threadId.substring(threadId.length()-1)) - offset;

        flag[i] = false;
    }

    public Condition newCondition()
    {
        throw new UnsupportedOperationException();
    }

}

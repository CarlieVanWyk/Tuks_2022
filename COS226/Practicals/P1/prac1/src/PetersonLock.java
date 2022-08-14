import java.util.concurrent.TimeUnit;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;

public class PetersonLock implements Lock {
    // thread-local index, 0 or 1
    private boolean[] flag = new boolean[2];
    private int turn;
    @Override
    public void unlock() {
        String threadId = String.valueOf(Thread.currentThread().getId());
        int i = Integer.parseInt(threadId.substring(threadId.length()-1));
        flag[i] = false; // I’m not interested
    }

    @Override
    public void lock() {
        String threadId = String.valueOf(Thread.currentThread().getId());
        int i = Integer.parseInt(threadId.substring(threadId.length()-1));
        int j = 1 - i;
        flag[i] = true; // I’m interested
        turn = i; // you go first
        while (flag[j] && turn == i) {
            System.out.print("");
        }; // wait
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

}

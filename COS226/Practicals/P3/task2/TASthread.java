public class TASthread extends Thread implements Runnable{
    CriticalSection destination;
    TASLock tasLock;

    public TASthread(CriticalSection dest, TASLock tas){
        destination = dest;
        tasLock = tas;
    }

    public void run() {
        //acquire lock
        tasLock.lock();

        //sleep for 100ms
        try {
            Thread.currentThread().sleep(100);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }

        //each thread can access the CS for a variable amount of times
        try{
            destination.CS();
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        } finally {
            tasLock.unlock();
        }
    }
}

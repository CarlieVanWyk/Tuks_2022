public class TTASthread extends Thread implements Runnable{
    CriticalSection destination;
    TTASLock ttasLock;

    public TTASthread(CriticalSection dest, TTASLock ttas){
        destination = dest;
        ttasLock = ttas;
    }

    public void run() {
        //acquire lock
        ttasLock.lock();

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
            ttasLock.unlock();
        }
    }
}

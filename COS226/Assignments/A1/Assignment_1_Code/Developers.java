// Name: carlie van wyk
// Student Number: u21672823
public class Developers extends Thread implements Runnable {
    Thread dev;
    Project devQ;
    Bakery lock;

    public Developers(Project queue, Bakery b1){
        devQ = queue;
        lock = b1;
    }

    @Override
    public void run()
    {
        while(devQ.isDevQempty() == false) {
            System.out.println(Thread.currentThread().getName() + " is ready to develop a component.");
            lock.lock();
            try {
                devQ.devQueue();
            } catch (InterruptedException e) {
                throw new RuntimeException(e);
            } finally {
                lock.unlock();
            }
        }

    }
}

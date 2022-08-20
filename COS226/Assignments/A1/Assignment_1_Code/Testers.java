// Name: carlie van wyk
// Student Number: u21672823

public class Testers extends Thread implements Runnable {
    Thread tester;
    Project testQ;
    Bakery2 lock;

    boolean loop = true;

    public Testers(Project queue, Bakery2 b2){
        testQ = queue;
        lock = b2;
    }

    @Override
    public void run()
    {
        System.out.println(Thread.currentThread().getName() + " is ready to test a component.");
        while(loop) {
            if (testQ.developSize() == testQ.doneSize()) {
                //do nothing
                loop = false;
                break;
            } else {
                lock.lock();
                try {
                    testQ.testQueue();
                } catch (InterruptedException e) {
                    throw new RuntimeException(e);
                } finally {
                    lock.unlock();
                }
            }
        }

    }
}

import javax.annotation.processing.Filer;

public class Transport extends Thread implements Runnable{
    Thread t;
	Venue destination;
//	Filter lock;
	Bakery lock;

//	public Transport(Venue dest, Filter f1){
//		destination = dest;
//		lock = f1;
//	}

	public Transport(Venue dest, Bakery b1){
		destination = dest;
		lock = b1;
	}

	@Override
	public void run()
	{
		for(int i = 0; i < 5; i++) {
			int load = i;
			System.out.println("BUS " + Thread.currentThread().getName() + "  is waiting to drop-off: " + load);
			lock.lock();
			try{
				destination.dropOff(load);
			} catch (InterruptedException e) {
				throw new RuntimeException(e);
			} finally {
				lock.unlock();
			}
		}
	}

}

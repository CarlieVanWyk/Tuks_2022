import java.util.Random;
import java.util.concurrent.locks.Lock;

public class Venue {
    Lock l;

	public void dropOff(int load) throws InterruptedException {
		System.out.println("BUS " + Thread.currentThread().getName() + "  is dropping-of: " + load);
		Thread.currentThread().sleep(random());
		System.out.println("BUS " + Thread.currentThread().getName() + "   has left: " + load);
	}

	public int random() {

		Random r = new Random();
		int low = 2;
		int high = 10;
		int result = r.nextInt(high-low) + low;
//		System.out.println("hey random: " + result);
		return result;
	}
}

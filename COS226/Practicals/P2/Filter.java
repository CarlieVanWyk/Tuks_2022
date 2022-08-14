import javax.annotation.processing.Filer;
import java.util.concurrent.TimeUnit;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;

// Name: carlie van wyk
// Student Number: u21672823

public class Filter implements Lock
{
	int [] level;
	int [] victim;

	int n;

	public Filter(int n) {
		this.n = n;
		level = new int[n];
		victim = new int [n];

		for (int i = 0; i  <n; i++) {
			level[i] = 0;
		}
	}

	@Override
	public void lock() {
		String threadId = String.valueOf(Thread.currentThread().getId());
		int me = Integer.parseInt(threadId.substring(threadId.length()-1));

		for(int i = 1; i < n ; i++ ) {
			level[me] = i;
			victim[i] = me;

			for (int k = 0; k < n; k++) {
				while ((k != me) && (level[k] >= i && victim[i] == me)) {
					//spin wait
					System.out.print("");
				}
			}

//			boolean kthing = true;
//            while (kthing) {
//				kthing = false;
//				for (int k = 1; k < n; k++) {
//					if (k != i && level[k] >= i && victim[i] == i) {
//						kthing = true;
//						break;
//					}
//				}
//			}
		}
	}

	@Override
	public void unlock() {
		String threadId = String.valueOf(Thread.currentThread().getId());
		int me = Integer.parseInt(threadId.substring(threadId.length()-1));

		level[me] = 0;
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

	public Condition newCondition()
	{
		throw new UnsupportedOperationException();
	}

}

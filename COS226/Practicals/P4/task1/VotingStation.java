import java.util.Random;
import java.util.concurrent.locks.Lock;

public class VotingStation {
    MCSQueue l;

	VotingStation(MCSQueue mcsLock){
		l = mcsLock;
	}

	public void castBallot(int i) throws InterruptedException {

		l.lock();

		try{
			System.out.println("[" + Thread.currentThread().getName() + "]" + "[" + i + "] entered the voting station");
			System.out.println("[" + Thread.currentThread().getName() + "]" + "[" + i + "] cast a vote");
			l.showListOfNodes();
			System.out.println();
			Thread.sleep(random());
//			castBallotCS();
		} finally {
			l.unlock();
		}
	}

//	private void castBallotCS(){}

	public int random() {
		Random r = new Random();
		int low = 200;
		int high = 1000;
		int result = r.nextInt(high-low) + low;
		return result;
	}
}

import java.sql.Time;
import java.util.Random;
import java.util.concurrent.TimeUnit;
import java.util.concurrent.locks.Lock;

public class VotingStation {
    Timeout l;

	VotingStation(Timeout mcsLock){
		l = mcsLock;
	}

	public void castBallot(int i) throws InterruptedException {
		System.out.println("hett");
		boolean lockResult = l.tryLock(200, TimeUnit.MILLISECONDS);
		System.out.println(lockResult);

		if(lockResult == true) {
			try {
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

import java.util.Random;

public class ConsensusThread extends Thread
{
	private Consensus<Integer> consensus;

	ConsensusThread(Consensus<Integer> consensusObject)
	{
		consensus = consensusObject;
	}

	public void run()
	{
		for(int i = 0; i < 5; i++) {
			//propose amount between 100 and 200
			consensus.propose(proposedAmount());

			//wait for 50 - 100 ms
			try {
				int time = waitTime();
				Thread.currentThread().sleep(time);
			} catch (InterruptedException e) {
				throw new RuntimeException(e);
			}

			//decide on same amount
			consensus.decide();

			//wait for 50 - 100 ms
			try {
				int time = waitTime();
				Thread.currentThread().sleep(time);
			} catch (InterruptedException e) {
				throw new RuntimeException(e);
			}

		}
	}

	public Integer proposedAmount() {
		Random r = new Random();
		int low = 100;
		int high = 200;
		int result = r.nextInt(high-low) + low;
//		System.out.println("hey random: " + result);
		return result;
	}

	public int waitTime() {
		Random r = new Random();
		int low = 50;
		int high = 100;
		int result = r.nextInt(high-low) + low;
//		System.out.println("hey random: " + result);
		return result;
	}
}

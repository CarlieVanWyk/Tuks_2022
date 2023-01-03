public class Marshal extends Thread implements Runnable{

    private final VotingStation vs;

	Marshal(VotingStation _vs)
	{
		vs = _vs ;
	}

	@Override
	public void run()
	{
		for(int i = 0; i < 5; i++) {
			try {
				vs.castBallot(i);
			} catch (InterruptedException e) {
				throw new RuntimeException(e);
			}
		}
//		System.out.println("there");
	}
}

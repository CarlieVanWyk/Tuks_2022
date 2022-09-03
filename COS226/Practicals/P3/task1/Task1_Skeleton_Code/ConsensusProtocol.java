public abstract class ConsensusProtocol<T> implements Consensus<T>
{
	public volatile Object[] proposed;

	public ConsensusProtocol(int threadCount)	{
		proposed = new Object[threadCount];
	}

	public void propose(T value){
		String name = Thread.currentThread().getName();
		Integer id = (int)Thread.currentThread().getId() % 10;
		proposed[id] = value;
		System.out.println("Thread: " + name + " has proposed the value: " + proposed[id]);
	}

	abstract public void decide();
}

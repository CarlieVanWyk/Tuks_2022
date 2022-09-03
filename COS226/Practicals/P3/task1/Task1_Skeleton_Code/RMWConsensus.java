import java.util.concurrent.atomic.AtomicInteger;

public class RMWConsensus extends ConsensusProtocol{
    private final int FIRST = -1;
    private AtomicInteger r = new AtomicInteger(FIRST);

    public RMWConsensus(int threadCount) {
        super(threadCount);
    }

    @Override
    public void decide() {
        // propose(value);
        Integer i = (int)Thread.currentThread().getId() % 10;
        if (r.compareAndSet(FIRST, i)) {// I won
            System.out.println("The decided value from Thread " + i +" is: " + proposed[i]);
        }
        else {                     // I lost
            System.out.println("The decided value from Thread " + r.get() +" is: " + proposed[r.get()]);
        }
    }
}

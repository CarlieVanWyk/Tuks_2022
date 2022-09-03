public class main {
    public static void main(String[] args) {
        int threadNum = 2;
        ConsensusThread[] threads = new ConsensusThread[threadNum];
        Consensus<Integer> newCon = new RMWConsensus(threadNum);

        for(int i = 0; i < threadNum; i++) {
//            newCon = new RMWConsensus(threadNum);
            threads[i] = new ConsensusThread(newCon);
        }

//        for(int i = 0; i < 5; i++) {
            for(ConsensusThread t : threads)
                t.start();
//            System.out.println("");

    }
}

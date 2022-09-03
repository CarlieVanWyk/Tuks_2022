import java.util.Arrays;

public class main {
    public static void main(String[] args) {
//        int threadNum = 5;
        final int theNum = 7;
        long[] timeOfThreads = new long[theNum];
        CriticalSection destination = new CriticalSection();

        int minNumThreads = 5;
        int[] numOfThreads = new int[theNum];
        for(int i = 0; i < theNum; i++) {
            numOfThreads[i] = minNumThreads;
            minNumThreads += 5;
        }
        System.out.println("Number of threads: " + Arrays.toString(numOfThreads));

        //_____________________________________________________________TASLock
        TASLock tas = new TASLock();
        TASthread[] threads;
        for(int i = 0; i < theNum; i++) {
            //for each index in numOfThreads
            int amount = numOfThreads[i];
            threads = new TASthread[amount];

            //create that amount of new threads
            for(int j = 0; j < amount; j++) {
                threads[j] = new TASthread(destination, tas);
            }

            //start these threads and measure time
            long startTime = System.nanoTime();
            for(TASthread t : threads)
                t.start();
            long elapsedTime = System.nanoTime() - startTime;

            //add to timeOfThreads array
            timeOfThreads[i] = elapsedTime/1000000;
        }
        System.out.println("TASLock: " + Arrays.toString(timeOfThreads) + " time in [ms]");


        //_____________________________________________________________TTASLock
        TTASLock ttas = new TTASLock();
        TTASthread[] threads2;
        for(int i = 0; i < theNum; i++) {
            //for each index in numOfThreads
            int amount = numOfThreads[i];
            threads2 = new TTASthread[amount];

            //create that amount of new threads
            for(int j = 0; j < amount; j++) {
                threads2[j] = new TTASthread(destination, ttas);
            }

            //start these threads and measure time
            long startTime = System.nanoTime();
            for(TTASthread t : threads2)
                t.start();
            long elapsedTime = System.nanoTime() - startTime;

            //add to timeOfThreads array
            timeOfThreads[i] = elapsedTime/1000000;
        }
        System.out.println("TTASLock: " + Arrays.toString(timeOfThreads) + " time in [ms]");

    }
}

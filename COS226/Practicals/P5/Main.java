public class Main {
    public static void main(String[] args) {
        CoarseGrained myCoarseT = new CoarseGrained();
        FineGrained myFineT = new FineGrained();
        Optimistic myOpT = new Optimistic();

//        System.out.println("________________________________Coarse___________________________");
//        SecurityGuards sg = new SecurityGuards(myCoarseT);
//        System.out.println("________________________________Fine___________________________");
//        SecurityGuards sg = new SecurityGuards(myFineT);
        System.out.println("________________________________Optimistic___________________________");
        SecurityGuards sg = new SecurityGuards(myOpT);

        Thread entryPoint1 = new Thread(sg);
        Thread entryPoint2 = new Thread(sg);
        Thread entryPoint3 = new Thread(sg);
        Thread entryPoint4 = new Thread(sg);
        Thread entryPoint5 = new Thread(sg);

        entryPoint1.start();
        entryPoint2.start();
        entryPoint3.start();
        entryPoint4.start();
        entryPoint5.start();

    }
}

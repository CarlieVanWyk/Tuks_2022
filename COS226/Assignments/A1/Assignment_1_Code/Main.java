public class Main {
    public static void main(String[] args) {

        Project queues = new Project();

        // developers (3)
        int devSize = 3;
        Developers[] devs = new Developers[devSize];
        Bakery b1 = new Bakery(3);

        Testers[] testers = new Testers[3];
        Bakery2 b2 = new Bakery2(3, devSize);

        for(int i = 0; i < 3; i++) {
            devs[i] = new Developers(queues, b1);
        }

        for(int i = 0; i < 3; i++)
            testers[i] = new Testers(queues, b2);

        for (Developers d : devs)
            d.start();

        for (Testers t : testers)
            t.start();


        // testers (3)
//        System.out.println("hello testers");
//        Testers[] testers = new Testers[3];
//        Bakery2 b2 = new Bakery2(3, devSize);

//        for(int i = 0; i < 3; i++)
//            testers[i] = new Testers(queues, b2);


//        for (Testers t : testers)
//            t.start();


    }
}

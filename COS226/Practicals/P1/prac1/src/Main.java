public class Main {

    public static void main(String[] args){

        Scrumboard s = new Scrumboard();

        PetersonLock lock1 = new PetersonLock();
        Thread t1 = new myThread(s,lock1);
        Thread t2 = new myThread(s,lock1);
        t1.start();
        t2.start();
//        try {
//            t1.join();
//        }catch(InterruptedException e){}
//
//        try {
//            t2.join();
//        }catch(InterruptedException e){}


    }
}


/*
1.
 */

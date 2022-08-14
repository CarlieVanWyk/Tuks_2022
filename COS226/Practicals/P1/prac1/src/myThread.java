public class myThread extends Thread
{
    private Scrumboard bleh;

    private static PetersonLock lock;

    myThread(Scrumboard s,PetersonLock l) {
        bleh = s;
        this.lock = l;
    }

    public void run(){

        for(int i = 0; i < 5; i++) {
                lock.lock();
            try{
                String anItem = bleh.nextItem(i);
                System.out.println(this.getName() + " Task: " + anItem);
                bleh.addCompleted(anItem);

            }finally {
                lock.unlock();
            }
        }
//        bleh.isToDoEmpty();

//        System.out.println(String.format("%s is running...", this.getName()));
    }
}

import java.util.Random;

public class SecurityGuards extends Thread{
    private CoarseGrained coarse;
    private FineGrained fine;
    private Optimistic op;

    public SecurityGuards (CoarseGrained c) {
        this.coarse = c;
    }
    public SecurityGuards (FineGrained f) {
        this.fine = f;
    }

    public SecurityGuards (Optimistic o) {
        this.op = o;
    }

    public void run() {


        for (int i = 0; i < 5; i++) {
            int timeInGal = random();
            if(coarse != null) {
                coarse.add(Thread.currentThread().getName() + i, timeInGal, i);
            }
            else if(fine != null) {
                fine.add(Thread.currentThread().getName() + i, timeInGal, i);
            }
            else if(op != null){
                op.add(Thread.currentThread().getName() + i, timeInGal, i);
            }

            System.out.println("[" + Thread.currentThread().getName() + "]: added ([ P-"+ i +"],["+timeInGal+"]");

            try {
                Thread.sleep(timeInGal);
            } catch (InterruptedException e) {
                throw new RuntimeException(e);
            }

            if(coarse != null) {
                coarse.remove(Thread.currentThread().getName() + i);

                coarse.printList();
            }
            else if(fine != null) {
                fine.remove(Thread.currentThread().getName() + i);

                fine.printList();
            }
            else if(op != null){
                op.remove(Thread.currentThread().getName() + i);

                op.printList();
            }
            else {

            }
        }
    }

    public int random() {
        Random r = new Random();
        int low = 100;
        int high = 1000;
        int result = r.nextInt(high-low) + low;
        return result;
    }

}

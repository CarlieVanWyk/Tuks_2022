public class QNode
{
        boolean locked = false;
        int index = 0;
        String threadName = Thread.currentThread().getName();
        QNode next = null;

}

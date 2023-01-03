public class Node {
    public T value;
    public volatile Node next;
    public Node(T x) {
        value = x;
        next = null;
    }
}


import java.util.ArrayList;

public class Scrumboard {

    private ArrayList<String> ToDo = new ArrayList<String>();
    private ArrayList<String> Completed = new ArrayList<String>();

    Scrumboard() {
        ToDo.add("A");
        ToDo.add("B");
        ToDo.add("C");
        ToDo.add("D");
        ToDo.add("E");
        ToDo.add("F");
        ToDo.add("G");
        ToDo.add("H");
        ToDo.add("I");
        ToDo.add("J");
    }

    public String nextItem(int next) {
        return ToDo.remove(0);
    }

    public void addCompleted(String s) {
        Completed.add(s);
    }
//    public void isToDoEmpty() {
//        if(ToDo.isEmpty()) {
//            System.out.println("ToDo list is now empty");
//        }
//        else {
//            System.out.println("ToDo list has items");
//        }
//    }
}

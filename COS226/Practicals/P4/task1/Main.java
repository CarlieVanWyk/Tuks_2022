import java.util.LinkedList;
import java.util.Queue;

public class Main {
    public static void main(String[] args){
        MCSQueue myLock = new MCSQueue();
        VotingStation cs = new VotingStation(myLock);

        //create 5 marshals
        int numOfMarshals = 5;
        Marshal[] marshalThreads = new Marshal[numOfMarshals];
        for(int i = 0; i < numOfMarshals; i++) {
            marshalThreads[i] = new Marshal(cs);
        }

        for(Marshal m : marshalThreads) {
            m.start();
        }

        //create queue for cs
//        int maxAtVS = 5;
//        Queue<Integer> votingStationQ
//                = new LinkedList<>();


        //create 5 diff queues for diff citizens
//        int numOfPeople = 5;
//        Queue<Integer> elderlyQ
//                = new LinkedList<>();
//        for(int i = 0; i < numOfPeople; i++) {
//            elderlyQ.add(i);
//        }
//        for(int i = 0; i < numOfPeople; i++){
//            //if cs queue is max full... abort/try again with next person
//            if(votingStationQ.size() < 5) {
//                votingStationQ.add(i);
//                //let marshal escort each one of these people to cs
//                marshalThreads[0].start();
//            }
//        }

//        Queue<Integer> youthQ
//                = new LinkedList<>();
//        Queue<Integer> parentQ
//                = new LinkedList<>();
//        Queue<Integer> kidsQ
//                = new LinkedList<>();
//        Queue<Integer> dogsQ
//                = new LinkedList<>();

//        for(int i = 0; i < numOfPeople; i++) {
//            elderlyQ.add(i);
//            youthQ.add(i);
//            parentQ.add(i);
//            kidsQ.add(i);
//            dogsQ.add(i);
//        }
    }
}

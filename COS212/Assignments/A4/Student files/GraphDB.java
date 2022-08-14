import java.util.ArrayList;

public class GraphDB {
    private ArrayList<User> users = new ArrayList<>();

    public User addUser(String userName, int ID){

        // same ID already exists, existing user should be returned
        if(this.users != null) {
            for(int i = 0; i < this.users.size(); i++) {
                if(this.users.get(i).userID == ID) {
                    return this.users.get(i);
                }
            }
        }

        //else, create new user, initialize, add to list, and return
        User newUser = new User(userName, ID);
        this.users.add(newUser);
        return newUser;
    }

    public User getUser(int userID){

        //if ID does not exist, return null
        if(this.users == null) {
            return null;
        }

        boolean check = false;
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).userID == userID) {
                check = true;
                break;
            }
            else {
                check = false;
            }
        }
        if(check == false) {
            return null;
        }
        
        //return the user with the same ID
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).userID == userID) {
                return this.users.get(i);
            }
        }

        return null;
        
    }

    public User getUser(String userName){

        //if userName does not exist, return null
        if(this.users == null) {
            return null;
        }

        boolean check = false;
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).userName == userName) {
                check = true;
                break;
            }
            else {
                check = false;
            }
        }
        if(check == false) {
            return null;
        }
        
        //return the user with the same userName
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).userName == userName) {
                return this.users.get(i);
            }
        }

        return null;
        
    }

    public Relationship addFriendship(int frienteeID, int friendedID, double relationshipValue){
        
        //check if both exists (can a relationship be added even?), return null
        boolean checkFrientee = false;
        int frienteeIndex = 0;
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).userID == frienteeID) {
                checkFrientee = true;
                frienteeIndex = i;
                break;
            }
            else {
                checkFrientee = false;
            }
        }
        
        boolean checkFriended = false;
        int friendedIndex = 0;
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).userID == friendedID) {
                checkFriended = true;
                friendedIndex = i;
                break;
            }
            else {
                checkFriended = false;
            }
        }

        if(checkFriended == false || checkFrientee == false) {
            return null;
        }


        //already existsing relationship, return existing relationship
            //get frientee index
        // int index = 0;
        // for(int i = 0; i < this.users.size(); i++) {
        //     if(this.users.get(i).userID == frienteeID) {
        //         index = i;
        //     }
        // }
            //go through frientee friends array, look for friendedID
        for(int i = 0; i < this.users.get(frienteeIndex).friends.size(); i++) {
            if(this.users.get(frienteeIndex).friends.get(i).friendB.userID == friendedID) {
                //relationship exists!
                return this.users.get(frienteeIndex).friends.get(i);
            }
        }   

        //both exist but no relationship, create new relationship, return new relationship
        User tempFriendA = this.users.get(frienteeIndex);
        User tempFriendB = this.users.get(friendedIndex);

        Relationship newRelationship = new Relationship(tempFriendA, tempFriendB, relationshipValue); 
        tempFriendA.friends.add(newRelationship);
        Relationship newRelationship2 = new Relationship(tempFriendB, tempFriendA, relationshipValue);
        tempFriendB.friends.add(newRelationship2);
        
        return newRelationship;

    }

    public User[][] clusterUsers(){

        //brelatz
        brelazColor();

        //put users with same colours into jagged array
        //get number of different colours:
        int maxColour = 0;
        for(int i = 0; i < this.users.size(); i++){
            if(this.users.get(i).colour > maxColour) {
                maxColour = this.users.get(i).colour;
            }
        }
        // Declaring 2-D array with 2 rows
        int rows = maxColour + 1;
        User arr[][] = new User[rows][];
 
        //Getting sizes of columns
        for(int i = 0; i < rows; i++) {
            int count = 0;
            for(int j = 0; j < this.users.size(); j++) {
                if(this.users.get(j).colour == i) {
                    count = count +1;
                }
            }
            arr[i] = new User[count];
        }
  
        // Initializing array
        for(int r = 0; r < arr.length; r++){
            int colSize = arr[r].length;
            int c = 0;
            for(int u = 0; u < this.users.size(); u++) {
                if(this.users.get(u).colour == r && c < colSize) {
                    arr[r][c] = this.users.get(u);
                    c = c +1;
                }
            }
        }

        //sort array
        for(int r = 0; r < arr.length; r++){
            sort(arr[r]);
        }

        return arr;
    }

    public Relationship[] minSpanningTree(){
        ArrayList<Relationship> minSpanningTree = new ArrayList<Relationship>();
        return minSpanningTree.toArray(new Relationship[0]);
    }
//
public User[] getUsersAtDistance(User fromUser, int distance){
    ArrayList<User> arrUsers = new ArrayList<User>(),fakeQueue = new ArrayList<User>();
    initialize(fakeQueue,fromUser);
    User v;
    int i = 0,count = 0;
    while(count < fromUser.friends.size()){
        fromUser.friends.get(count).friendB.number = i++;
        fakeQueue.add(fromUser.friends.get(count).friendB);
        while(!fakeQueue.isEmpty()){
            v = fakeQueue.remove(0);
            innerforloop(v,i,fakeQueue,distance,arrUsers);
        }
        count++;
    }
    return arrUsers.toArray(new User[0]);
}

    private void checkifusercanadd(ArrayList<User> a,User u,double d){
        if(a.isEmpty()){
            if (u.breatFirstCount == d) {
                a.add(u);
            }
        }
        else{
            if (u.breatFirstCount == d) {
                a.add(u);
            }
        }

    }

    private void initialize(ArrayList<User> u,User v){
        int size = users.size();
        int i = 0;
        if(size == 0){
            return;
        }else {
            while (i < size) {
                users.get(i).number = 0;
                users.get(i).breatFirstCount = 0;
                i++;
            }
            goaddusers(u, v);
        }
    }

    private void goaddusers(ArrayList<User> u,User v){
        u.add(v);
        v.number = -1;
    }

    private void doublecount(User a,User b){
        if(a != null){
            if(b != null){
                b.breatFirstCount = a.breatFirstCount + 1;
            }else{
                return;
            }
        }else{
            return;
        }

    }

    private void innerforloop(User v,int i,ArrayList<User> fakeQueue,double distance,ArrayList<User> arrUsers){
        if(v != null){
            if(fakeQueue.isEmpty() == false){
                User ua,ub;
                for(int a = 0; a < v.friends.size(); a++){
                    if(fakeQueue.isEmpty() == false) {
                        ua = v.friends.get(a).friendA;
                        ub = v.friends.get(a).friendB;
                        if (ub.number == 0) {
                            ub.number = i++;
                            doublecount(ua, ub);
                            checkifusercanadd(arrUsers, ub, distance);
                            fakeQueue.add(ub);
                        }
                    }
                }
            }else
                return;
        }else
            return;

    }

    private void sort(User[] arr) {
        for(int i = 1, j; i < arr.length; i++) {
            User temp = arr[i];
            for(j = i; j > 0 && temp.userID < arr[j-1].userID; j--) {
                arr[j] = arr[j-1];
            }
            arr[j] = temp;
        }
    }


    private void brelazColor() {

        for(int i = 0; i < this.users.size(); i++) {
            this.users.get(i).satDeg = 0;
            this.users.get(i).unColDeg = this.users.get(i).friends.size();
        }

//        for(int i = 0; i < this.users.size(); i++){
//            System.out.println(this.users.get(i).userName + ":" + this.users.get(i).satDeg + ":" + this.users.get(i).unColDeg + ":" + this.users.get(i).colorSet);
//        }
//        System.out.println();

        //check if all vertices have been processed
        for(int i = 0; i < this.users.size(); i++) {
            if(this.users.get(i).colorSet == false) {
                
                //finding v
                User v = this.users.get(i);
                User highestSat = this.users.get(i);
                User maxUnCol = this.users.get(i);
                
                //get highestSat:
                for(int j = 0; j < this.users.size(); j++) {
                    if(this.users.get(j).satDeg > highestSat.satDeg && this.users.get(j).colorSet == false) {
                        highestSat = this.users.get(j);
                        v = this.users.get(j);
                        maxUnCol = this.users.get(j);
                    }
                }

                //get maxUncol:
                for(int j = 0; j < this.users.size(); j++) {
                    if(this.users.get(j).colorSet == false) {
                        if(this.users.get(j).satDeg == highestSat.satDeg && this.users.get(j).unColDeg > maxUnCol.unColDeg) {
                            v = this.users.get(j);
                        }
                    }
                }

//                System.out.println("v:" + v);
//                System.out.println(v + " set? " + v.colorSet);


                //the smallest index of colour that does not appear in any of v's neighbours
                int colour = 0;
                boolean bool = true;
                while(bool) {
                    bool = false;
                    for (int c = 0; c < v.friends.size(); c++) {
                        if (v.friends.get(c).friendB.colour == colour) {
                            colour = colour + 1;
                            bool = true;
                        }
                    }
                }

                //for each uncolered vertex u adjacent to v
                for(int c = 0; c < v.friends.size(); c++) {
                    User u = v.friends.get(c).friendB;
                    if(u.colorSet == false) {

                        //if no vertex adjacent to u is assigned colour
                        boolean hasColour = false;
                        for(int b = 0; b < u.friends.size(); b++) {
                            if(u.friends.get(b).friendB.colour != colour) {
                                hasColour = false;
                            }
                            else{
                                hasColour = true;
                            }
                        }

                        if(hasColour == false) {
                            u.satDeg++;
                        }

                        u.unColDeg--;
                    }
                }


                v.colour = colour;
                v.colorSet = true;
//                System.out.println(v + " set? " + v.colorSet);
//                System.out.println("v.colour = " + colour);
//                System.out.println();
//                this.users.get(i).colorSet = true;


//
            }
        }

//        for(int j = 0; j < this.users.size(); j++){
//            System.out.println(this.users.get(j).userName + ":" + this.users.get(j).satDeg +
//                    ":" + this.users.get(j).unColDeg + ":" + this.users.get(j).colorSet + ":" + this.users.get(j).colour);
//        }
    }
}

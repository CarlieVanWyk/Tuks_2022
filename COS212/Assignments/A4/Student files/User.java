import java.util.ArrayList;

public class User {
    String userName;
    int userID;
    ArrayList<Relationship> friends = new ArrayList<>();

    int satDeg;
    int unColDeg;
    boolean colorSet = false;
    int colour = -1;
    int number = 0;
    int breatFirstCount = 0;

    @Override
    public String toString() {
        return userName + "[" + userID + "]";
    }
    
    public User(String userName, int userID){
        this.userName = userName;
        this.userID = userID;
    }

    public Relationship[] getFriends(){
        return friends.toArray(new Relationship[0]);
    }

    public Relationship addFriend(User friend, double friendshipValue){

        //If friend is null, the function should return null
        if(friend == null) {
            return null;
        }

        //Relationship already exists, return existing relationship
        if(this.friends != null) {
            for(int i = 0; i < this.friends.size(); i++) {
                if(this.friends.get(i).friendB == friend) {
                    return this.friends.get(i);
                }
            }
        }

        //relationship does not exist, create new and add to friend's relationship list as well
        Relationship newFriend = new Relationship(this, friend, friendshipValue);                               //can I just use this here?
        this.friends.add(newFriend);
        Relationship newFriend2 = new Relationship(friend, this, friendshipValue);
        friend.friends.add(newFriend2);

        return newFriend;
    }

    public void addFriend(Relationship relationship){
        
    }
}

public class Main {
    public static void main(String[] args) {
	    Transport[] buses = new Transport[5];

        Venue destination = new Venue();

//        Filter f1 = new Filter(5);
        Bakery b1 = new Bakery(5);

//        for(int i = 0; i < 5; i++)
//            buses[i] = new Transport(destination, f1);

        for(int i = 0; i < 5; i++)
            buses[i] = new Transport(destination, b1);

        for(Transport bus : buses)
            bus.start();

    }
}

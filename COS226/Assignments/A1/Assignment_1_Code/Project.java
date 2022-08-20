import java.util.LinkedList;
import java.util.Queue;
import java.util.Random;
import java.util.concurrent.locks.Lock;

// Name: carlie van wyk
// Student Number: u21672823

public class Project
{
	private volatile Queue<Component> develop = new LinkedList<>(), testing = new LinkedList<>();
	private volatile Queue<Component> done = new LinkedList<>();
	
	public Project(){
		develop.add(new Component('s', "Calculator"));
		develop.add(new Component('m', "Calendar"));
		develop.add(new Component('s', "Billing"));
//		develop.add(new Component('l', "Timetable"));
//		develop.add(new Component('m', "Phonebook"));
//		develop.add(new Component('l', "User Manager"));
//		develop.add(new Component('s', "Api"));
	}

	public int developSize() {
		return 3;
	}

	public int doneSize() {
		return done.size();
	}

//	_______________________________my code for developers____________________________
	public void devQueue() throws InterruptedException {
		if(develop.isEmpty() == false) {
			Component myComp = develop.peek();

			//work:
			System.out.println(Thread.currentThread().getName() + " is developing.");
			int timeToWork = randomWork();
			Thread.currentThread().sleep(timeToWork);
			//break:
			System.out.println(Thread.currentThread().getName() + " is taking a break.");
			Thread.currentThread().sleep(randomBreak());

			//check time
			int timeRemain = (int) myComp.developTime - timeToWork;
			if (timeRemain <= 0) {
				myComp.developTime = 0;
				System.out.println(Thread.currentThread().getName() + " finished developing " + myComp.name);
				testing.add(myComp);
				develop.remove();

				//goTo next comp
				if (develop.isEmpty() == false) {
					myComp = develop.peek();
				}

			} else {
				myComp.developTime = timeRemain;
				System.out.println(Thread.currentThread().getName() + " developed " + myComp.name + " for " + timeToWork + "ms. Time remaining: " + timeRemain + "ms");
			}
		}

	}

	public boolean isDevQempty() {
		return develop.isEmpty();
	}

//	_______________________________my code for testers____________________________
	public void testQueue() throws InterruptedException {
		if(testing.isEmpty() == true) {
			//do nothing
		}
		else{
			Component myComp = testing.peek();

			//work:
			System.out.println(Thread.currentThread().getName() + " is testing.");
			int timeToWork = randomWork();
			Thread.currentThread().sleep(timeToWork);
			//break:
			System.out.println(Thread.currentThread().getName() + " is taking a break.");
			Thread.currentThread().sleep(randomBreak());

			//check time
			int timeRemain = (int) myComp.testTime - timeToWork;
			if (timeRemain <= 0) {
				myComp.testTime = 0;
				System.out.println(Thread.currentThread().getName() + " finished testing " + myComp.name);
				done.add(myComp);
				testing.remove();

				//goTo next comp
				if (testing.isEmpty() == false) {
					myComp = testing.peek();
				}

			} else {
				myComp.testTime = timeRemain;
				System.out.println(Thread.currentThread().getName() + " tested " + myComp.name + " for " + timeToWork + "ms. Time remaining: " + timeRemain + "ms");
			}
		}

	}

	public boolean isTestQempty() {
		return testing.isEmpty();
	}

	public int randomBreak() {

		Random r = new Random();
		int low = 50;
		int high = 100;
		int result = r.nextInt(high-low) + low;
		return result;
	}
	public int randomWork() {

		Random r = new Random();
		int low = 100;
		int high = 500;
		int result = r.nextInt(high-low) + low;
		return result;
	}
}

#include <iostream>
using namespace std;

//5.1)

void addAndSubtract(int num, int originalVal, bool zeroPassed) {

	if(num > 0 && zeroPassed == false) {
		cout<< num << " ";
		num = num-7;
		addAndSubtract(num, originalVal, zeroPassed);

		if(num <= 0) {
			zeroPassed = true;
			addAndSubtract(num, originalVal, zeroPassed);
		}
	}
	else if (zeroPassed == true) {
		cout<< num << " ";
		num = num +7;

		if(num == originalVal) {
			cout<< num << " ";
			return;
		}
		addAndSubtract(num, originalVal, zeroPassed);
	}
}


//5.2)
/*
int ack(int m, int n) {

	if( m == 0) {
		n = n +1;
		return n;
	}
	else if(m > 0 && n == 0) {
		ack(m-1, 1);
	}
	else if(m > 0 && n > 0) {
		ack(m-1, ack(m, n-1));
	}

	return 0;
}
*/

int main() 
{
	//5.1)
	
	int num = 14;
	bool zeroPassed = false;
	cout<< num << " ";
	
	addAndSubtract(num-7, num, zeroPassed);
	

	//5.2
	/*
	cout << ack(2, 1) << endl;
	*/
	
	return 0;
}

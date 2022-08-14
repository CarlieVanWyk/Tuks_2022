#include <iostream>
#include <iomanip>
#include "Calculator.cpp"

using namespace std;

int main() 
{
	Calculator<int> C1(741, 13);
	cout << C1.divide() << endl;

	Calculator<double> C2(127.58, 54.971);
	cout << C2.add() << endl;

	// Calculator<string> C3("Hello ", "World");
	// cout << C3.add() << endl;

	// Calculator<string> C4("Hello ", "World");
	// cout << C4.multiply() << endl;
	return 0;
}

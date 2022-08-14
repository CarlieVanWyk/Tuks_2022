#include <iostream>
using namespace std;

class ClassA {
	private: 
	public:
		ClassA() {
			cout << "ClassA's Empty Constructor is Called" << endl;
		}
		virtual void showInfo() = 0;
		~ClassA() {
			cout << "ClassA's Destructor is Called"  << endl;
		}
};

// class ClassB { 
// 	private:
// 	public:
// 		ClassB() {
// 				cout << "ClassB's Empty Constructor is Called" << endl;
// 		}
// 		~ClassB() {
// 				cout << "ClassB's Destructor is Called" << endl;
// 		}
// };

class ClassC: public ClassA {
	public:
		ClassC(){
				cout << "ClassC's Empty Constructor is Called" << endl;
		}
		void showInfo();
		~ClassC() {
				cout << "ClassC's Destructor is Called" << endl;
		}

};




int main() 
{
	
	// ClassB B;
	ClassC C;
	return 0;
}

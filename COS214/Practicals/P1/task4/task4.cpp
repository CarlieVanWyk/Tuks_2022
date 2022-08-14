#include <iostream>
using namespace std;

typedef int * IntPtrType ;

int countEven(int* arr, int s) {
	int count = 0;
	for(int i = 0; i < s; i++) {
		if(arr[i]%2 == 0) {
			count++;
		}
	}
	return count;
};

double* maximum(double* a, int size) {
	double* largest = &a[0];

	if(size = 0) {
		return NULL;
	}

	for(int i = 1; i < size; i++) {
		if(a[i] > *largest) {
			largest = &a[i];
		}
	}

	return largest;
};

int main() 
{
	//4.1)
	// IntPtrType ptrA, ptrB, *ptrC;

	// ptrA = new int ;
	// *ptrA = 15;
	// ptrB= ptrA;
	// cout << * ptrA << "_" << *ptrB << "\n" ;

	// ptrB = new int ;
	// *ptrB = 4 ;
	// cout << *ptrA << "_" << *ptrB << "\n";

	// *ptrB = *ptrA ;
	// cout << *ptrA << "_" << *ptrB << "\n";

	// delete ptrA ;
	// ptrA = ptrB ;
	// cout << *ptrA << "_" << *&*&*&*&*ptrB << "\n";

	// ptrC = &ptrA ;
	// cout << * ptrC << "_" << ** ptrC << "\n" ;
	// delete ptrA ;
	// ptrA = NULL;

	//4.2)
	// const int size = 5;
	// int arr[size] = {1, 2, 3, 4, 5};

	// cout << countEven(arr, size);

	//4.3)
 	const int size = 5;
	double arr[size] = {1, 2, 7, 4, 5};

	cout << *maximum(arr, size);
	
	return 0;
}

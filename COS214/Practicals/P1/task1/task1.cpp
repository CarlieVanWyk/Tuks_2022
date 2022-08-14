#include <iostream>
using namespace std;

int main() 
{
	
	int a ;
	double * b = new double;
	char c [ 10 ] ;
	long const n = 20;
	int d [ n ] ;
	const int * e = ( const int * ) 522;
	void* f = ( void*) 0xacfe2675 ;          
	char g = 2 ;
	// const int h = NULL;                        //error
	c [ 10 ] = *&*e ;                           //error
	// cout << c [ 10 ] << endl ;                     //error
	cout << "hello" << endl;
	return 0;
}

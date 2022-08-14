#ifndef CALCULATOR_H
#define CALCULATOR_H

#include<iostream>
using namespace std;


template <class T>
class Calculator {
    private :
        T num1 , num2 ;
    public :
    Calculator ( T n1 , T n2 );
    T add ( );
    T subtract ( );
    T multiply ( );
    T divide ( );
};

// template <class T>
// Calculator<T>::Calculator(T n1, T n2 ) {
//     num1 = n1 ;
//     num2 = n2 ;
// } 

// template <class T>
// T Calculator<T>::add ( ) { 
//     return num1 + num2 ; 
// }

// template <class T>
// T Calculator<T>::subtract ( ) { 
//     return num1 - num2 ; 
// }

// template <class T>
// T Calculator<T>::multiply ( ) { return num1 * num2 ; }

// template <class T>
// T Calculator<T>::divide ( ) { return num1 / num2 ; }

// #include "Calculator.cpp"
#endif
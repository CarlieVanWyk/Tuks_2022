#ifndef AERO_H
#define AERO_H

using namespace std;
#include <iostream>
#include "AeratedChocolate.h"

class Aero : public AeratedChocolate {


public:
	Aero(string manu, double price, int bpcc);
};

#endif

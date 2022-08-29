#ifndef AERATEDCHOCOLATE_H
#define AERATEDCHOCOLATE_H

using namespace std;
#include <iostream>
#include "Confectionary.h"

class AeratedChocolate : public Confectionary {
private:
	int bpcc;

public:
	AeratedChocolate(string manu, double price, int bpcc);
	string getDescription();
};

#endif

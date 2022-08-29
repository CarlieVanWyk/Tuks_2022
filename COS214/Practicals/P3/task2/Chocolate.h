#ifndef CHOCOLATE_H
#define CHOCOLATE_H

using namespace std;
#include <iostream>
#include "Confectionary.h"

class Chocolate : public Confectionary {

private:
	bool slab;

public:
	Chocolate(string manu, double price, bool slab);
	string getDescription();
};

#endif

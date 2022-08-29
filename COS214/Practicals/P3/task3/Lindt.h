#ifndef LINDT_H
#define LINDT_H

using namespace std;
#include <iostream>
#include "ConfectionaryFactory.h"
#include "Lindor.h"

class Lindt : public ConfectionaryFactory {


public:
	Lindt();
	~Lindt();
	Confectionary* createChoc(bool);
	Confectionary* createAerChoc(int);
};

#endif

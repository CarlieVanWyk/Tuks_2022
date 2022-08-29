#ifndef CONFECTIONARYFACTORY_H
#define CONFECTIONARYFACTORY_H

using namespace std;
#include <iostream>
#include "Confectionary.h"


class ConfectionaryFactory {
private:
	Confectionary* choc;
	Confectionary* aerChoc;

public:
	ConfectionaryFactory();
	virtual ~ConfectionaryFactory();
	virtual Confectionary* createChoc(bool) = 0;
	virtual Confectionary* createAerChoc(int) = 0;
};

#endif

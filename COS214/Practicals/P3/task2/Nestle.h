#ifndef NESTLE_H
#define NESTLE_H

using namespace std;
#include <iostream>
#include "ConfectionaryFactory.h"
#include "MilkyBar.h"
#include "Aero.h"

class Nestle : public ConfectionaryFactory {
private:

public:
	Nestle();
	~Nestle();
	Confectionary* createChoc(bool);
	Confectionary* createAerChoc(int);
};

#endif

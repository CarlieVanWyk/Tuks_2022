#ifndef CADBURY_H
#define CADBURY_H

using namespace std;
#include <iostream>
#include "ConfectionaryFactory.h"
#include "DiaryMilk.h"
#include "DiaryMilkBubbly.h"

class Cadbury : public ConfectionaryFactory {
private:

public:
	Cadbury();
	~Cadbury();
	Confectionary* createChoc(bool);
	Confectionary* createAerChoc(int);
};

#endif

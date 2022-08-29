#ifndef CONFECTIONARY_H
#define CONFECTIONARY_H

using namespace std;
#include <iostream>

class Confectionary {

private:
	string manufacturer;
	double price;
	string type;
	int currentID;

public:
	Confectionary(string manu, double price, string type);
	virtual string getDescription() = 0;

	string getManufacturer();
	double getPrice();
	string getType();
	int getCurrentID();
};

#endif

#include "Confectionary.h"

static int id;

Confectionary::Confectionary(string manu, double price, string type) {
	this->manufacturer = manu;
	this->price = price;
	this->type = type;

	this->currentID = id;                  //is id = 0
	id++;
}

string Confectionary::getManufacturer() {
	return this->manufacturer;
}

double Confectionary::getPrice() {
	return this->price;
}

string Confectionary::getType() {
	return this->type;
}

int Confectionary::getCurrentID() {
	return this->currentID;
}
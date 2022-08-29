#include "AeratedChocolate.h"

AeratedChocolate::AeratedChocolate(string manu, double price, int bpcc) : Confectionary(manu, price, "AeratedChocolate") {
	this->bpcc = bpcc;
}

string AeratedChocolate::getDescription() {
	string description = "AeratedChocolate: " + to_string(this->getCurrentID()) 
						+ ", manufacurer: " + this->getManufacturer() 
						+ ", price: " + to_string(this->getPrice()) 
						+ ", bubbles per cm^3: " + to_string(this->bpcc) + "\n";
	return description;
}

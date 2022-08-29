#include "Chocolate.h"

Chocolate::Chocolate(string manu, double price, bool slab) : Confectionary(manu, price, "Chocolate") {
	this->slab = slab;
	
}

string Chocolate::getDescription() {
	string description = "Chocolate: " + to_string(this->getCurrentID()) 
						+ ", manufacurer: " + this->getManufacturer() 
						+ ", price: " + to_string(this->getPrice()) 
						+ ", slab: " + to_string(this->slab) + '\n';
	return description;
}

#include "Nestle.h"

Nestle::Nestle() : ConfectionaryFactory() {
	
}

Nestle::~Nestle() {

	
}

Confectionary* Nestle::createChoc(bool slab) {
	Confectionary* choc = new MilkyBar("Nestle", 1.50, slab);
	return choc;
}

Confectionary* Nestle::createAerChoc(int bpcc) {
	Confectionary* aerChoc = new Aero("Nestle", 2.0, bpcc);
	return aerChoc;
}
	

#include "Lindt.h"

Lindt::Lindt() : ConfectionaryFactory() {
	
}

Lindt::~Lindt() {
	
}

Confectionary* Lindt::createChoc(bool slab) {
	Confectionary* choc = new Lindor("Lint", 5.0, slab);
	return choc;
}

Confectionary* Lindt::createAerChoc(int bpcc) {
	return NULL;
}
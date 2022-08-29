#include "Cadbury.h"

Cadbury::Cadbury() : ConfectionaryFactory() {
	
}

Cadbury::~Cadbury() {

	
}

Confectionary* Cadbury::createChoc(bool slab) {
	Confectionary* choc = new DiaryMilk("Cadbury", 1.50, slab);
	return choc;
}

Confectionary* Cadbury::createAerChoc(int bpcc) {
	Confectionary* aerChoc = new DiaryMilkBubbly("Cadbury", 2.0, bpcc);
	return aerChoc;
}
	


main:	
	g++ -c -std=c++98 UserManager.cpp
	g++ -c -std=c++98 User.cpp                 
	g++ -c -std=c++98 Snapshot.cpp
	g++ -c -std=c++98 AuditableSnapshot.cpp
	g++ -c -std=c++98 main.cpp                 
	g++ -o main main.o UserManager.o User.o Snapshot.o AuditableSnapshot.o
	./main
clean:
	rm *.o main
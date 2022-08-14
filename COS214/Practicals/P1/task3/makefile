run: main
	./main

main: main.o Calculator.o 
	g++ -static main.o Calculator.o -o main

main.o:	main.cpp Calculator.h 
	g++ -c main.cpp

Calculator.o: Calculator.cpp Calculator.h
	g++ -c Calculator.cpp
	
clean:
	rm *.o 

# main:
# 	g++ task3.cpp -o main
# run:
# 	./main
# clean:
# 	rm *.o main
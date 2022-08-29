# run: main
# 	./main

# main: main.o Confectionary.o Chocolate.o AeratedChocolate.o DiaryMilk.o MilkyBar.o Lindor.o DiaryMilkBubbly.o Aero.o
# 	g++ -static main.o Confectionary.o Chocolate.o AeratedChocolate.o DiaryMilk.o MilkyBar.o Lindor.o DiaryMilkBubbly.o Aero.o -o main

# main.o:	main.cpp Confectionary.h Chocolate.h AeratedChocolate.h DiaryMilk.h MilkyBar.h Lindor.h DiaryMilkBubbly.h Aero.h
# 	g++ -c main.cpp 

# Confectionary.o: Confectionary.cpp Confectionary.h
# 	g++ -c Confectionary.cpp

# Chocolate.o: Chocolate.cpp Chocolate.h
# 	g++ -c Chocolate.cpp

# AeratedChocolate.o: AeratedChocolate.cpp AeratedChocolate.h
# 	g++ -c AeratedChocolate.cpp

# DiaryMilk.o: DiaryMilk.cpp DiaryMilk.h
# 	g++ -c DiaryMilk.cpp

# MilkyBar.o: MilkyBar.cpp MilkyBar.h
# 	g++ -c MilkyBar.cpp

# Lindor.o: Lindor.cpp Lindor.h
# 	g++ -c Lindor.cpp

# DiaryMilkBubbly.o: DiaryMilkBubbly.cpp DiaryMilkBubbly.h
# 	g++ -c DiaryMilkBubbly.cpp

# clean:
# 	rm *.o 


main:	
	g++ -c -std=c++11 *.cpp
	               
	g++ -o main *.o
	./main
	rm *.o main
all:
run: main
	./main

main: main.o SquadMember.o Snake.o Enemy.o Jaguar.o Gorilla.o Cannibal.o EnemyFactory.o SnakeFactory.o AdventureIsland.o GorillaFactory.o JaguarFactory.o CannibalFactory.o
	g++ -static main.o SquadMember.o Snake.o Enemy.o Jaguar.o Gorilla.o Cannibal.o EnemyFactory.o SnakeFactory.o AdventureIsland.o GorillaFactory.o JaguarFactory.o CannibalFactory.o -o main

main.o:	main.cpp SquadMember.h Snake.h Enemy.h Jaguar.h Gorilla.h Cannibal.h EnemyFactory.h SnakeFactory.h AdventureIsland.h GorillaFactory.h JaguarFactory.h CannibalFactory.h
	g++ -c main.cpp 

SquadMember.o: SquadMember.cpp SquadMember.h
	g++ -c SquadMember.cpp

Snake.o: Snake.cpp Snake.h
	g++ -c Snake.cpp

Enemy.o: Enemy.cpp Enemy.h
	g++ -c Enemy.cpp

Jaguar.o: Jaguar.cpp Jaguar.h
	g++ -c Jaguar.cpp

Gorilla.o: Gorilla.cpp Gorilla.h
	g++ -c Gorilla.cpp

Cannibal.o: Cannibal.cpp Cannibal.h
	g++ -c Cannibal.cpp

EnemyFactory.o: EnemyFactory.cpp EnemyFactory.h
	g++ -c EnemyFactory.cpp

SnakeFactory.o: SnakeFactory.cpp SnakeFactory.h
	g++ -c SnakeFactory.cpp

AdventureIsland.o: AdventureIsland.cpp AdventureIsland.h
	g++ -c AdventureIsland.cpp

GorillaFactory.o: GorillaFactory.cpp GorillaFactory.h
	g++ -c GorillaFactory.cpp

JaguarFactory.o: JaguarFactory.cpp JaguarFactory.h
	g++ -c JaguarFactory.cpp

CannibalFactory.o: CannibalFactory.cpp CannibalFactory.h
	g++ -c CannibalFactory.cpp
	
clean:
	rm *.o 
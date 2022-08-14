#include <iostream>
#include <string>
#include <ctime>
#include <stdlib.h>
#include "User.h"
#include "UserManager.h"

using namespace std;

void Run() {
  User *user = new User("username", "mysecretpassword");
  UserManager *userManager = new UserManager(user);
  userManager->Backup();
  user->SetPassword("pa$$w0rd");
  userManager->Backup();
  user->SetPassword("5t@rw@r5");
  userManager->Backup();
  user->SetPassword("bigB@ng");
  cout << "\n";
  userManager->ShowHistory();
  cout << "\nClient: Now, let's rollback!\n\n";
  userManager->Undo();
  cout << "\nClient: Once more!\n\n";
  userManager->Undo();

  delete user;
  delete userManager;
}

int main() {
  srand(static_cast<unsigned int>(time(NULL)));
  Run();
  return 0;
}



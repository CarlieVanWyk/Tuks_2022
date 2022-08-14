#include <iostream>
#include "User.h"
#include "Snapshot.h"
#include <stdlib.h>

string User::GenerateRandomString(int length = 10) {
    const char alphanum[] =
        "0123456789"
        "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
        "abcdefghijklmnopqrstuvwxyz";
    int stringLength = sizeof(alphanum) - 1;

    string random_string;
    for (int i = 0; i < length; i++) {
      random_string += alphanum[rand() % stringLength];
    }
    return random_string;
  }

User::User(string username, string password) : _username(username), _password(password) {
    cout << "User: I have been initialized with username " << this->_username << 
    " and a password of " << this->_password << "\n";
}
    
void User::SetPassword(string password) {
    cout << "User: Setting a new secure password.\n";
    // TODO : Implement
    this->_password = password;
    cout << "User: My password has been changed to: " << this->_password << "\n";
}

AuditableSnapshot * User::Save() {
    // TODO : Implement
    Snapshot * sssnap = new Snapshot(_password, _username);
    return sssnap;
}

void User::Restore(AuditableSnapshot *memento) {
    this->_password = memento->state();
    cout << "User: My password has changed to: " << this->_password << "\n";
}
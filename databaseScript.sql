CREATE TABLE Person (
    username varchar(50) PRIMARY KEY,
    firstName varchar(50),
    lastName varchar (50),
    password varchar (100),
    status varchar(20)
    );

CREATE TABLE WorkGroup (
    idGroup integer AUTO_INCREMENT PRIMARY KEY,
    name varchar(50),
    username1 varchar(50) NOT NULL,
    username2 varchar(50) NOT NULL,
    username3 varchar(50),
    FOREIGN KEY (username1) REFERENCES Person(username),
    FOREIGN KEY (username2) REFERENCES Person(username),
    FOREIGN KEY (username3) REFERENCES Person(username)
    );

CREATE TABLE Doc(
      name varchar(100),
      dateDeposit date,
      lastModification date,
      username varchar(50),
      idGroup integer,
      FOREIGN KEY (idGroup) REFERENCES WorkGroup(idGroup),
      FOREIGN KEY (username) REFERENCES Person(username),
      PRIMARY KEY (name,username)
);

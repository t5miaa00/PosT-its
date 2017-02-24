-- Temporary user for the mysql database.
CREATE USER 'post_its'@'localhost'
   IDENTIFIED BY 'e32ef4a2a8ad681cdb42a830eefa0d14'; -- MD5 ftw!

-- User table of the database.
CREATE TABLE users
(
   userID INTEGER AUTO_INCREMENT,
   username VARCHAR(25),
   password CHAR(64), -- Passwords will be saved as SHA256 hashes.
   note_amount SMALLINT, -- To restrict users from posting too many notes.
   message_draft VARCHAR(255), -- Message will be 255 characters long max.
   PRIMARY KEY(userID)
)
ENGINE = InnoDB;

-- Notes table of the database.
CREATE TABLE notes
(
   noteID INTEGER AUTO_INCREMENT,
   userID INTEGER,
   message VARCHAR(255),
   position_x FLOAT(6,2), -- 6 digits, 2 decimals => 1234,56
   position_y FLOAT(6,2), -- Theoretical maximum value: 9999,99
   post_date DATETIME,
   PRIMARY KEY(noteID),
   FOREIGN KEY(userID) REFERENCES users(userID)
      ON DELETE CASCADE
      ON UPDATE RESTRICT
)
ENGINE = InnoDB;

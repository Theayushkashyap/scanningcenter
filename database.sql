ALTER TABLE users ADD COLUMN user_type ENUM('user', 'admin') DEFAULT 'user' AFTER cpassword;

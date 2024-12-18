CREATE TABLE user_completed_tasks (
                                      id INT AUTO_INCREMENT PRIMARY KEY,
                                      user_id INT NOT NULL,
                                      aufgabe_id INT NOT NULL,
                                      completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      UNIQUE(user_id, aufgabe_id),
                                      FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
                                      FOREIGN KEY (aufgabe_id) REFERENCES aufgaben(id) ON DELETE CASCADE
);
SELECT toetsen.onderwerp, COUNT(cijfers.student_id) FROM toetsen 
JOIN cijfers ON toetsen.id = cijfers.toets_id GROUP BY toetsen.onderwerp;
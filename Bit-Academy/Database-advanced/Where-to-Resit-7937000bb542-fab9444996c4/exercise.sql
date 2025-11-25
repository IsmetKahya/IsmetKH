SELECT toetsen.onderwerp, COUNT(cijfers.student_id) AS 'aantal leerlingen' FROM toetsen
JOIN cijfers ON toetsen.id = cijfers.toets_id GROUP BY toetsen.onderwerp HAVING COUNT(cijfers.student_id) < 10;
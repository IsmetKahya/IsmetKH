SELECT 
    vakken.vak, 
    docenten.docent, 
    docenten.telefoon
FROM 
    vakken
INNER JOIN 
    docenten ON vakken.docent_id = docenten.id;
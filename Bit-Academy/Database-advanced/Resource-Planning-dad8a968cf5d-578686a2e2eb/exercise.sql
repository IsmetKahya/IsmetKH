SELECT 
    vakken.vak, 
    docenten.docent, 
    docenten.telefoon
FROM 
    vakken
LEFT JOIN 
    docenten ON vakken.docent_id = docenten.id;
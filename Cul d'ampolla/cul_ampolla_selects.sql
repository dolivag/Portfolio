SELECT * FROM clients 
INNER JOIN adreces ON clients.adreces_id = adreces.adreces_id;

SELECT M.nom AS "Marca", P.name AS "Venuda per" FROM marques M, proveidors P
WHERE M.proveidors_id = P.proveidors_id;

SELECT concat("Gafes tipus ", U.muntura, " amb un vidre de color ", U.color_vidre1, " y l'altre de color ", U.color_vidre2) AS "Gafas", M.nom AS "De la marca", 
P.name AS "Comprades a", E.nom AS "Venudes per" FROM ulleres U, marques M, proveidors P, empleats E 
WHERE U.marques_id = M.marques_id AND M.proveidors_id = P.proveidors_id AND U.venda_empleat_id = E.empleat_id;
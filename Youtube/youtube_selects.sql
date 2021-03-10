SELECT C.nom_canal AS "Nom del canal", U.nom_usuari AS "Usuari" FROM canals C, usuaris U 
WHERE C.usuari_id = U.usuari_id;

SELECT * FROM videos 
INNER JOIN comentaris ON videos.video_id=comentaris.videos_video_id;

SELECT W.titol, E.nom FROM video_has_etiquetes V
INNER JOIN etiquetes E ON V.etiqueta_id = E.etiqueta_id
INNER JOIN videos W ON V.video_id = W.video_id;


SELECT V.titol, 
COUNT( CASE WHEN R.tipus_reacció="like" THEN 1 END ) AS  "Likes", 
COUNT( CASE WHEN R.tipus_reacció="dislike" THEN 1 END ) AS "Dislikes" 
FROM reaccions R
INNER JOIN videos AS V ON V.video_id = R.videos_video_id
GROUP BY videos_video_id;
SELECT U.nom_usuari, P.nom_playlist FROM usuaris_free U, playlists P 
WHERE P.free_id = U.usuari_free_id ORDER BY U.nom_usuari;

SELECT DISTINCT U.nom_usuari, P.nom_playlist, C.titol FROM usuaris_premium U, playlists P, cançons C, playlists_has_cançons PHC
WHERE PHC.canço_id = C.canço_id AND PHC.playlists_playlist_id= P.playlist_id AND P.premium_id= U.usuari_premium_id;


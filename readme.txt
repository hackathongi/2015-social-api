# HackatonGirona Grup de Api Facebook

API XARXES SOCIALS
*Nota: Entre claudàtors [] els paràmetres que no són obligatoris
URL BASE: apisocial.wallyjobs.com

Mètode: 	POST 
URL: 		/login
Descripció: Demanar permís per la xarxa social
Parametres:
			url_ok -> URL on es redirigeix l'usuari quan accepta la nostra aplicació. Retorna el paràmetre user_id.
			url_ko -> URL on es redirigeix l'usuari quan no accepta la nostra aplicació
			[network] -> Xarxa social on es fa el login (Opcions: facebook, twitter). Per defecte serà Facebook. *En la primera fase no aplica


Mètode: 	GET 
URL: 		/info
Descripció: Informació de l'usuari (Nom, email, imatges...)
Parametres:
			user_id -> Identificador de l'usuari


Mètode: 	GET 
URL: 		/friends
Descripció: Retorna els amics d'un usuari. Si es donen dos ids, es retornen els amics en comú
Parametres:
			user_id -> Identificador de l'usuari
			[user_id_2] -> Identificador del segon usuari amb qui trobar els amics en comú


Mètode: 	POST 
URL: 		/stream
Descripció: Publica un missatge en el mur de l'usuari. Si es dona un segon id, es publica en el mur de l'amic.
Parametres:
			user_id -> Identificador de l'usuari
			[user_id_2] -> Identificador del segon usuari a qui publicar el missatge
			message -> Missatge a publicar al mur


Mètode: 	POST 
URL: 		/private
Descripció: Envia un missatge privat a un amic.
Parametres:
			user_id -> Identificador de l'usuari que envia el missatge
			user_id_2 -> Identificador del segon usuari a qui enviar el missatge
			message -> Missatge a enviar


Mètode: 	POST 
URL: 		/notify
Descripció: Envia una notificació de la plataforma a l'usuari
Parametres:
			user_id -> Identificador de l'usuari que rep el missatge
			message -> Missatge a enviar

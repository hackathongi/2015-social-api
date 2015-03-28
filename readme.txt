# HackatonGirona Grup de Api Facebook

API XARXES SOCIALS
*Nota: Entre <> els paràmetres obligatoris. Entre claudàtors [] els paràmetres opcionals
URL BASE: apisocial.wallyjobs.com

Mètode: 	POST 
URL: 		/login/facebook
Descripció: Demanar permís per la xarxa social
Parametres:
			<urlOK>		-> URL on es redirigeix l'usuari quan accepta la nostra aplicació. Retorna el paràmetre user_id.
			<urlKO> 	-> URL on es redirigeix l'usuari quan no accepta la nostra aplicació
			


Mètode: 	GET 
URL: 		/info/<provider>/<userId>
Descripció: Informació de l'usuari en una xarxa social concreta (Nom, email, imatges...)
Parametres:
			<provider> 	-> Xarxa social (Opcions: facebook, twitter, linkedin). *En la primera fase només facebook
			<userId> 	-> Identificador de l'usuari



Mètode: 	GET 
URL: 		/info-social/<provider>/<userId>
Descripció: Informació de l'usuari en una xarxa social concreta (Nom, email, imatges...)
Parametres:
			<provider> 	-> Xarxa social (Opcions: facebook, twitter, linkedin). *En la primera fase només facebook
			<userId> 	-> Identificador de l'usuari ala xarxa social


Mètode: 	GET 
URL: 		/friends/<provider>
Descripció: Retorna els amics de l'usuari loguejat que estan dins l'aplicació
Parametres:
			<provider> 	-> Xarxa social (Opcions: facebook, twitter, linkedin). *En la primera fase només facebook



== NOT IMPLEMENTED ==

Mètode: 	POST 
URL: 		/stream
Descripció: Publica un missatge en el mur de l'usuari. Si es dona un segon id, es publica en el mur de l'amic.
Parametres:
			<provider> 	-> Xarxa social (Opcions: facebook, twitter, linkedin). *En la primera fase només facebook
			<userId> 	-> Identificador de l'usuari
			[userId2] 	-> Identificador del segon usuari a qui publicar el missatge
			<message>	-> Missatge a publicar al mur


Mètode: 	POST 
URL: 		/private
Descripció: Envia un missatge privat a un amic.
Parametres:
			<provider> 	-> Xarxa social (Opcions: facebook, twitter, linkedin). *En la primera fase només facebook
			<userId> 	-> Identificador de l'usuari que envia el missatge
			<userId2> 	-> Identificador del segon usuari a qui enviar el missatge
			<message>	-> Missatge a enviar


Mètode: 	POST 
URL: 		/notify
Descripció: Envia una notificació de la plataforma a l'usuari
Parametres:
			<provider> 	-> Xarxa social (Opcions: facebook, twitter, linkedin). *En la primera fase només facebook
			<userId> 	-> Identificador de l'usuari que rep el missatge
			<message>	-> Missatge a enviar

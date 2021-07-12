# Routes

## Sprint 0

### Front 


| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Homepage |  | - |
| `/team` | `GET` | `MainController` | `team` | Team | Presentation Team | - |
|--|--|--|--|--|--|--|
| `/user` | `GET` | `UserController` | `detail` | Informations perso |  | Detail profil perso |
| `/user` | `PUT/PATCH` | `UserController` | `update` | Informations perso |  | Modif Detail profil perso |
| `/user` | `DELETE` | `UserController` | `delete` | Informations perso |  | supprimmer profil perso |
|--|--|--|--|--|--|--|
| `/login` | `GET/POST` | `SecurityController` | `login` | Login |  | - |
| `/logout` | `GET` | `SecurityController` | `logout` | Logout |  | - |
|--|--|--|--|--|--|--|
| `/register` | `GET` | `RegistrationController` | `register` | Register |  | - |
|--|--|--|--|--|--|--|
| `/location` | `GET` | `LocationController` | `list` | |  | Liste des destinations |
| `/location/continent` | `GET` | `LocationController` | `list` | |  | Liste des continents |
| `/location/continent/id` | `GET` | `LocationController` | `detail` | |  |  continent choisi |
| `/location/continent/id/country` | `GET` | `LocationController` | `country` |  |  | Liste des pays en fonction du continent choisi |
| `/location/continent/id/country/id` | `GET` | `LocationController` | `countryDetail` |  |  | Details du pays "choisi" |
|--|--|--|--|--|--|--|
| `/forum` | `GET` | `ForumController` | `list` | |  | Liste des sujets du forum |
| `/forum/add` | `GET` | `ForumController` | `add` | |  | Liste des sujets du forum |
| `/forum/id` | `GET` | `ForumController` | `detail` | |  | Sujet particulier du forum |
| `/forum/id` | `DELETE` | `ForumController` | `delete` | |  | Suppresion Sujet particulier du forum |
| `/forum/id` | `PUT/PATCH` | `ForumController` | `update` | |  | Modifictaion Sujet particulier du forum |
| `/forum/id/response` | `GET` | `ForumController` | `responseList` | |  | Liste commentaires lié au sujet|
| `/forum/id/response/add` | `GET` | `ForumController` | `responseList` | |  | Ajout commentaire lié au sujet|
| `/forum/id/response/id` | `GET` | `ForumController` | `responseDetail` | |  | commentaire lié au sujet|
| `/forum/id/response/id` | `DELETE` | `ForumController` | `responseDetailDelete` | |  | Suppresion d'un commentaire lié au sujet|
| `/forum/id/response/id` | `PUT/PATCH` | `ForumController` | `responseDetailUpdate` | |  | MAJ commentaire lié au sujet|
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/advert` | `GET` | `AdvertController` | `list` | |  | Liste des annonces |
| `/advert/add` | `GET` | `AdvertController` | `add` | |  | Ajout d'une annonces |
| `/advert/id` | `GET` | `AdvertController` | `detail` | |  | Annonce en detail |
| `/advert/id` | `DELETE` | `AdvertController` | `delete` | |  | Suppresion d'une annonce |
| `/advert/id` | `PUT/PATCH` | `AdvertController` | `update` | |  | Modifictaion d'une annonce |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/couchsurfing` | `GET` | `CouchsurfingController` | `list` | |  | Liste annonces lié au couchsurfing |
| `/couchsurfing/add` | `GET` | `CouchsurfingController` | `add` | |  | Ajout annonce lié au couchsurfing |
| `/couchsurfing/id` | `GET` | `CouchsurfingController` | `detail` | |  | Annonce couchsurfing en detail|
| `/couchsurfing/id` | `DELETE` | `CouchsurfingController` | `delete` | |  | supp. couchsurfing en detail|
| `/couchsurfing/id` | `PUT/PATCH` | `CouchsurfingController` | `update` | |  | MAj couchsurfing en detail|
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/post` | `GET` | `PostController` | `list` | |  | Liste des articles de blog |
| `/post/add` | `GET` | `PostController` | `add` | |  | Liste des sujets du post |
| `/post/id` | `GET` | `PostController` | `detail` | |  | Sujet particulier du post |
| `/post/id` | `DELETE` | `PostController` | `delete` | |  | Suppresion Sujet particulier du post |
| `/post/id` | `PUT/PATCH` | `PostController` | `update` | |  | Modification Sujet particulier du post |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/post/id/response` | `GET` | `PostController` | `responseList` | |  | Liste commentaires lié au sujet|
| `/post/id/response/add` | `GET` | `PostController` | `responseList` | |  | Ajout commentaire lié au sujet|
| `/post/id/response/id` | `GET` | `PostController` | `responseDetail` | |  | commentaire lié au sujet|
| `/post/id/response/id` | `DELETE` | `PostController` | `responseDetailDelete` | |  | Suppresion d'un commentaire lié au sujet|
| `/post/id/response/id` | `PUT/PATCH` | `PostController` | `responseDetailUpdate` | |  | MAJ commentaire lié au sujet|
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/picture` | `GET` | `pictureController` | `list` | |  | Liste des photos |
| `/picture/add` | `GET` | `pictureController` | `add` | |  | Ajout d'une photo |
| `/picture/id` | `GET` | `pictureController` | `detail` | |  | Visue sur une photo |
| `/picture/id` | `DELETE` | `pictureController` | `delete` | |  | Suppresion d'une photo |
| `/picture/id` | `PUT/PATCH` | `pictureController` | `update` | |  | Modification d'une photo |





### Back 

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/admin/login` | `GET` | `Admin\SecurityController` | `login` | Login Page |  | - |
| `/admin/login` | `GET` | `Admin\SecurityController` | `logout` | Logout |  | - |
| `/admin/` | `GET` | `Admin\MainController` | `home` | HomePage | HomePage | - |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/admin/country` | `GET` | `Admin\CountryController` | `list` | |  | Liste des pays |
| `/admin/country/add` | `GET` | `Admin\CountryController` | `add` | |  | Ajout d'un pays |
| `/admin/country/id` | `GET` | `Admin\CountryController` | `detail` | |  | Visue sur un pays |
| `/admin/country/id` | `DELETE` | `Admin\CountryController` | `delete` | |  | Suppresion d'un pays |
| `/admin/country/id` | `PUT/PATCH` | `Admin\CountryController` | `update` | |  | Modification d'un pays |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/admin/user` | `GET` | `Admin\UserController` | `list` | |  | Liste des utilisateurs/administrateurs en fonction du rôle |
| `/admin/user/add` | `GET` | `Admin\UserController` | `add` | |  | Ajout d'un utilisateur/administrateur en fonction du rôle |
| `/admin/user/id` | `GET` | `Admin\UserController` | `detail` | |  | Visue sur un utilisateur/administrateur en fonction du rôle |
| `/admin/user/id` | `DELETE` | `Admin\UserController` | `delete` | |  | Suppresion d'un utilisateur/administrateur en fonction du rôle |
| `/admin/user/id` | `PUT/PATCH` | `Admin\UserController` | `update` | |  | Modification d'un utilisateur/administrateur en fonction du rôle |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/admin/post` | `GET` | `Admin\PostController` | `list` | |  | Liste des articles par un admin |
| `/admin/post/add` | `GET` | `Admin\PostController` | `add` | |  | Ajout d'un article par un admin |
| `/admin/post/id` | `GET` | `Admin\PostController` | `detail` | |  | Visue sur un article par un admin |
| `/admin/post/id` | `DELETE` | `Admin\PostController` | `delete` | |  | Suppresion d'un article par un admin |
| `/admin/post/id` | `PUT/PATCH` | `Admin\PostController` | `update` | |  | Modification d'un article par un admin |
|--|--|--|--|--|--|--|
| `/admin/post/comment` | `GET` | `Admin\PostController` | `commentList` | |  | Liste des commentaires d'un article |
| `/admin/post/comment/add` | `GET` | `Admin\PostController` | `commentAdd` | |  | Ajout d'un commentaire d'un article |
| `/admin/post/id/comment/id` | `GET` | `Admin\PostController` | `commentDetail` | |  | Visue sur un commentaire d'un article |
| `/admin/post/id/comment/id` | `DELETE` | `Admin\PostController` | `commentDelete` | |  | Suppresion d'un commentaire d'un article |
| `/admin/post/id/comment/id` | `PUT/PATCH` | `Admin\PostController` | `commentUpdate` | |  | Modification d'un commentaire d'un article |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/admin/forum` | `GET` | `Admin\ForumController` | `list` | |  | Liste des sujet de forum |
| `/admin/forum/add` | `GET` | `Admin\ForumController` | `add` | |  | Ajout d'un sujet de forum |
| `/admin/forum/id` | `GET` | `Admin\ForumController` | `detail` | |  | Visue sur un sujet de forum |
| `/admin/forum/id` | `DELETE` | `Admin\ForumController` | `delete` | |  | Suppresion d'un sujet de forum |
| `/admin/forum/id` | `PUT/PATCH` | `Admin\ForumController` | `update` | |  | Modification d'un sujet de forum |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/admin/forum/response` | `GET` | `Admin\ForumController` | `responseList` | |  | Liste des réponses d'un sujet de forum |
| `/admin/forum/response/add` | `GET` | `Admin\ForumController` | `responseAdd` | |  | Ajout d'une réponse à un sujet du forum |
| `/admin/forum/id/respoonse/id` | `GET` | `Admin\ForumController` | `responseDetail` | |  | Visue sur une réponse à un sujet du forum |
| `/admin/forum/id/respoonse/id` | `DELETE` | `Admin\ForumController` | `responseDelete` | |  | Suppresion d'une réponse à un sujet du forum |
| `/admin/forum/id/respoonse/id` | `PUT/PATCH` | `Admin\ForumController` | `responseUpdate` | |  | Modification d'une réponse à un sujet du forum |
|--|--|--|--|--|--|--|
|--|--|--|--|--|--|--|
| `/admin/picture` | `GET` | `Admin\PictureController` | `list` | |  | Liste des photos |
| `/admin/picture/add` | `GET` | `Admin\PictureController` | `add` | |  | Ajout d'une photo |
| `/admin/picture/id` | `GET` | `Admin\PictureController` | `detail` | |  | Visue sur une photo |
| `/admin/picture/id` | `DELETE` | `Admin\PictureController` | `delete` | |  | Suppresion d'une photo |
| `/admin/picture/id` | `PUT/PATCH` | `Admin\PictureController` | `update` | |  | Modification d'une photo |

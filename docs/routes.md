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

| `/advert` | `GET` | `AdvertController` | `list` | |  | Liste des sujets du advert |
| `/advert/add` | `GET` | `AdvertController` | `add` | |  | Liste des sujets du advert |
| `/advert/id` | `GET` | `AdvertController` | `detail` | |  | Sujet particulier du advert |
| `/advert/id` | `DELETE` | `AdvertController` | `delete` | |  | Suppresion Sujet particulier du advert |
| `/advert/id` | `PUT/PATCH` | `AdvertController` | `update` | |  | Modifictaion Sujet particulier du advert |
| `/advert/id/response` | `GET` | `AdvertController` | `responseList` | |  | Liste commentaires lié au sujet|
| `/advert/id/response/add` | `GET` | `AdvertController` | `responseList` | |  | Ajout commentaire lié au sujet|
| `/advert/id/response/id` | `GET` | `AdvertController` | `responseDetail` | |  | commentaire lié au sujet|
| `/advert/id/response/id` | `DELETE` | `AdvertController` | `responseDetailDelete` | |  | Suppresion d'un commentaire lié au sujet|
| `/advert/id/response/id` | `PUT/PATCH` | `AdvertController` | `responseDetailUpdate` | |  | MAJ commentaire lié au sujet|
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

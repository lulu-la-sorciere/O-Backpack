# Routes

## Sprint 0

### Front 

| URL | Titre | Content | Comment |
|--|--|--|--|
| `Obackpack.fr` | Accueil | Intro, navigation,infos du site - 3derniers articles publiés - barre de recherche | accès aux differents menus du site  |
| `Obackpack/login` | Se Connecter | formulaire de connexion (login + mdp) |  | 
| `Obackpack/login/detail` | Profil | Détails du profil de la personne connectée |  | 
| `Obackpack/login/detail/mailbox` | Messagerie | Messagerie privée | Communication avec autres membres | 
| `Obackpack/other_profile` | Profil X | Détails du profil d'autres utilisateurs | -- |
| `Obackpack/register` | S'inscrire | formulaire d'inscription | champs : nom, prénom, pseudo, avatar, date naissance, mail, adresse postale, backpackeurs ou Couchsurfing, inscription newsletter, mot de passe |
|`Obackpack/location`| Destinations | Liste des destinations |--|
|`Obackpack/location/continent`| Continent|Liste des destinations fonction du continent |--|
|`Obackpack/location/continent/country`| Pays | Liste des destinations fonction du pays |--|
|`Obackpack/location/continent/country/date`| Date | Conseils destination visée en fonction de dates visées |--|
|`Obackpack/forum`| Forum | Messagerie selon différents sujets/questions et commentaires en fonction | Lieu d'échanges entre personnes enregistrées |
|`Obackpack/forum/subject`| Sujet | Sujet de Forum |  |
|`Obackpack/advert`| Annonces | Catégories d'annonces (couchsurfing ou materiel a ceder)| Annonces de matériel à céder  ou couchsurfing  |
|`Obackpack/advert/stuff`| Annonces | Annonces de matériel à céder |  |
|`Obackpack/advert/couchsurfing`| Annonces | Annonces de matériel à céder |  |
|`Obackpack/blog`| Blog | Presentation d'articles et galerie photos | bouton choix |
|`Obackpack/blog/post`| Articles | barre de recherche pour acceder a des articles en fonction de la destination +/- exemple d'articles à découvrir| 3 articles à decouvrir |
|`Obackpack/blog/picture`| Galerie | Présentation photos fonction du pays |  |
|`Obackpack/team`| Presentation de l'équipe | Présentation de l'équipe | -- |


### Back

| URL | Titre | Content | Comment |
|--|--|--|--|
| `Obackpack.fr/admin` | Accueil coté admin | Connexion (login+mdp) | connexion de l'admin |
| `Obackpack.fr/admin/` | Accueil coté admin | liens vers les pages pays/utilisateurs/articles |  |
| `Obackpack.fr/admin/` | Accueil coté Super admin | details des comptes admins | accessible seulement pour les super admin |
|--|--|--|--|
| `Obackpack.fr/admin/location` | Liste des destinations | liens vers le CRUD | |
| `Obackpack.fr/admin/location/add` | Ajout d'une destination | | |
| `Obackpack.fr/admin/location/update` | Mise à jour d'une destination | | |
| `Obackpack.fr/admin/location/delete` | Suppression d'une destination | | |
| `Obackpack.fr/admin/location/edit` | Details d'une destination | | |
|--|--|--|--|
|--|--|--|--|
| `Obackpack.fr/admin/user` | Liste des membres | liens vers CRUD | |
| `Obackpack.fr/admin/user/add` | Ajout d'un membre | | |
| `Obackpack.fr/admin/user/update` | Mise a jour d'un membre | | |
| `Obackpack.fr/admin/user/delete` | Supression d'un membre | | |
| `Obackpack.fr/admin/user/edit` | Details d'un membre | | |
|--|--|--|--|
|--|--|--|--|
| `Obackpack.fr/admin/post` | Liste des Articles | liens vers CRUD | |
| `Obackpack.fr/admin/post/add` | Ajout d'un Article | | |
| `Obackpack.fr/admin/post/update` | Mise a jour d'un Article | | +lien pour gerer les commentaires |
| `Obackpack.fr/admin/post/delete` | Supression d'un Article | | |
| `Obackpack.fr/admin/post/edit` | Details d'un Article | | |
|--|--|--|--|
|--|--|--|--|
| `Obackpack.fr/admin/forum` | Liste des sujets | liens vers CRUD | |
| `Obackpack.fr/admin/forum/add` | Ajout d'un sujet | | |
| `Obackpack.fr/admin/forum/update` | Mise a jour d'un sujet | | +lien pour gerer les commentaires |
| `Obackpack.fr/admin/forum/delete` | Supression d'un sujet | | |
| `Obackpack.fr/admin/forum/edit` | Details d'un sujet | | |


DROP DATABASE IF EXISTS API;

CREATE DATABASE API;

CREATE TABLE api.App_user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    level VARCHAR(7) NOT NULL
);

CREATE TABLE api.bars (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lieu varchar(255) NOT NULL,
  price float NOT NULL,
  date_creation date NOT NULL,
  description varchar(10000) NOT NULL,
  user VARCHAR(50) NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  adress VARCHAR(50) NOT NULL,
  zip_code int(7) NOT NULL,
  max_person int(4) NOT NULL,
  image VARCHAR(100) NOT NULL
);

CREATE TABLE api.boites_de_nuit (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lieu varchar(255) NOT NULL,
  price float NOT NULL,
  date_creation date NOT NULL,
  description varchar(10000) NOT NULL,
  user VARCHAR(50) NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  adress VARCHAR(50) NOT NULL,
  zip_code int(7) NOT NULL,
  max_person int(4) NOT NULL,
  image VARCHAR(100) NOT NULL
);

CREATE TABLE api.Location_salle (
	location_Id INT auto_increment NOT NULL,
	user_Id INT NOT NULL,
	bar_Id INT,
  bn_Id INT,
  price FLOAT  NOT NULL,
	location_Date DATETIME NOT NULL,
  person_nbr INT,
	CONSTRAINT Location_PK PRIMARY KEY (location_Id),
  CONSTRAINT Location_FK FOREIGN KEY (User_Id) REFERENCES App_user(id),
	CONSTRAINT Location_FK_1 FOREIGN KEY (bar_Id) REFERENCES bars(id),
  CONSTRAINT Location_FK_2 FOREIGN KEY (bn_Id) REFERENCES boites_de_nuit(id)
);

CREATE TABLE api.comments_bars (
  comment_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  comment_description varchar(2500) NOT NULL,
  reviews INT NOT NULL,
  user VARCHAR(50) NOT NULL,
  Bars_id INT NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  FOREIGN KEY (Bars_id) REFERENCES API.bars(id),
  date_creation date NOT NULL
);

CREATE TABLE api.comments_boites_de_nuit (
  comment_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  comment_description varchar(2500) NOT NULL,
  reviews INT NOT NULL,
  user VARCHAR(50) NOT NULL,
  boites_de_nuit_id INT NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  FOREIGN KEY (boites_de_nuit_id) REFERENCES API.boites_de_nuit(id),
  date_creation date NOT NULL
);


-- hachage du mot de passe : algorithme argon2
-- hachage du mot de passe : algorithme argon2
INSERT INTO `app_user` (`id`, `login`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@n-life.fr', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'admin'),
(2, 'Flora', 'flora@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$TVI1OWUzaUJmcFpxZjNQUg$5sE1BLZRAA6didrBiiQuGCnPBZqfNiJKhZQMT9+LZns', 'host'),
(3, 'Sandra', 'sandra@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host'),
(4, 'Eric', 'eric@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host'),
(5, 'Jonathan', 'Jonathan@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host'),
(6, 'Mathieu', 'Mathieu@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host'),
(7, 'Jean Arnaud ', 'Jean-Arnaud@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host'),
(8, 'Fred', 'Fred@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host'),
(9, 'Florent', 'Florent@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw', 'host');

INSERT INTO `bars` (`id`, `name`, `lieu`, `price`, `date_creation`, `description`, `user`, `adress`, `zip_code`, `max_person`, `image`) VALUES
(1, "Le Madam", "Paris", 1247, "2021-06-15", "Le Madam, situé à deux pas des Champs-Elysées, dans le 8ème arrondissement de Paris, est facilement accessible par le métro Franklin Roosevelt. Au cœur du Triangle d\'or, cette discothèque est la coqueluche des soirées parisiennes depuis longtemps...\r\n\r\nAu milieu de nombreuses salles de concerts mythiques de Paris, le Club rock de la capitale, le Madam, ouvre ses portes à l\'événementiel pour vos soirées et célébrations en semaine. Infrastructures retravaillées, sonorisation adaptée à tous types d\'événements et aménagement possible, le Madam vous offre toutes les possibilités de modulation envisagées, faisant de ce lieu mythique une belle adresse pour aller faire la fête ! Profitez d\'un mobilier confortable, de grandes banquettes en cuir, et d\'un bel espace de danse, qui rappelle les premiers temps du rock\"n\"roll dans la capitale : une ambiance survoltée, toute en néons colorés et en musiques endiablées !\r\n\r\nLe club le Madam peut accueillir jusqu\'à 400 personnes et ouvre ses portes jusqu\'à 5h pour que vous puissiez faire la fête jusqu\'au bout de la nuit ! Et pour une soirée personnalisée, vous pouvez faire appel à un traiteur extérieur et diffuser votre propre musique ! Idéal pour une soirée d\'entreprise ou une soirée étudiante ! Faites votre réservation, et découvrez le meilleur de Paris...", "Flora", "128 Rue de la Boétie", 75008, 400, "1623780190.jpg"),
(2, "Juvia", "Paris", 1250, "2021-06-15", "Le Juvia est un restaurant du 8 ème arrondissement de Paris, situé au cœur du quartier Saint Philippe du Roule, que la ligne de métro 9 dessert. Ouvert du lundi au samedi inclus, le Juvia vous réserve un accueil chaleureux dans son cocon urbain pour vous faire passer un moment inoubliable dans son atmosphère design et authentique.\r\n\r\nC’est l’architecte d’intérieur Bettina Irlandini qui a pensé et orchestré l’aménagement du Juvia. Ce restaurant et sa carte internationale se divise en trois espaces distincts, différenciés par une couleur murale différente. D’une part, vous trouverez l’espace de restauration, entre bois et végétation où vous dégusterez une cuisine moderne, originale et créative, sur un sol en mosaïques qui rappelle l’esprit campagnard chic du restaurant et des lustres en rotin qui viennent tamiser l’ambiance. D’autre part, vous découvrirez le speakeasy, un espace dédié à un salon privé pour plus d’intimité où vous pourrez commander des cocktails travaillés et audacieux. Enfin, vous ne pourrez pas louper la terrasse animée du Juvia, qui se cache de la rue par de la végétation qui rappelle l’intérieur où vous pourrez convier vos partenaires. Cette terrasse, tout aussi agréable en été qu’en hiver, est préservée et meublée de tables en bois irrégulier, qui donne un charme supplémentaire à l’établissement.\r\n\r\nLe Juvia est donc un restaurant disponible à la location, ouvert du lundi au samedi inclus. Son agencement étant créé en deux espaces distincts au choix à l’intérieur, l’espace est modulable et le restaurant peut subvenir à tous vos besoins en matière d’aménagement. Le Juvia accueillera donc avec plaisir jusqu’à 100 personnes pour un repas d’affaires ou entre collègues, de même que pour un cocktail plus festif ou alors dans une ambiance plus sérieuse dans le cadre d’un séminaire. Ce restaurant vous apporte le calme et le confort nécessaire pour que vous passiez un moment agréable et vous propose un service de qualité. Pour plus d\'informations, vous pouvez contacter nos conseillers Privateaser qui vont guideront pour votre réservation.", "Sandra", "105 Rue du Faubourg Saint-Honoré", 75008, 100, "1623780364.jpg"),
(3, "Le Freemousse", "Paris", 1372, "2021-06-15", "Localisé dans le 18 ème arrondissement de Paris, dans le quartier de Montmartre, Le Freemousse Bar est un bar à concept idéal pour tous vos évènements.\r\n\r\nIci, le principe est simple : il suffit de créditer une carte spéciale, vous obtenez libre service aux tireuses à bière et à vin disséminées dans tout le bar. Le Freemousse Bar vous met à disposition 12 bières différentes (belges et des 4 coins du monde, sans oublier nos belles artisanales Françaises) et quelques vins. C\'est l\'endroit idéal pour passer un moment agréable aux côtés de vos convives autour des tireuses en vous servant vous-même votre boisson !\r\n\r\nLe bar vous met également à disposition 3 écrans de projection sur lesquels vous pouvez brancher vos ordinateurs ou diffuser la télévision. Et si l\'envie vous prend, vous pourrez même faire un karaoké sur demande : les micros sont disponibles pour vous laisser chanter vos chansons préférées. Échauffez-vous la voix, finissez votre bière, et lancez-vous !\r\nAu delà de ça, nouveauté chez le Freemousse bar : \'Le Tuk-Tuk tour\', disponible pour toute réservation sur devis ! Découvrez l\'univers de ce bar en vidéo pour vous plonger dans l\'ambiance via ce lien.\r\n\r\nLe Freemousse Bar vous accueille tous les jours de 17h à 2h et vous avez la possibilité de privatiser l\'établissement en entier.", "Eric", "76 Rue Marcadet", 75018, 100, "1623780690.jpg"),
(4, "The French Flair", "Paris", 1515, "2021-06-15", "Localisé dans les alentours du quartier de Pigalle dans le 9 ème arrondissement de Paris près de la Place de Clichy, the French Flair est un espace de location très convivial qui fait beaucoup parler de lui et qui vous ouvre ses portes pour vos événements d\'entreprise. Vous pourrez vous y rendre via les lignes 2 et 13 à la station Place de Clichy.\r\n\r\nThe French Flair vous accueille donc dans un cadre très chaleureux et convivial dans lequel vous pourrez recevoir vos collaborateurs à l’occasion d’un cocktail professionnel ou tout autre événement professionnel ! Vous aurez à votre disposition tous les équipements dont vous pourriez avoir besoin, à savoir un matériel de projection et de sonorisation vous permettant de diffuser votre musique, une connexion wifi et même un billard ! Si vous souhaitez vous restaurer, vous aurez la possibilité de partager de délicieuses planches.\r\n\r\nD\'une capacité totale de 250 personnes, the French Flair vous accueille tous les jours entre 17h et 2h. Vous pourrez ainsi organiser un événement unique qui laissera un souvenir mémorable à vos collaborateurs. N’hésitez donc pas et réservez vite sur Privateaser !", "Mathieu", "75 Boulevard de Clichy", 75009, 250, "1623781115.jpg"),
(5, " Le Marilyn", "Paris", 1852, "2021-06-15", "Venez découvrir Le Marilyn, ce bar atypique de Paris. Situé rue d’Oberkampf, dans le 11 ème arrondissement, l’établissement est devenu une adresse incontournable. Si vous souhaitez vous y rendre, plusieurs possibilités s’offrent à vous : vous pouvez emprunter la ligne 2 jusqu’à la station Ménilmontant, la ligne 3 jusqu’à Parmentier ou encore les lignes 5 et 9 jusqu’à Oberkampf.\r\n\r\nSi vous recherchez un lieu qui sort de l’ordinaire pour votre événement, Le Marilyn est fait pour vous. Ce petit établissement, convivial et intimiste, conviendra à vos événements professionnels à Paris. Les salles sont remplies de références à la star hollywoodienne : l’inscription “poupoupidou” sur un mur à l’entrée, des M comme pieds de tables, deux photos de l’actrice derrière les bouteilles au bar et plein d’autres choses encore que nous vous laissons découvrir. Vous pourrez louer les deux salles de l’établissement qui sont modulables selon vos envies. L’établissement peut accueillir jusqu’à 120 personnes au total. Toute l’équipe sera au petit soin afin que votre soirée se déroule au mieux.\r\n\r\nLe Marilyn vous fera vivre de nouvelles expériences à l’occasion d’un cocktail pro. L’établissement peut être réservé du lundi au dimanche de 17h à 2h du matin. Si vous voulez impressionner vos collaborateurs, n’hésitez plus et réserver sur Privateaser !", "Jonathan", "122 rue Oberkampf", 75011, 120, "1623781467.jpg");

INSERT INTO `boites_de_nuit` (`id`, `name`, `lieu`, `price`, `date_creation`, `description`, `user`, `adress`, `zip_code`, `max_person`, `image`) VALUES
(1, "La Poudrière", "Paris", 3905, "2021-06-15", "Situé rue Servan, dans le 11 ème arrondissement de Paris, La Poudrière du 11e semble propice à tous types d’évènements d’entreprise. Selon vos attentes et vos demandes spécifiques, le personnel de cet établissement met en œuvre ses compétences afin de vous satisfaire. Pour découvrir cette magnifique adresse, il suffit de prendre les lignes 2 et 3 du métro jusqu’à la station Père Lachaise.\r\n\r\nRépartie sur deux étages, La Poudrière du 11e baigne dans une atmosphère inspirée de la Belle Époque. Si vous voulez y organiser une réception exceptionnelle, misez sur les deux salles de location proposées par cet établissement du 11 ème arrondissement. Avec une capacité d’accueil allant aux alentours de 100 personnes, ces espaces sont équipés d’une connexion Wi-Fi et de micros. Pour combler vos besoins événementiels, vous profiterez également d’une scène et d’un vestiaire. Côté décor, du mobilier d’époque, des murs en pierre et de superbes vitraux y offrent un cadre enchanteur.\r\n\r\nFermée le lundi et le dimanche, La Poudrière du 11e vous ouvre ses portes tous les mardis au samedi, de 18h à 2h du matin. Que ce soit pour des réservations ou pour des informations supplémentaires, le personnel de ce véritable lieu de vie vous accueille avec une hospitalité soignée.", "Mathieu", "41 Rue Servan", 75011, 150, "1623780926.jpg"),
(2, "CLUB 19", "Val-d\'Oise", 2560, "2021-06-15", "Une boîte de nuit à Baillet-en-France réputée pour ces soirées a thème. Cette boîte de nuit propose de la musique généraliste.", "Jonathan", "19 Avenue du Bosquet", 95560, 200, "1623782419.jpg"),
(3, "Le Duplex", "Paris", 1083, "2021-06-15", "Discothèque à la mode proposant des soirées à thème et étudiantes dans 3 salles, sur des musiques actuelles.", "Flora", "2 avenue de la luge", 75009, 100, "1623783458.jpg"),
(4, "Le Globo", "Paris", 1903, "2021-06-15", "Club et salle de concerts à la musique variée dans un cadre d\'inspiration ibérique, avec affiches de corrida.", "Flora", "8 Boulevard de Strasbourg", 75010, 200, "1623783637.jpg");


INSERT INTO `comments_bars` (`comment_id`, `comment_description`, `reviews`, `user`, `Bars_id`, `date_creation`) VALUES
(1, "Super j\'ai bien aimé ce bars ! ", 5, "Jonathan", 1, "2021-06-15"),
(2, "Un bar surprenant ! ", 4, "Jonathan", 2, "2021-06-15"),
(3, "Vraiment déçu on m\'avait pourtant dit que c\'était l\'un des meilleurs dans le milieu...", 2, "Jonathan", 3, "2021-06-15"),
(4, "Franchement woah !", 4, "Jonathan", 4, "2021-06-15"),
(5, "Poupoupidou ! superbe ambiance !", 4, "Jonathan", 5, "2021-06-15"),
(6, "J\'ai trouvé ça amusant ", 5, "Flora", 2, "2021-06-15"),
(7, "J\'aime marilyn mais pour le coup il y en avait trop", 4, "Flora", 5, "2021-06-15"),
(8, "décu", 1, "Flora", 4, "2021-06-15");

INSERT INTO `comments_boites_de_nuit` (`comment_id`, `comment_description`, `reviews`, `user`, `boites_de_nuit_id`, `date_creation`) VALUES
(1, "Super petite boite de nuit ! idéal pour les petites soirée entre potes", 4, "Jonathan", 1, "2021-06-15"),
(2, "Super ", 5, "Jonathan", 2, "2021-06-15"),
(3, "j\'ai adoré l\'ambiance", 4, "Flora", 2, "2021-06-15"),
(4, ":)", 4, "Flora", 3, "2021-06-15"),
(5, "pas foufou", 2, "Flora", 4, "2021-06-15");

INSERT INTO `location_salle` (`location_Id`, `user_Id`, `bar_Id`, `bn_Id`, `price`, `location_Date`, `person_nbr`) VALUES
(1, 2, 2, NULL, 1250, '2021-06-15 00:00:00', 50),
(2, 2, 3, NULL, 1372, '2021-06-15 00:00:00', 25),
(3, 2, NULL, 1, 3905, '2021-06-15 00:00:00', 50);

CREATE TABLE `calendar` (
`cdate` date NOT NULL,
PRIMARY KEY (`cdate`)
) ;

CREATE TABLE ints (i INTEGER);
INSERT INTO ints VALUES (0), (1), (2), (3), (4), (5), (6), (7), (8), (9);

INSERT INTO calendar (cdate)
SELECT cal.date as cdate
FROM (
SELECT '2005-01-01' + INTERVAL d.i*1000 + c.i* 100 + a.i * 10 + b.i DAY as date
FROM ints a JOIN ints b JOIN ints c JOIN ints d
ORDER BY d.i*1000 + c.i*100 + a.i*10 + b.i) cal
WHERE cal.date BETWEEN '2005-01-01' AND '2030-12-31' 

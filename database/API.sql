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
(1, "Le Madam", "Paris", 1247, "2021-06-15", "Le Madam, situ?? ?? deux pas des Champs-Elys??es, dans le 8??me arrondissement de Paris, est facilement accessible par le m??tro Franklin Roosevelt. Au c??ur du Triangle d\'or, cette discoth??que est la coqueluche des soir??es parisiennes depuis longtemps...\r\n\r\nAu milieu de nombreuses salles de concerts mythiques de Paris, le Club rock de la capitale, le Madam, ouvre ses portes ?? l\'??v??nementiel pour vos soir??es et c??l??brations en semaine. Infrastructures retravaill??es, sonorisation adapt??e ?? tous types d\'??v??nements et am??nagement possible, le Madam vous offre toutes les possibilit??s de modulation envisag??es, faisant de ce lieu mythique une belle adresse pour aller faire la f??te ! Profitez d\'un mobilier confortable, de grandes banquettes en cuir, et d\'un bel espace de danse, qui rappelle les premiers temps du rock\"n\"roll dans la capitale : une ambiance survolt??e, toute en n??ons color??s et en musiques endiabl??es !\r\n\r\nLe club le Madam peut accueillir jusqu\'?? 400 personnes et ouvre ses portes jusqu\'?? 5h pour que vous puissiez faire la f??te jusqu\'au bout de la nuit ! Et pour une soir??e personnalis??e, vous pouvez faire appel ?? un traiteur ext??rieur et diffuser votre propre musique ! Id??al pour une soir??e d\'entreprise ou une soir??e ??tudiante ! Faites votre r??servation, et d??couvrez le meilleur de Paris...", "Flora", "128 Rue de la Bo??tie", 75008, 400, "1623780190.jpg"),
(2, "Juvia", "Paris", 1250, "2021-06-15", "Le Juvia est un restaurant du 8 ??me arrondissement de Paris, situ?? au c??ur du quartier Saint Philippe du Roule, que la ligne de m??tro 9 dessert. Ouvert du lundi au samedi inclus, le Juvia vous r??serve un accueil chaleureux dans son cocon urbain pour vous faire passer un moment inoubliable dans son atmosph??re design et authentique.\r\n\r\nC???est l???architecte d???int??rieur Bettina Irlandini qui a pens?? et orchestr?? l???am??nagement du Juvia. Ce restaurant et sa carte internationale se divise en trois espaces distincts, diff??renci??s par une couleur murale diff??rente. D???une part, vous trouverez l???espace de restauration, entre bois et v??g??tation o?? vous d??gusterez une cuisine moderne, originale et cr??ative, sur un sol en mosa??ques qui rappelle l???esprit campagnard chic du restaurant et des lustres en rotin qui viennent tamiser l???ambiance. D???autre part, vous d??couvrirez le speakeasy, un espace d??di?? ?? un salon priv?? pour plus d???intimit?? o?? vous pourrez commander des cocktails travaill??s et audacieux. Enfin, vous ne pourrez pas louper la terrasse anim??e du Juvia, qui se cache de la rue par de la v??g??tation qui rappelle l???int??rieur o?? vous pourrez convier vos partenaires. Cette terrasse, tout aussi agr??able en ??t?? qu???en hiver, est pr??serv??e et meubl??e de tables en bois irr??gulier, qui donne un charme suppl??mentaire ?? l?????tablissement.\r\n\r\nLe Juvia est donc un restaurant disponible ?? la location, ouvert du lundi au samedi inclus. Son agencement ??tant cr???? en deux espaces distincts au choix ?? l???int??rieur, l???espace est modulable et le restaurant peut subvenir ?? tous vos besoins en mati??re d???am??nagement. Le Juvia accueillera donc avec plaisir jusqu????? 100 personnes pour un repas d???affaires ou entre coll??gues, de m??me que pour un cocktail plus festif ou alors dans une ambiance plus s??rieuse dans le cadre d???un s??minaire. Ce restaurant vous apporte le calme et le confort n??cessaire pour que vous passiez un moment agr??able et vous propose un service de qualit??. Pour plus d\'informations, vous pouvez contacter nos conseillers Privateaser qui vont guideront pour votre r??servation.", "Sandra", "105 Rue du Faubourg Saint-Honor??", 75008, 100, "1623780364.jpg"),
(3, "Le Freemousse", "Paris", 1372, "2021-06-15", "Localis?? dans le 18 ??me arrondissement de Paris, dans le quartier de Montmartre, Le Freemousse Bar est un bar ?? concept id??al pour tous vos ??v??nements.\r\n\r\nIci, le principe est simple : il suffit de cr??diter une carte sp??ciale, vous obtenez libre service aux tireuses ?? bi??re et ?? vin diss??min??es dans tout le bar. Le Freemousse Bar vous met ?? disposition 12 bi??res diff??rentes (belges et des 4 coins du monde, sans oublier nos belles artisanales Fran??aises) et quelques vins. C\'est l\'endroit id??al pour passer un moment agr??able aux c??t??s de vos convives autour des tireuses en vous servant vous-m??me votre boisson !\r\n\r\nLe bar vous met ??galement ?? disposition 3 ??crans de projection sur lesquels vous pouvez brancher vos ordinateurs ou diffuser la t??l??vision. Et si l\'envie vous prend, vous pourrez m??me faire un karaok?? sur demande : les micros sont disponibles pour vous laisser chanter vos chansons pr??f??r??es. ??chauffez-vous la voix, finissez votre bi??re, et lancez-vous !\r\nAu del?? de ??a, nouveaut?? chez le Freemousse bar : \'Le Tuk-Tuk tour\', disponible pour toute r??servation sur devis ! D??couvrez l\'univers de ce bar en vid??o pour vous plonger dans l\'ambiance via ce lien.\r\n\r\nLe Freemousse Bar vous accueille tous les jours de 17h ?? 2h et vous avez la possibilit?? de privatiser l\'??tablissement en entier.", "Eric", "76 Rue Marcadet", 75018, 100, "1623780690.jpg"),
(4, "The French Flair", "Paris", 1515, "2021-06-15", "Localis?? dans les alentours du quartier de Pigalle dans le 9 ??me arrondissement de Paris pr??s de la Place de Clichy, the French Flair est un espace de location tr??s convivial qui fait beaucoup parler de lui et qui vous ouvre ses portes pour vos ??v??nements d\'entreprise. Vous pourrez vous y rendre via les lignes 2 et 13 ?? la station Place de Clichy.\r\n\r\nThe French Flair vous accueille donc dans un cadre tr??s chaleureux et convivial dans lequel vous pourrez recevoir vos collaborateurs ?? l???occasion d???un cocktail professionnel ou tout autre ??v??nement professionnel ! Vous aurez ?? votre disposition tous les ??quipements dont vous pourriez avoir besoin, ?? savoir un mat??riel de projection et de sonorisation vous permettant de diffuser votre musique, une connexion wifi et m??me un billard ! Si vous souhaitez vous restaurer, vous aurez la possibilit?? de partager de d??licieuses planches.\r\n\r\nD\'une capacit?? totale de 250 personnes, the French Flair vous accueille tous les jours entre 17h et 2h. Vous pourrez ainsi organiser un ??v??nement unique qui laissera un souvenir m??morable ?? vos collaborateurs. N???h??sitez donc pas et r??servez vite sur Privateaser !", "Mathieu", "75 Boulevard de Clichy", 75009, 250, "1623781115.jpg"),
(5, " Le Marilyn", "Paris", 1852, "2021-06-15", "Venez d??couvrir Le Marilyn, ce bar atypique de Paris. Situ?? rue d???Oberkampf, dans le 11 ??me arrondissement, l?????tablissement est devenu une adresse incontournable. Si vous souhaitez vous y rendre, plusieurs possibilit??s s???offrent ?? vous : vous pouvez emprunter la ligne 2 jusqu????? la station M??nilmontant, la ligne 3 jusqu????? Parmentier ou encore les lignes 5 et 9 jusqu????? Oberkampf.\r\n\r\nSi vous recherchez un lieu qui sort de l???ordinaire pour votre ??v??nement, Le Marilyn est fait pour vous. Ce petit ??tablissement, convivial et intimiste, conviendra ?? vos ??v??nements professionnels ?? Paris. Les salles sont remplies de r??f??rences ?? la star hollywoodienne : l???inscription ???poupoupidou??? sur un mur ?? l???entr??e, des M comme pieds de tables, deux photos de l???actrice derri??re les bouteilles au bar et plein d???autres choses encore que nous vous laissons d??couvrir. Vous pourrez louer les deux salles de l?????tablissement qui sont modulables selon vos envies. L?????tablissement peut accueillir jusqu????? 120 personnes au total. Toute l?????quipe sera au petit soin afin que votre soir??e se d??roule au mieux.\r\n\r\nLe Marilyn vous fera vivre de nouvelles exp??riences ?? l???occasion d???un cocktail pro. L?????tablissement peut ??tre r??serv?? du lundi au dimanche de 17h ?? 2h du matin. Si vous voulez impressionner vos collaborateurs, n???h??sitez plus et r??server sur Privateaser !", "Jonathan", "122 rue Oberkampf", 75011, 120, "1623781467.jpg");

INSERT INTO `boites_de_nuit` (`id`, `name`, `lieu`, `price`, `date_creation`, `description`, `user`, `adress`, `zip_code`, `max_person`, `image`) VALUES
(1, "La Poudri??re", "Paris", 3905, "2021-06-15", "Situ?? rue Servan, dans le 11 ??me arrondissement de Paris, La Poudri??re du 11e semble propice ?? tous types d?????v??nements d???entreprise. Selon vos attentes et vos demandes sp??cifiques, le personnel de cet ??tablissement met en ??uvre ses comp??tences afin de vous satisfaire. Pour d??couvrir cette magnifique adresse, il suffit de prendre les lignes 2 et 3 du m??tro jusqu????? la station P??re Lachaise.\r\n\r\nR??partie sur deux ??tages, La Poudri??re du 11e baigne dans une atmosph??re inspir??e de la Belle ??poque. Si vous voulez y organiser une r??ception exceptionnelle, misez sur les deux salles de location propos??es par cet ??tablissement du 11 ??me arrondissement. Avec une capacit?? d???accueil allant aux alentours de 100 personnes, ces espaces sont ??quip??s d???une connexion Wi-Fi et de micros. Pour combler vos besoins ??v??nementiels, vous profiterez ??galement d???une sc??ne et d???un vestiaire. C??t?? d??cor, du mobilier d?????poque, des murs en pierre et de superbes vitraux y offrent un cadre enchanteur.\r\n\r\nFerm??e le lundi et le dimanche, La Poudri??re du 11e vous ouvre ses portes tous les mardis au samedi, de 18h ?? 2h du matin. Que ce soit pour des r??servations ou pour des informations suppl??mentaires, le personnel de ce v??ritable lieu de vie vous accueille avec une hospitalit?? soign??e.", "Mathieu", "41 Rue Servan", 75011, 150, "1623780926.jpg"),
(2, "CLUB 19", "Val-d\'Oise", 2560, "2021-06-15", "Une bo??te de nuit ?? Baillet-en-France r??put??e pour ces soir??es a th??me. Cette bo??te de nuit propose de la musique g??n??raliste.", "Jonathan", "19 Avenue du Bosquet", 95560, 200, "1623782419.jpg"),
(3, "Le Duplex", "Paris", 1083, "2021-06-15", "Discoth??que ?? la mode proposant des soir??es ?? th??me et ??tudiantes dans 3 salles, sur des musiques actuelles.", "Flora", "2 avenue de la luge", 75009, 100, "1623783458.jpg"),
(4, "Le Globo", "Paris", 1903, "2021-06-15", "Club et salle de concerts ?? la musique vari??e dans un cadre d\'inspiration ib??rique, avec affiches de corrida.", "Flora", "8 Boulevard de Strasbourg", 75010, 200, "1623783637.jpg");


INSERT INTO `comments_bars` (`comment_id`, `comment_description`, `reviews`, `user`, `Bars_id`, `date_creation`) VALUES
(1, "Super j\'ai bien aim?? ce bars ! ", 5, "Jonathan", 1, "2021-06-15"),
(2, "Un bar surprenant ! ", 4, "Jonathan", 2, "2021-06-15"),
(3, "Vraiment d????u on m\'avait pourtant dit que c\'??tait l\'un des meilleurs dans le milieu...", 2, "Jonathan", 3, "2021-06-15"),
(4, "Franchement woah !", 4, "Jonathan", 4, "2021-06-15"),
(5, "Poupoupidou ! superbe ambiance !", 4, "Jonathan", 5, "2021-06-15"),
(6, "J\'ai trouv?? ??a amusant ", 5, "Flora", 2, "2021-06-15"),
(7, "J\'aime marilyn mais pour le coup il y en avait trop", 4, "Flora", 5, "2021-06-15"),
(8, "d??cu", 1, "Flora", 4, "2021-06-15");

INSERT INTO `comments_boites_de_nuit` (`comment_id`, `comment_description`, `reviews`, `user`, `boites_de_nuit_id`, `date_creation`) VALUES
(1, "Super petite boite de nuit ! id??al pour les petites soir??e entre potes", 4, "Jonathan", 1, "2021-06-15"),
(2, "Super ", 5, "Jonathan", 2, "2021-06-15"),
(3, "j\'ai ador?? l\'ambiance", 4, "Flora", 2, "2021-06-15"),
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

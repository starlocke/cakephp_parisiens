## README ##

This is an implementation of the "Parisiens Problem".

In its limited demo lifetime, it will be accessible at http://paris.popculturelab.ca/

**Reponse Generator:** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

This probably beats trying to explain the POST format, for the
purposes of having a demo.

- http://paris.popculturelab.ca/generator

**Survey Results:** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

NosQuestions, VosRéponses Inc

- http://paris.popculturelab.ca/survey_nqvrs/report
- http://paris.popculturelab.ca/survey_nqvrs/report.json

ParisMonAmi Inc

- http://paris.popculturelab.ca/survey_pmas/report
- http://paris.popculturelab.ca/survey_pmas/report.json

SondageMieux Inc

- http://paris.popculturelab.ca/survey_sms/report
- http://paris.popculturelab.ca/survey_sms/report.json

**Survey CRUD index pages:** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

- http://paris.popculturelab.ca/survey_nqvrs/index
- http://paris.popculturelab.ca/survey_nqvrs/index.json
- http://paris.popculturelab.ca/survey_pmas/index
- http://paris.popculturelab.ca/survey_pmas/index.json
- http://paris.popculturelab.ca/survey_sms/index
- http://paris.popculturelab.ca/survey_sms/index.json

### Dev & Build & Environment ###

#### Requirements ####

- Ubuntu 12.04
- CakePHP 2.3.5+
  - (optionally) postgres_array_columns patch, for unit testing
- Postgres 9.x
  - (optionally) UUID user-contirbuted functions
- Apache 2.x
- PHP 5.x
- git

#### Source ####

- https://www.github.com/starlocke/cakephp
  (**branch:** *postgres_array_columns*)
- https://www.github.com/starlocke/cakephp_parisiens

#### JSON-ness & Implementation Details ####

Basically, simply accessing most URLS with a .json extension will result in
some form of JSON feedback.

The requirement was for JSON responses only.  The server currently only
takes standard HTTP-POST formatted requests.

REST-fulness is achieved using URL-verbs instead of HTTP verbs, for example:

- /controller/add
- /controller/edit
- /controller/view
- /controller/delete

#### Database Design & Architecture ####

A billion records? No problem. The design is decentralized. Pick your flavorite
database High-Availability + Failover solution and the schema should be able
to cope quite easily.

UUIDs make this possible. They guarantee that duplicate records won't ever
be inserted, and scale-up through the use of a multi-master distributed
model. Some nodes can go offline for whatever period of time and then
come back with new data to add to the pool of knowledge.

__Examples:__

**Master + Hot Standby** A cluster of slaves should make getting the report
statistics easily scaleable, as well as any get-index, get-view actions.
Would require scaling-up its write IOPS to expand capacity.

**Multi-master, Distributed** Similar to above, but likely adds a main
"conductor" server to round-robin queries and compile aggregate results.
Each individual master has a fully independent database. They can
individually send the results to whoever wants to know "the full story".
One drawback is that the "full dataset" is only available when every
single node is online. Would require adding more nodes to expand
capacity and/or upgrading node IOPS.

*Depending on what balance of data integrity VS write performance is required,
the system can be either*:

- *Extremely fast in READ performance, rock solid data integrity,
  straight-forward backup and restore.*
- *Extremely fast in WRITE performance, eventual consistency, advanced
  backup and restore strategies needed.*

## Les Amicables ##

*The 1800's were a dark and unfortunate time for the French.  Today, they have
modernized, advanced socialism to an art, and look forward to creating a
bright future.  The circles of leadership in Paris are now conducting an
international research campaign to see what the world thinks of Parisians.
Did they manage to escape flip their "Les Misérables" image into a positive
"Les Amicables" status?  Let's find out!*

### Goals ###

Le principe : démontrer ton savoir-faire (script de build, documentation, etc..).

Il n'est pas nécessaire de FINIR le projet, juste d'en faire suffisament pour nous donner une bonne idée de ce que tu sais faire.

### Scenario ###

L'association française de réputation des parisiens émigrés dans le
monde a besoin de statistiques sur la réputation de ses membres.

Afin de pouvoir lancer sa campagne de communication 'Un parisien, c'est
bien' au budget pantagruellique, vous êtes mandatés pour definir une API
REST exposant l'ensemble des sondages effectués à travers le monde.

Cette API permet à différentes applications de créer une interface pour
tout ces questionnaires et de renvoyer les réponses de chaque
participant pour que vous puissiez les stocker.

Il vous faudra donc modéliser l'ensemble des questionnaires dont les
templates sont joints dans les fichier attachés (*.txt) dans le système
de gestion de donnée de votre choix, avec les language, outil et/ou
framework de votre choix, et les exposer au travers de cette API pour
consultation et modification. Vous n'aurez pas besoin de dessiner
d'interface ou d'afficher autre chose que des réponses HTTP (JSON).

En bonus, vous pourrez proposer une architecture et/ou un outil qui
permettrai de connaître en temps réel, les résultats du sondage, et de
faire un 'scoring' de la réputation ainsi obtenue en fonction d'une
ponderation en point de chaque réponse et de l'importance de chaque
question. Cette architecture devra être pensée et dimensionner jusqu'à
pouvoir atteindre plus de 1 milliard de répondant dans le monde.

### "NQVR" Survey ###

Template de Questionnaire pour l'association française de réputation des parisiens émigrés dans le monde

Copyright NosQuestions, VosRéponses Inc.

Q1 : Connaissez-vous des français

- oui
- non

Q2 : [s'affiche si Q1 répondu]
Connaissez-vous des français résidant à Paris ?

- oui
- non

Q3 : [s'affiche si Q2 répondu]
Combien de parisiens connaissez-vous ?

- de 1 à 5
- de 6 à 10
- de 11 à 50
- plus de 50

Q4 : [s'affiche si Q3 répondu]
Sur tous les parisiens que vous connaissez, pour les X [=20% de la réponse Q3] personnes les plus amicales, notez chaque de 1 à 5 selon votre appréciation :

- 1 = très amical, fait partie de ma famille
- 2 = amical
- 3 = neutre
- 4 = assez inamical
- 5 = odieux la plupart du temps

Q5 : [s'affiche si Q3 répondu]
Sur tous les autres parisiens que vous connaissez, notez chaque de 1 à 5 selon votre appréciation :

- 1 = très amicaux, font partie de ma famille
- 2 = amicaux
- 3 = neutres
- 4 = assez inamicaux
- 5 = odieux la plupart du temps

Q6 : Selon votre perception, notez de 1 à 5 votre appréciation de la réputation des parisiens (en général) :

- 1 = parmi les gens les plus accueillant de la planète
- 2 = des gens accueillants
- 3 = indifférent
- 4 = ne les fréquenterai que si j'y étais obligé
- 5 = parmi les gens les moins fréquentables dont j'ai entendu parler


### "PMA" Survey ###


Template de Questionnaire pour l'association française de réputation des parisiens émigrés dans le monde

Copyright ParisMonAmi Inc.

Q1 : Combien de parisiens avez-vous dans vos connaissances ?

- [ chiffre à saisir ]

Q2 : Combien de parisiens considérez vous comme plus que de simples connaissance

- [ chiffre à saisir ]

Q3 : Selon vos connaissances, notez votre appréciation des parisiens
[échelle de 1 à 5 avec slider, chaque step fait passer un smiley triste (1) vers un smiley qui souri (5)]

- respect des autres
- ponctualité
- propreté
- politesse
- acueillant
- indifférent
- français

Q4 : Adopteriez vous un parisiens comme ami ?

- oui
- non


### "SM" Survey ###

Template de Questionnaire pour l'association française de réputation des parisiens émigrés dans le monde

Copyright SondageMieux Inc.

Q1 : Dans le camembert graphique suivant, saisissez la proportion de chaque qualité que vous associez à un parisien

- sympathique
[ pourcentage à saisir, par défaut = 25% ]
- joyeux
[ pourcentage à saisir, par défaut = 25% ]
- chaleureux
[ pourcentage à saisir, par défaut = 25% ]
- généreux

Q2 : Dans le camembert graphique suivant, saisissez la proportion de chaque défaut que vous associez à un parisien

- bavard
[ pourcentage à saisir, par défaut = 25% ]
- ennuyeux
[ pourcentage à saisir, par défaut = 25% ]
- stressé
[ pourcentage à saisir, par défaut = 25% ]
- prétentieux

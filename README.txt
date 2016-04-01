README

Explication par fonction:

I- Student (fichier : user_fonction)

- add_student : Avec un readline on recupere l'entree de l'utilisateur qu on place dans un tableau avec les clefs correspondant aux
infos tels que login ou name puis on place ce tableau dans la collection.

- del_student : On trouve le tableau ou le login correspond a ce qu ' a mis l utilisateur en 2 eme arguement puis on supprime 
le tableau avec la fonction $collection->remove .

-update_student : On trouve le tableau ou le login correspond a ce qu ' a mis l utilisateur en 2 eme arguement puis avec un readline
on recupere l'information que l'utilisateur veut changer qui doit etre identique a une clef du tableau et enfin on modifie le tableau 
avec la fonction $collection->update .

II- Movies (fichier : movie_fonction - showMovie)

-movies_storing : On parse le fichier csv pour avoir un tableau a 2 dimensions dans la premiere dimension il y a le film en lui-meme et dans 
la seconde dimension il y a ces information. Puis toutes les informations sont places dans un tableau grace a un foreach et enfin on le place
dans la collection (le processus continue jusqu'a ce qu'il y ait pplus de film).

-show_movies : Le fichier verifie l argument placer en premier qui le dirige vers la fonction approprié , afin d'avoir les information du tableau imbriqué dans un tableau j'utilise 2 foreach puis je les affiche , pour les tableaux j utilise la fonction implode pour les placer en string.

III- Location (location_fonction)

-rent_movie : On recupere les 2 parametres de la fonction, on verifie s ils existent, on regarde si le stock est superieur a 0, on le modifie en lui retirant 1 
apres on met l'id correspondent au login dans la partie "renting_student" du film (de la collection "movies") et l'id correspondent a l'imdb du film dans la partie "rented_movies" du login (de la collection "students") .

-return_movie : On recupere les 2 parametres de la fonction, on verifie s'ils existent. On regarde si le film a bien l'id de l'etudiant dans sa partie "renting_students". Si c'est le cas on ajoute 1 au stock du film puis on supprime les IDs qui ont ete mis avec la fonction rent_movie.

-show_rented_movies: On trouve toutes les informations sur tous les films puis on utilise 2 foreach pour avoir les informations des films
(comme la fonction show_movies) et enfin nous mettons une conditions qui verifie si le tableau "renting_students" est vide ou pas
s'il n est pas vide c'est que le film est loué donc on affiche son nom ainsi que le nombre de resultat avec un compteur.
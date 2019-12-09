SELECT genre.id_genre AS `id_genre`,
genre.name AS `name_genre`,
distrib.id_distrib AS `id_distrib`,
distrib.name AS `name_distrib`,
title AS `title_film`
FROM film
JOIN distrib ON distrib.id_distrib = film.id_distrib
JOIN genre ON genre.id_genre = film.id_genre
WHERE genre.id_genre BETWEEN 4 AND 8;
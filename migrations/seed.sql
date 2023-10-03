-- clean tables
DELETE FROM user_data;
DELETE FROM anime;


-- user_data
INSERT INTO user_data(id, name, username, password, bio, role)
VALUES (1, 'Akbar Maulana Ridho', 'akbar', '$2y$10$gsjjvIaUB4xAVWTnFmej/eItq8zm8O0VfJi5jVBOCup.ibpVQWswe',
        'Wibu pemula', 'ADMIN');

INSERT INTO user_data(id, name, username, password, bio, role)
VALUES (2, 'Eugene Yap Jin Quan', 'yujin', '$2y$10$gsjjvIaUB4xAVWTnFmej/eItq8zm8O0VfJi5jVBOCup.ibpVQWswe', 'Wibu sepuh',
        'USER');


-- anime
INSERT INTO anime(id, title, studio, genre, description, episode_count)
VALUES (1, 'Jigsaw Boy', 'MAP', 'Action', 
        'Renji is robbed of a normal teenage life, left with nothing but his deadbeat father`s overwhelming debt. His only companion is his pet, the jigsaw devil Pochinki, with whom he slays devils for money that inevitably ends up in the yakuza`s pockets.',
        12);

INSERT INTO anime(id, title, studio, genre, description, episode_count)
VALUES (2, 'Family & Spy', 'Clover', 'Comedy', 
        'For the agent known as `Midnight,` no order is too tall if it is for the sake of peace. Operating as Westadt` master spy, Midnight works tirelessly to prevent extremists from sparking a war with neighboring country Eastlandia. For his latest mission, he must investigate Eastlandian politician Denovan Denver by infiltrating his son`s school. Thus, the agent faces the most difficult task of his career: get married, have a child, and play family.',
        24);

INSERT INTO anime(id, title, genre)
VALUES (3, 'Elite Classroom III', 'Drama');

INSERT INTO anime(id, title, studio, genre, description, episode_count)
VALUES (4, 'Ramen Uzumaki', 'Parrot', 'Action', 
        'It has been two and a half years since Ramen Uzumaki left Konohagakure, the Hidden Leaf Village, for intense training following events which fueled his desire to be stronger. Now Akatsuki, the mysterious organization of elite rogue ninja, is closing in on their grand plan which may threaten the safety of the entire shinobi world.',
        500);

INSERT INTO anime(id, title, studio, genre, description, episode_count)
VALUES (5, 'Kintama', 'Sunset', 'Comedy', 
        'After a one-year hiatus, Kenpachi Kimura returns to Edo, only to stumble upon a shocking surprise: Kintoki and Yagura, his fellow Yorozuya members, have become completely different characters! Fleeing from the Yorozuya headquarters in confusion, Kenpachi finds that all the denizens of Edo have undergone impossibly extreme changes, in both appearance and personality. Most unbelievably, his sister Otae has married the Shinsengumi chief and shameless stalker Isao Kondou and is pregnant with their first child.',
        50);


-- user_anime
INSERT INTO user_anime(user_id, anime_id, status)
VALUES (1, 2, 'WATCHED');

INSERT INTO user_anime(user_id, anime_id, status)
VALUES (1, 4, 'WATCHING');

INSERT INTO user_anime(user_id, anime_id, status)
VALUES (1, 5, 'WISHLIST');

INSERT INTO user_anime(user_id, anime_id, status)
VALUES (2, 1, 'WATCHED');

INSERT INTO user_anime(user_id, anime_id, status)
VALUES (2, 3, 'WISHLIST');

INSERT INTO user_anime(user_id, anime_id, status)
VALUES (2, 2, 'WATCHED');


-- review
INSERT INTO review(id, user_id, anime_id, review, rating)
VALUES (1, 1, 2, 'very good', 10);

INSERT INTO review(id, user_id, anime_id, review, rating)
VALUES (2, 2, 2, 'good', 9);

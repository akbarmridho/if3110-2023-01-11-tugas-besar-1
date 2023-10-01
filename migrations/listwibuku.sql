-- parent table: Anime
CREATE TABLE IF NOT EXISTS Anime (
    id SERIAL PRIMARY KEY,
    
    title TEXT,
    studio TEXT,
    genre TEXT,
    description TEXT,
    episode_count INTEGER,
    air_date_start TIMESTAMP,
    air_date_end TIMESTAMP,

    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS Anime_Poster (
    anime_id INTEGER REFERENCES Anime(id) ON DELETE CASCADE,
    poster TEXT,
    PRIMARY KEY(anime_id, poster)
);

CREATE TABLE IF NOT EXISTS Anime_Trailer (
    anime_id INTEGER REFERENCES Anime(id) ON DELETE CASCADE,
    trailer TEXT,
    PRIMARY KEY(anime_id, trailer)
);


-- USER_ROLE Type
DROP TYPE IF EXISTS USER_ROLE;
CREATE TYPE USER_ROLE AS ENUM ('ADMIN', 'USER');


-- parent table: User_Data
CREATE TABLE IF NOT EXISTS User_Data (
    id SERIAL PRIMARY KEY,
    name TEXT,
    username TEXT,
    password TEXT,
    bio TEXT,
    role USER_ROLE DEFAULT 'USER',
        
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);


-- WATCH_STATUS Type
DROP TYPE IF EXISTS WATCH_STATUS;
CREATE TYPE WATCH_STATUS AS ENUM ('WISHLIST', 'WATCHING', 'WATCHED');


CREATE TABLE IF NOT EXISTS User_Anime (
    user_id INTEGER REFERENCES User_Data(id) ON DELETE CASCADE,
    anime_id INTEGER REFERENCES Anime(id) ON DELETE CASCADE,
    status WATCH_STATUS DEFAULT 'WISHLIST',
    PRIMARY KEY(user_id, anime_id)
);

CREATE TABLE IF NOT EXISTS Review (
    id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES User_Data(id) ON DELETE CASCADE,
    review TEXT,
    rating INTEGER CHECK (rating >= 1 AND rating <= 10),

    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);


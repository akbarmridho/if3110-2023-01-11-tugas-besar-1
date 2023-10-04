<form>
    <div class="anime-filter">
        <div class="anime-filter__filter">
            <div>
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option selected value="all">
                        All
                    </option>
                    <?php foreach (\App\Model\Anime::$genres as $genre) : ?>
                        <option value="<?= $genre ?>">
                            <?= $genre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option selected value="all">
                        All
                    </option>
                    <option value="WISHLIST">
                        Wishlist
                    </option>
                    <option value="WATCHING">
                        Watching
                    </option>
                    <option value="WATCHED">
                        Watched
                    </option>
                </select>
            </div>
            <div>
                <label for="sort">Sort</label>
                <select id="sort" name="sort">
                    <option selected value="desc">
                        Desc
                    </option>
                    <option value="asc">
                        Asc
                    </option>
                </select>
            </div>
            <div>
                <label for="sort_by">Sort By</label>
                <select id="sort_by" name="sort_by">
                    <option selected value="members">
                        Members
                    </option>
                    <option value="rating">
                        Rating
                    </option>
                    <option value="air_date_start">
                        Release
                    </option>
                </select>
            </div>
        </div>
        <div class="anime-filter__search">
            <div>
                <label for="search_by">Search By</label>
                <select id="search_by" name="search_by">
                    <option value="title" selected>
                        Title
                    </option>
                    <option>
                        Studio
                    </option>
                </select>
            </div>
            <div>
                <label for="q">Query</label>
                <input id="q" name="q" placeholder="Search ..."/>
            </div>
            <div>
                <button class="anime-filter__button" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path fill="#e5e7eb"
                              d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</form>
<form>
    <div class="anime-filter">
        <div class="anime-filter__filter">
            <div>
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option <?= array_key_exists('genre', $_GET) && $_GET['genre'] !== 'all' ? '' : 'selected' ?>
                            value="all">
                        All
                    </option>
                    <?php foreach (\App\Model\Anime::$genres as $genre) : ?>
                        <option value="<?= $genre ?>" <?= array_key_exists('genre', $_GET) && $_GET['genre'] === $genre ? 'selected' : '' ?>>
                            <?= $genre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if (\Core\Session\Session::isAuthenticated()): ?>
                <div>
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option <?= array_key_exists('status', $_GET) && $_GET['status'] !== 'all' ? '' : 'selected' ?>
                                value="all">
                            All
                        </option>
                        <?php foreach (['Wishlist' => 'WISHLIST', 'Watching' => 'WATCHING', 'Watched' => 'WATCHED'] as $title => $value) : ?>
                            <option value="<?= $value ?>" <?= array_key_exists('status', $_GET) && $_GET['status'] === $value ? 'selected' : '' ?>>
                                <?= $title ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif ?>
            <div>
                <label for="sort">Sort</label>
                <select id="sort" name="sort">
                    <option <?= array_key_exists('sort', $_GET) && $_GET['sort'] !== 'desc' ? '' : 'selected' ?>
                            value="desc">
                        Desc
                    </option>
                    <option <?= array_key_exists('sort', $_GET) && $_GET['sort'] === 'asc' ? 'selected' : '' ?>
                            value="asc">
                        Asc
                    </option>
                </select>
            </div>
            <div>
                <label for="sort_by">Sort By</label>
                <select id="sort_by" name="sort_by">
                    <option <?= array_key_exists('sort_by', $_GET) && $_GET['sort_by'] !== 'members' ? '' : 'selected' ?>
                            value="members">
                        Members
                    </option>
                    <option value="rating" <?= array_key_exists('sort_by', $_GET) && $_GET['sort_by'] === 'rating' ? 'selected' : '' ?>>
                        Rating
                    </option>
                    <option value="air_date_start" <?= array_key_exists('sort_by', $_GET) && $_GET['sort_by'] === 'air_date_start' ? 'selected' : '' ?>>
                        >
                        Release
                    </option>
                </select>
            </div>
        </div>
        <div class="anime-filter__search">
            <div>
                <label for="search_by">Search By</label>
                <select id="search_by" name="search_by">
                    <option value="title" <?= array_key_exists('search_by', $_GET) && $_GET['search_by'] !== 'title' ? '' : 'selected' ?>>
                        Title
                    </option>
                    <option value="studio" <?= array_key_exists('search_by', $_GET) && $_GET['search_by'] === 'studio' ? 'selected' : '' ?>>
                        Studio
                    </option>
                </select>
            </div>
            <div>
                <label for="q">Query</label>
                <input id="q" name="q" placeholder="Search ..."
                       value="<?= array_key_exists('q', $_GET) ? $_GET['q'] : '' ?>"/>
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
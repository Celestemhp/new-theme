<section id="search-overlay" :class="{open: searchOpen}">

    <div class="close-icon">
        <?= svg('icon-close'); ?>
    </div>

    <div class="search-container">
        <div class="search-input-container">

            <input type="text" autocomplete="off" v-model="searchValue" placeholder="Leita" />

            <div class="clear-text-icon">
                <?= svg('icon-search'); ?>
            </div>
        </div>

        <div v-show="showResults && searchResults.length > 0" class="pagination">

            <div class="number-of-hits">
                {{currentPage * pageSize + 1}} - {{pageSize * (currentPage + 1) > numberOfResults ? numberOfResults : pageSize * (currentPage + 1)}} úrslit av {{numberOfResults}}
            </div>

        </div>

        <div v-if="showResults && searchResults.length == 0" class="no-results"><?= __("No results", "groaqua") ?></div>

        <div class="search-results-container" :class="{show: renderResultsContainer}">

            <div v-show="showResults" class="search-results">

                <a v-for="(result, index) in searchResults" :key="index" :href="result.url" class="search-result-item" :data_type="result.post_type" :data_id="result.post_id">

                    <div class="content-wrapper">
                        <h2>{{result.post_title}}</h2>

                        <p v-if="result.content" class="content">{{handleContent(result.content)}}</p>
                        <p v-if="result.title" class="content">{{result.title}}</p>

                        <div class="type">
                            {{postTypeMapping[result.post_type]}}
                        </div>
                    </div>
                </a>

            </div>

        </div>

        <div v-show="showResults && searchResults.length > 0" class="pagination-bottom">

            <div @click="previousPage" class="prev-page" :class="{disabled: !hasPrevious}">
                <div class="icon-wrapper">
                    <?= svg('icon-arrow'); ?>
                </div>
                <div class="text"><?= __("Previous page", "groaqua") ?></div>
            </div>

            <?php if (!get_field('hide_algolia_logo', 'option')) : ?>
                <div class="algolia-brand"><span><?= __("Search by", "groaqua") ?></span> <img src="<?= IMAGES; ?>/algolia-logo-white.svg" /></div>
            <?php endif; ?>

            <div @click="nextPage" class="next-page" :class="{disabled: !hasNext}">
                <div class="text"><?= __("Next page", "groaqua") ?></div>
                <div class="icon-wrapper">
                    <?= svg('icon-arrow'); ?>
                </div>
            </div>

        </div>
    </div>

    <div class="search-bg"></div>
</section>
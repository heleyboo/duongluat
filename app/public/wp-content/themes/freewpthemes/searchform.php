<form action="/" method="get">
    <fieldset class="home-form-1">
        <div class="col-md-6 col-sm-6 padd-0">
            <input type="text" class="form-control br-1" name="s" value="<?php the_search_query(); ?>" placeholder="Search for free wordpress themes...">
        </div>
        <div class="col-md-4 col-sm-4 padd-0">
            <div class="sl-box">
                <?php freewpthemes_select_theme_tags(); ?>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 padd-0">
            <input type="hidden" name="post_type" value="theme" />
            <button type="submit" class="btn theme-btn cl-white seub-btn">SEARCH</button>
        </div>
    </fieldset>
</form>
<div class="buttons-social-media-share">
    <ul class="share-buttons">
        <li>
            <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}&title={{ $description }}"
                title="Compartir en Facebook"
                target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $description }}&via={user_id}&hashtags=larablog"
                title="Compartir en Twitter"
                target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li>
            <a href=""><i class="fab fa-pinterest"></i></a>
        </li>
        <li>
            <a href=""><i class="fab fa-whatsapp"></i></a>
        </li>
    </ul>
</div>
<div id="comments" class="comments-area font-main text-black rounded-lg overflow-hidden" style="background-color: #D9D9D9; padding: 2rem;">

    <?php if(have_comments()): ?>
        <h3 class="text-2xl font-bold mb-6 text-black">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count === '1') {
                echo '1 Comment';
            } else {
                echo $comment_count . ' Comments';
            }
            ?>
        </h3>
        <ul class="comment-list space-y-6 mb-8">
            <?php
            wp_list_comments(array(
                'style'      => 'ul',
                'short_ping' => true,
                'avatar_size' => 60,
                'callback' => function($comment, $args, $depth) {
                    ?>
                    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('bg-[#B3B3B3] p-4 rounded-lg text-black'); ?>>
                        <article class="comment-body">
                            <footer class="comment-meta flex items-start mb-3">
                                <?php if ( 0 != $args['avatar_size'] ) : ?>
                                <div class="comment-avatar mr-4">
                                    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <div class="comment-author font-bold text-black">
                                        <?php printf( '%s', get_comment_author_link() ); ?>
                                    </div>
                                    <div class="comment-metadata text-xs text-gray-700">
                                        <time datetime="<?php comment_time( 'c' ); ?>">
                                            <?php
                                            printf(
                                                '%1$s at %2$s',
                                                get_comment_date(),
                                                get_comment_time()
                                            );
                                            ?>
                                        </time>
                                    </div>
                                </div>
                            </footer>

                            <div class="comment-content text-black">
                                <?php comment_text(); ?>
                            </div>

                            <div class="reply mt-2 text-sm">
                                <?php
                                comment_reply_link(
                                    array_merge(
                                        $args,
                                        array(
                                            'reply_text' => 'Reply',
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth'],
                                            'before'     => '<span class="text-[#4D4284] font-bold">',
                                            'after'      => '</span>'
                                        )
                                    )
                                );
                                ?>
                            </div>
                        </article>
                    </li>
                    <?php
                }
            ));
            ?>
        </ul>

        <?php 
        // Comment navigation
        the_comments_navigation(array(
            'prev_text' => '&larr; Older Comments',
            'next_text' => 'Newer Comments &rarr;',
            'screen_reader_text' => 'Comment navigation',
            'aria_label' => 'Comments',
            'class' => 'flex justify-between mb-6 text-black',
        )); 
        ?>
    <?php endif; ?>

    <?php 
    // Comment form
    $comment_form_args = array(
        'title_reply' => '<span class="text-2xl font-bold text-black">Leave a Comment</span>',
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title mb-4">',
        'title_reply_after' => '</h3>',
        'comment_notes_before' => '<p class="comment-notes text-sm mb-4 text-black">Your email address will not be published.</p>',
        'comment_field' => '<div class="comment-form-comment mb-4"><label for="comment" class="block mb-2 text-black">Comment</label><textarea id="comment" name="comment" rows="5" required="required" class="w-full p-2 border border-gray-300 rounded bg-white text-black"></textarea></div>',
        'fields' => array(
            'author' => '<div class="comment-form-author mb-4"><label for="author" class="block mb-2 text-black">Name <span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" required="required" class="w-full p-2 border border-gray-300 rounded bg-white text-black"></div>',
            'email' => '<div class="comment-form-email mb-4"><label for="email" class="block mb-2 text-black">Email <span class="required">*</span></label><input id="email" name="email" type="email" value="" size="30" required="required" class="w-full p-2 border border-gray-300 rounded bg-white text-black"></div>',
            'url' => '<div class="comment-form-url mb-4"><label for="url" class="block mb-2 text-black">Website</label><input id="url" name="url" type="url" value="" size="30" class="w-full p-2 border border-gray-300 rounded bg-white text-black"></div>',
        ),
        'class_submit' => 'bg-[#6C619E] text-white py-2 px-4 rounded-md shadow hover:bg-[#4D4284] focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer',
        'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
    );
    
    comment_form($comment_form_args);
    ?>

    <?php if(!comments_open() && get_comments_number()): ?>
        <p class="no-comments p-4 bg-[#B3B3B3] rounded-lg text-black">Comments are closed</p>
    <?php endif; ?>

</div>
<?php if(have_comments()) : ?>
<div id="comments">
<h3>Comments</h3>
<ul>
<?php wp_list_comments( array(
  'format' => 'html5')); ?>
</ul>
</div>
<?php endif; ?>

<?php
comment_form(array(
    'title_reply' => 'Leave a comment',
    'label_submit' => '送信',
    'format' => 'html5'
)); 

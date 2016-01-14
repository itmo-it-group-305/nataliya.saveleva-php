<?php

$data = [
    [
        'id'=>1,
        'title'=>'News #1',
        'description'=>'Shirt description for news #1',
        'date'=> date('Y-m-d H:i:s'),
        'preview'=>'preview.jpg',
    ],
    [
        'id'=>2,
        'title'=>'News #2',
        'description'=>'Shirt description for news #2',
        'date'=> date('Y-m-d H:i:s'),
        'preview'=>'preview.jpg',
    ],
    [
        'id'=>3,
        'title'=>'News #3',
        'description'=>'Shirt description for news #3',
        'date'=> date('Y-m-d H:i:s'),
        'preview'=>'preview.jpg',
    ],
    [
        'id'=>4,
        'title'=>'News #4',
        'description'=>'Shirt description for news #4',
        'date'=> date('Y-m-d H:i:s'),
        'preview'=>'preview.jpg',
    ],
    [
        'id'=>5,
        'title'=>'News #5',
        'description'=>'Shirt description for news #5',
        'date'=> date('Y-m-d H:i:s'),
        'preview'=>'preview.jpg',
    ],
];
//foreach ($data as $post) {
//    echo
//    '<section>',
//
//             '<h2>'.$post['title'].'</h2>',
//             '<p class= "date">'. $post['date'].'</p>',
//
//            '</section>';
//    }
//
//?>
<?php foreach ($data as $post): ?>
    <section>
        <h2><?= $post ['title']?></h2>
        <p class = 'preview'>
            <img src="<?= $post['preview'] ?>">
        </p>
        <p class= "date"> <?= $post['date']?></p>
        <p class = "description"><?= $post['description']?></p>

    </section>
<?php endforeach; ?>

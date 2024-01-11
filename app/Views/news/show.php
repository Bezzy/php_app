<?php

// NOTE(): prepare instead of query to protect against sql injection


?>

<div class="w-full flex items-center flex-col mt-[36px]">
    <div class="p-[12px] bg-[#1f1f1f] w-[640px] border-[#25282B] border-[1px] rounded-[3px] shadow-[0_0_0_1px_#25282b] mb-[36px]">
        <a href="<?= $news->get_url()?>"><h1 class="text-3xl text-[#99C3FF] mb-[24px]"><?= $news->title ?></h1></a>
        <p class="text-[#bdc1c6]"><?= $news->body ?></p>
    </div>
</div>

<div class="w-full flex items-center flex-col mt-[36px]">
    <h1 class="text-4xl mb-[24px]">Comments</h1>
    <div class="p-[12px] bg-[#1f1f1f] min-w-[640px] border-[#25282B] border-[1px] rounded-[3px] shadow-[0_0_0_1px_#25282b] mb-[36px]">
        <?php foreach ($comments as $comment): ?>
            <div class="p-[12px] bg-[#3C3C3C]  border-[#25282B] border-[1px] rounded-[3px] shadow-[0_0_0_1px_#25282b] mb-[36px]">
                <p class="text-[#bdc1c6]"><?= $comment->body ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="p-[12px] bg-[#1f1f1f] min-w-[640px] border-[#25282B] border-[1px] rounded-[3px] shadow-[0_0_0_1px_#25282b] mb-[36px]">
    <form class="text-black" method="post">
        <textarea class=" mb-[24px] w-full" type="textarea" id="comm" name="comm"></textarea><br>
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
        <input type="submit" value="commenter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </form> 
    </div>

    <a class="p-[12px] bg-[#1f1f1f] min-w-[640px] border-[#25282B] border-[1px] rounded-[3px] shadow-[0_0_0_1px_#25282b] mb-[36px]" href="./">Retour</a>
</div>



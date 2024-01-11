<div class="w-full flex items-center flex-col mt-[36px]">
	<?php foreach ($news as $new): ?>
		<div class="p-[12px] bg-[#1f1f1f] w-[640px] border-[#25282B] border-[1px] rounded-[3px] shadow-[0_0_0_1px_#25282b] mb-[36px]">
			<a href="<?= $new->get_url()?>"><h1 class="text-3xl text-[#99C3FF] mb-[24px]"><?= $new->title ?></h1></a>
			<p class="text-[#bdc1c6]"><?= $new->get_excerpt() ?></p>
		</div>
	<?php endforeach; ?>
</div>